<?php
session_start();

if (!isset($_SESSION['username']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit();
}

$admin_username = $_SESSION['username'];

$host = 'localhost';
$db = 'farming_info_db';
$user = 'root';
$pass = '';

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$products_sold = [];
$products_available = [];

$sql = "SELECT products.name AS product_name, 
               categories.category_name, 
               products.quantity_available, 
               products.price, 
               SUM(orders.quantity) AS total_sold, 
               SUM(orders.quantity * products.price) AS total_price 
        FROM products 
        LEFT JOIN orders ON products.name = orders.product_name
        JOIN categories ON products.category_id = categories.id
        GROUP BY products.name, categories.category_name, products.quantity_available, products.price";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        if ($row['total_sold'] > 0) {
            $products_sold[] = $row;
        }
        if ($row['quantity_available'] > 0) {
            $products_available[] = $row;
        }
    }
} else {
    $products_sold = [];
    $products_available = [];
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <style>
        /* CSS Styles (same as your previous styles) */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        nav {
            background-color: #333;
            padding: 10px 15px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        nav ul {
            list-style: none;
            margin: 0;
            padding: 0;
            display: flex;
        }

        nav ul li {
            margin-right: 15px;
        }

        nav ul li a {
            color: white;
            text-decoration: none;
            font-weight: bold;
            transition: color 0.3s ease;
            font-size: 14px;
        }

        nav ul li a:hover {
            color: #ff9900;
        }

        .profile {
            color: white;
            font-weight: bold;
            cursor: pointer;
            position: relative;
        }

        .profile-dropdown {
            display: block;
            position: absolute;
            right: 0;
            background-color: #fff;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
            padding: 5px;
            margin-top: 5px;
            z-index: 10;
        }

        .profile-dropdown a {
            display: block;
            padding: 5px;
            text-decoration: none;
            color: #333;
            border-bottom: 1px solid #f0f0f0;
            font-size: 13px;
        }

        .profile-dropdown a:hover {
            background-color: #f4f4f4;
        }

        .dashboard-content {
            padding: 20px 10px;
            background-color: white;
            margin: 15px auto;
            width: 90%;
            max-width: 800px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #333;
            font-size: 2em;
            margin-bottom: 10px;
        }

        p {
            color: #555;
            font-size: 1.1em;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
            font-size: 13px;
        }

        table th, table td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        table th {
            background-color: #f4f4f4;
            font-size: 13px;
        }

        @media (max-width: 768px) {
            nav ul {
                flex-direction: column;
                align-items: center;
            }

            nav ul li {
                margin-bottom: 10px;
            }

            .dashboard-content {
                width: 95%;
                padding: 15px;
            }
        }
    </style>
</head>
<body>
    <nav>
        <ul>
            <li><a href="farminghome.php">Dashboard</a></li>
            <li><a href="add-product.php">Add Product</a></li>
            <li><a href="view_products.php">View Products</a></li> 
            <li><a href="view-orders.php">View Orders</a></li>
            <li><a href="edit-orders.php">Edit Orders</a></li>
            <li><a href="manage-users.php">Manage Users</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>

        <div class="profile">
            <?php echo $admin_username; ?>
            <div class="profile-dropdown">
                <a href="admin-profile.php">Profile</a>
                <a href="logout.php">Logout</a>
            </div>
        </div>
    </nav>
    
    <div class="dashboard-content">
        <h1>Welcome to the Admin Panel</h1>
        <p>Manage your website content from here.</p>

        <div class="product-overview">
            <h2>Products Sold</h2>
            <table>
                <thead>
                    <tr>
                        <th>Product Name</th>
                        <th>Category</th>
                        <th>Products Sold</th>
                        <th>Price</th>
                        <th>Total Price</th> <!-- New column for total price -->
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($products_sold)) : ?>
                        <?php foreach ($products_sold as $product) : ?>
                            <tr>
                                <td><?php echo $product['product_name']; ?></td>
                                <td><?php echo $product['category_name']; ?></td>
                                <td><?php echo $product['total_sold']; ?></td>
                                <td><?php echo number_format($product['price'], 2); ?></td>
                                <td><?php echo number_format($product['total_price'], 2); ?></td> <!-- Display total price -->
                            </tr>
                        <?php endforeach; ?>
                    <?php else : ?>
                        <tr>
                            <td colspan="5">No sold products available.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

        <div class="product-overview">
            <h2>Products Available</h2>
            <table>
                <thead>
                    <tr>
                        <th>Product Name</th>
                        <th>Category</th>
                        <th>Products Available</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($products_available)) : ?>
                        <?php foreach ($products_available as $product) : ?>
                            <tr>
                                <td><?php echo $product['product_name']; ?></td>
                                <td><?php echo $product['category_name']; ?></td>
                                <td><?php echo $product['quantity_available']; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else : ?>
                        <tr>
                            <td colspan="3">No available products.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
