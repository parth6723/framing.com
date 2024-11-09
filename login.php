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

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $input_username = $_POST['username'];
    $input_email = $_POST['email'];
    $input_password = $_POST['password'];

    $stmt = $conn->prepare("SELECT id, username, email, role, password FROM users WHERE (username = ? OR email = ?)");
    $stmt->bind_param("ss", $input_username, $input_email);
    
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $username, $email, $role, $hashed_password);
        $stmt->fetch();
        
        if (password_verify($input_password, $hashed_password)) {
            $_SESSION['username'] = $username;
            $_SESSION['role'] = $role;

            if ($role == 'admin') {
                header('Location: admin.php');
            } else {
                header('Location: farminghome.php');
            }
            exit();
        } else {
            echo "<script>alert('Invalid password');</script>";
        }
    } else {
        echo "<script>alert('Invalid username or email');</script>";
    }

    $stmt->close();
}

$conn->close();
?>



    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Farming Info Login</title>
        <style>
            body {
                font-family: Arial, sans-serif;
                margin: 0;
                padding: 0;
                height: 100vh;
                overflow: hidden;
                display: flex;
                justify-content: center;
                align-items: center;
            }

            .background-video {
                position: absolute;
                right: 0;
                bottom: 0;
                width: 100%;
                height: 100%;
                z-index: -1;
                object-fit: cover;
            }

            .overlay {
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background-color: rgba(0, 0, 0, 0.5);
                z-index: 1;
            }

            .login-container {
                position: relative;
                z-index: 2;
                color: whitesmoke;
                background-color: rgba(225, 255, 255, 0.1);
                padding: 20px;
                border-radius: 10px;
                box-shadow: 0 0 20px rgba(0, 0, 0, 0.5);
                width: 350px;
                max-width: 90%;
                margin: auto;
            }

            .login-container h1 {
                text-align: center;
                color: #333;
                margin-bottom: 20px;
            }

            .login-container input[type="text"],
            .login-container input[type="email"],
            .login-container input[type="password"] {
                width: 100%;
                padding: 12px;
                margin: 10px 0;
                border: 1px solid #ccc;
                border-radius: 6px;
                box-sizing: border-box;
            }

            .login-container button {
                width: 100%;
                padding: 12px;
                background-color: #28a745;
                color: white;
                border: none;
                border-radius: 6px;
                cursor: pointer;
                font-size: 16px;
                font-weight: bold;
            }

            .login-container button:hover {
                background-color: #218838;
            }

            .login-container p {
                text-align: center;
                color: #333;
            }

            .login-container a {
                color: #28a745;
                text-decoration: none;
                font-weight: bold;
            }

            .login-container a:hover {
                text-decoration: underline;
            }
        </style>
    </head>
    <body>

        <video autoplay muted loop class="background-video">
            <source src="backlook/farm2.mp4" type="video/mp4">
            Your browser does not support the video tag.
        </video>

        <div class="overlay"></div>

        <div class="login-container">
            <h1>Login</h1>
            <form method="post" action="">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required>

                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>

                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>

                <button type="submit">Login</button>
                <p>Don't have an account? <a href="register.php">Register here</a>.</p>
            </form>
        </div>

    </body>
    </html>
