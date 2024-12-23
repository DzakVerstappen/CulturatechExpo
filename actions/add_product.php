<?php
require '../config/database.php';

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $errors = [];
    $response = [];

    $name = trim($_POST['name'] ?? '');
    if (empty($name)) {
        $errors[] = 'Product name is required.';
    }

    $description = trim($_POST['description'] ?? '');
    if (empty($description)) {
        $errors[] = 'Description is required.';
    }

    $category = $_POST['category'] ?? '';
    if (empty($category)) {
        $errors[] = 'Category is required.';
    }

    $price = $_POST['price'] ?? '';
    if (empty($price) || !is_numeric($price) || $price <= 0) {
        $errors[] = 'Price must be a positive number.';
    }

    $stock = $_POST['stock'] ?? '';
    if (empty($stock) || !is_numeric($stock) || $stock < 0) {
        $errors[] = 'Stock must be a non-negative number.';
    }

    $photo = $_FILES['photo'] ?? null;
    $uploadDir = '../images/products/';
    $uploadedFileName = '';

    if ($photo && $photo['error'] === UPLOAD_ERR_OK) {
        $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
        if (!in_array($photo['type'], $allowedTypes)) {
            $errors[] = 'Invalid file type. Only JPG, PNG, and GIF are allowed.';
        } else {
            $fileExtension = pathinfo($photo['name'], PATHINFO_EXTENSION);
            $uniqueFileName = uniqid('img_', true) . '.' . $fileExtension;
            $uploadedFilePath = $uploadDir . $uniqueFileName;

            if (!move_uploaded_file($photo['tmp_name'], $uploadedFilePath)) {
                $errors[] = 'Failed to upload the image.';
            } else {
                $uploadedFileName = $uniqueFileName;
            }
        }
    } else {
        $errors[] = 'Product photo is required.';
    }

    if (empty($errors)) {
        try {
            $stmt = $pdo->prepare(
                "INSERT INTO products (name, description, price, stock, image_url, category_id, created_at) VALUES (:name, :description, :price, :stock, :image_url, :category_id, NOW())"
            );
            $stmt->execute([
                ':name' => $name,
                ':description' => $description,
                ':price' => $price,
                ':stock' => $stock,
                ':image_url' => $uploadedFileName,
                ':category_id' => $category
            ]);

            $response = ['success' => true, 'message' => 'Product added successfully.'];
        } catch (PDOException $e) {
            $errors[] = 'Failed to save the product: ' . $e->getMessage();
        }
    }

    if (!empty($errors)) {
        $response = ['success' => false, 'errors' => $errors];
    }

    echo json_encode($response);
    exit;
}

echo json_encode(['success' => false, 'message' => 'Invalid request method.']);
exit;