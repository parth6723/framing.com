<?php
session_start();

if (!isset($_SESSION['username']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit();
}

include 'db.php';

if (isset($_GET['id'])) {
    $product_id = $_GET['id'];

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $category_id = intval($_POST['category']);
        $price = floatval($_POST['price']);

        if ($_FILES['image']['name']) {
            $image = $_FILES['image']['name'];
            $target_dir = "uploads/";
            $target_file = $target_dir . basename($image);
            move_uploaded_file($_FILES['image']['tmp_name'], $target_file);
            $stmt = $conn->prepare("UPDATE products SET name=?, category_id=?, price=?, image=? WHERE id=?");
            $stmt->bind_param("sidsi", $name, $category_id, $price, $image, $product_id);
        } else {
            $stmt = $conn->prepare("UPDATE products SET name=?, category_id=?, price=? WHERE id=?");
            $stmt->bind_param("sidi", $name, $category_id, $price, $product_id);
        }

        if ($stmt->execute()) {
            echo "<script>alert('Product updated successfully!'); window.location.href='view_products.php';</script>";
        } else {
            echo "Error: " . $stmt->error;
        }
    } else {
        $result = $conn->query("SELECT * FROM products WHERE id=$product_id");
        $product = $result->fetch_assoc();
    }
} else {
    echo "No product selected!";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
    <style>
        form {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }
        input[type="text"],
        input[type="number"],
        select,
        input[type="file"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 14px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
  <center>  <h1>Edit Product</h1></center>
    <form action="" method="POST" enctype="multipart/form-data">
        <label>Product Name:</label>
        <input type="text" name="name" value="<?php echo $product['name']; ?>" required>
        <label>Category:</label>
        <select name="category" required>
            <?php
            $result = $conn->query("SELECT id, category_name FROM categories");
            while ($row = $result->fetch_assoc()) {
                $selected = ($row['id'] == $product['category_id']) ? 'selected' : '';
                echo '<option value="' . $row['id'] . '" ' . $selected . '>' . $row['category_name'] . '</option>';
            }
            ?>
        </select>
        <label>Price:</label>
        <input type="number" step="0.01" name="price" value="<?php echo $product['price']; ?>" required>
        <label>Image (Leave blank to keep current image):</label>
        <input type="file" name="image">
        <input type="submit" value="Update Product">
    </form>
</body>
</html>
