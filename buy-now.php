<?php
session_start(); 

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "farming_info_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['name']) && isset($_GET['price']) && isset($_GET['quantity'])) {
    $product_name = $_GET['name'];
    $product_price = $_GET['price'];
    $quantity = intval($_GET['quantity']);
    $total_price = $product_price * $quantity;
    $customer_name = isset($_SESSION['username']) ? $_SESSION['username'] : 'guest'; 

    $stmt = $conn->prepare("INSERT INTO orders (customer_name, product_name, quantity, total_price) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssdd", $customer_name, $product_name, $quantity, $total_price);
    $stmt->execute();
    $stmt->close();

    header('Location: order-confirmation.php');
    exit();
}

$conn->close();
?>
