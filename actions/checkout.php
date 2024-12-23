<?php
session_start();
require '../config/database.php';
header('Content-Type: application/json');

if (!isset($_SESSION['user_id'])) {
    echo json_encode(['success' => false, 'message' => 'User not logged in.']);
    exit();
}

$userId = $_SESSION['user_id'];

if (empty($_POST['shipping-method-choice'])) {
    echo json_encode(['success' => false, 'message' => 'Shipping method is required.']);
    exit();
}

$shippingMethod = $_POST['shipping-method-choice'];
$shippingFees = [
    'instant' => 50000,
    'reguler' => 20000,
    'cargo' => 35000
];
$shippingFee = $shippingFees[$shippingMethod] ?? null;

if ($shippingFee === null) {
    echo json_encode(['success' => false, 'message' => 'Invalid shipping method.']);
    exit();
}

try {
    $pdo->beginTransaction();

    $stmt = $pdo->prepare("SELECT c.product_id, c.quantity, p.price, p.stock 
                           FROM cart c 
                           JOIN products p ON c.product_id = p.id 
                           WHERE c.user_id = :user_id");
    $stmt->execute([':user_id' => $userId]);
    $cartItems = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (empty($cartItems)) {
        echo json_encode(['success' => false, 'message' => 'Cart is empty.']);
        exit();
    }

    $subtotal = 0;
    foreach ($cartItems as $item) {
        if ($item['stock'] < $item['quantity']) {
            echo json_encode(['success' => false, 'message' => 'Insufficient stock for some items.']);
            exit();
        }
        $subtotal += $item['price'] * $item['quantity'];
    }

    $totalPrice = $subtotal + $shippingFee;

    $stmt = $pdo->prepare("INSERT INTO orders (user_id, total_price, status, created_at) 
                           VALUES (:user_id, :total_price, 'pending', NOW())");
    $stmt->execute([':user_id' => $userId, ':total_price' => $totalPrice]);
    $orderId = $pdo->lastInsertId();

    foreach ($cartItems as $item) {
        $stmt = $pdo->prepare("INSERT INTO order_details (order_id, product_id, quantity, price) 
                               VALUES (:order_id, :product_id, :quantity, :price)");
        $stmt->execute([
            ':order_id' => $orderId,
            ':product_id' => $item['product_id'],
            ':quantity' => $item['quantity'],
            ':price' => $item['price']
        ]);

        $stmt = $pdo->prepare("UPDATE products SET stock = stock - :quantity WHERE id = :product_id");
        $stmt->execute([
            ':quantity' => $item['quantity'],
            ':product_id' => $item['product_id']
        ]);
    }

    $stmt = $pdo->prepare("DELETE FROM cart WHERE user_id = :user_id");
    $stmt->execute([':user_id' => $userId]);

    $pdo->commit();

    echo json_encode([
        'success' => true,
        'message' => 'Checkout successful.',
        'order_id' => $orderId,
        'total_price' => $totalPrice,
        'shipping_fee' => $shippingFee,
        'subtotal' => $subtotal
    ]);
} catch (Exception $e) {
    $pdo->rollBack();
    echo json_encode(['success' => false, 'message' => 'Checkout failed: ' . $e->getMessage()]);
}
