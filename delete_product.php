<?php
session_start();

if (!isset($_SESSION['username']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit();
}

include 'db.php';

if (isset($_GET['id'])) {
    $product_id = intval($_GET['id']);

    $result = $conn->query("SELECT image FROM products WHERE id=$product_id");
    $product = $result->fetch_assoc();
    $image_path = 'uploads/' . $product['image'];

    $stmt = $conn->prepare("DELETE FROM products WHERE id=?");
    $stmt->bind_param("i", $product_id);

    if ($stmt->execute()) {
        if (file_exists($image_path)) {
            unlink($image_path);
        }

        echo "<script>alert('Product deleted successfully!'); window.location.href='view_products.php';</script>";
    } else {
        echo "Error: " . $stmt->error;
    }
} else {
    echo "No product selected!";
}
?>
