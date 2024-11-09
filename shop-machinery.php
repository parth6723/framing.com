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

if (isset($_GET['action']) && $_GET['action'] === 'add' && isset($_GET['name']) && isset($_GET['price']) && isset($_GET['image'])) {
    $product_name = $_GET['name'];
    $product_price = $_GET['price'];
    $img_path = $_GET['image'];
    $user = isset($_SESSION['username']) ? $_SESSION['username'] : 'guest'; 

    $stmt = $conn->prepare("INSERT INTO cart (user, product_name, product_price, img_path, created_at) VALUES (?, ?, ?, ?, NOW())");
    $stmt->bind_param("ssds", $user, $product_name, $product_price, $img_path);
    $stmt->execute();
    $stmt->close();

    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit();
}


if (isset($_GET['action']) && $_GET['action'] === 'buy' && isset($_GET['name']) && isset($_GET['price']) && isset($_GET['image'])) {
    $product_name = $_GET['name'];
    $product_price = $_GET['price'];
    $img_path = $_GET['image']; 
    $customer_name = isset($_SESSION['username']) ? $_SESSION['username'] : 'guest'; 

    
    $stmt = $conn->prepare("INSERT INTO cart (user, product_name, product_price, img_path, created_at) VALUES (?, ?, ?, ?, NOW())");
    $stmt->bind_param("ssds", $customer_name, $product_name, $product_price, $img_path);
    $stmt->execute();
    $stmt->close();

    
    $stmt = $conn->prepare("INSERT INTO orders (customer_name, product_name, quantity, total_price, created_at) VALUES (?, ?, ?, ?, NOW())");
    $quantity = 1; 
    $stmt->bind_param("ssds", $customer_name, $product_name, $quantity, $product_price);
    $stmt->execute();
    $stmt->close();

    header('Location: order-confirmation.php'); 
    exit();
}

function fetchProducts($conn) {
    $stmt = $conn->prepare("SELECT p.name, p.price, p.image FROM products p WHERE p.category_id = 4"); 
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_all(MYSQLI_ASSOC);
}

$products = fetchProducts($conn);
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Machinery - Farming Store</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        header {
            background-color: #4CAF50;
            color: white;
            padding: 1em;
            text-align: center;
        }
        nav a {
            color: white;
            margin: 0 1em;
            text-decoration: none;
        }
        .dropdown {
            display: inline-block;
        }
        .dropbtn {
            background-color: #4CAF50;
            color: white;
            padding: 10px;
            font-size: 16px;
            border: none;
            cursor: pointer;
        }
        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            z-index: 1;
        }
        .dropdown-content a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }
        .dropdown:hover .dropdown-content {
            display: block;
        }
        .profile {
            float: right;
        }
        .container {
            width: 80%;
            margin: 0 auto;
            padding: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f4f4f4;
        }
        img {
            width: 100px;
            height: auto;
        }
        .btn {
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            text-align: center;
            display: inline-block;
            margin: 5px;
        }
        .add-to-cart {
            background-color: #28a745;
            color: white;
        }
        .add-to-cart:hover {
            background-color: #218838;
        }
        .buy-now {
            background-color: #007bff;
            color: white;
        }
        .buy-now:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <header>
        <h1>Farming Store - Machinery</h1>
        <nav>
            <a href="farminghome.php">Home</a>
            <a href="cart.php#cart">Cart</a>
            <a href="contact.php#contact">Contact</a>
            <div class="dropdown">
                <button class="dropbtn">Shop by Category</button>
                <div class="dropdown-content">
                    <a href="shop-seeds.php?category=seeds">Seeds</a>
                    <a href="shop-tools.php?category=tools">Tools</a>
                    <a href="shop-fertilizers.php?category=fertilizers">Fertilizers</a>
                    <a href="shop-machinery.php?category=machinery">Machinery</a>
                </div>
            </div>
            <div class="profile">
                <?php if (isset($_SESSION['username'])): ?>
                    <span>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?></span>
                    <a href="logout.php">Logout</a>
                <?php else: ?>
                    <a href="login.php">Login</a>
                <?php endif; ?>
            </div>
        </nav>
    </header>
    
    <div class="container">
        <h1>Machinery Products</h1>
        <table>
            <tr>
                <th>Image</th>
                <th>Name</th>
                <th>Price</th>
                <th>Actions</th>
            </tr>
            <?php foreach ($products as $product): ?>
                <tr>
                    <td><img src="<?php echo htmlspecialchars($product['image']); ?>" alt="<?php echo htmlspecialchars($product['name']); ?>"></td>
                    <td><?php echo htmlspecialchars($product['name']); ?></td>
                    <td>$<?php echo htmlspecialchars($product['price']); ?></td>
                    <td>
                        <form action="shop-machinery.php" method="get" style="display:inline;">
                            <input type="hidden" name="name" value="<?php echo htmlspecialchars($product['name']); ?>">
                            <input type="hidden" name="price" value="<?php echo htmlspecialchars($product['price']); ?>">
                            <input type="hidden" name="image" value="<?php echo htmlspecialchars($product['image']); ?>">
                            <button type="submit" name="action" value="buy" class="btn buy-now">Buy Now</button>
                        </form>
                        <a href="?action=add&name=<?php echo urlencode($product['name']); ?>&price=<?php echo urlencode($product['price']); ?>&image=<?php echo urlencode($product['image']); ?>" class="btn add-to-cart">Add to Cart</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</body>
</html>
