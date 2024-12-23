<?php
session_start();
require '../config/database.php';

if (!isset($_SESSION['user_id'])) {
    http_response_code(401);
    echo "Unauthorized";
    exit;
}

$userId = $_SESSION['user_id'];
$productId = $_POST['product_id'];
$quantity = $_POST['quantity'];

try {
    $deleteQuery = "DELETE FROM cart WHERE user_id = :user_id AND product_id = :product_id";
    $deleteStmt = $pdo->prepare($deleteQuery);
    $deleteStmt->bindParam(':user_id', $userId);
    $deleteStmt->bindParam(':product_id', $productId);
    $deleteStmt->execute();

    $insertQuery = "INSERT INTO cart (user_id, product_id, quantity) VALUES (:user_id, :product_id, :quantity)";
    $insertStmt = $pdo->prepare($insertQuery);
    $insertStmt->bindParam(':user_id', $userId);
    $insertStmt->bindParam(':product_id', $productId);
    $insertStmt->bindParam(':quantity', $quantity);

    if ($insertStmt->execute()) {
        echo "Keranjang berhasil diperbarui dengan produk baru.";
    } else {
        http_response_code(500);
        echo "Gagal memperbarui keranjang.";
    }
} catch (PDOException $e) {
    http_response_code(500);
    echo "Error: " . $e->getMessage();
}
?>
