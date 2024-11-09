<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>community</title>
    <link rel="stylesheet" href="community.css">
   
    </style>
</head>
<body>
    <div class="side-nav">
        <div class="nav-header">
            <h2>Community </h2>
            <button class="menu-toggle"><i class="fas fa-times"></i></button>
        </div>
        <ul>
        <li><a href="farming-info.php"><i class="fas fa-seedling"></i> Farming Information</a></li>
            <li><a href="seed-products.php"><i class="fas fa-tractor"></i> Seed Products</a></li>
            <li><a href="community.php"><i class="fas fa-users"></i> Community</a></li>
            <li><a href="agriculture.php"><i class="fas fa-leaf"></i> Agriculture</a></li>
            <li><a href="agricultural-licence.php"><i class="fas fa-file-alt"></i> Agricultural Licence</a></li>
            <li><a href="agricultural-machinery.php"><i class="fas fa-cogs"></i> Agricultural Machinery</a></li>
            <li><a href="agricultural-produces.php"><i class="fas fa-warehouse"></i> Agricultural Produces</a></li>
            <li><a href="crops.php"><i class="fas fa-seedling"></i> Crops</a></li>
            <li><a href="fertilizers-pesticides.php"><i class="fas fa-spray-can"></i> Fertilizers & Pesticides</a></li>
            <li><a href="irrigation.php"><i class="fas fa-tint"></i> Irrigation</a></li>
            <li><a href="organic-farming.php"><i class="fas fa-leaf"></i> Organic Farming</a></li>
            <li><a href="plant-protection.php"><i class="fas fa-shield-alt"></i> Plant Protection</a></li>
            <li><a href="logout.php" class="logout-btn"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
        </ul>
    </div>

    <div class="main-content">
        <header class="antique-header">
            <div class="container">
                <h1>Community</h1>
            </div>
        </header>
        <section class="community-info">
            <div class="container">
                <h2>Join Our Farming Community</h2>
                <p>Connect with fellow farmers, share your experiences, and learn from the community. Our platform offers a space where you can engage in discussions, ask questions, and find support from other members.</p>
                
                <h3>Community Features:</h3>
                <ul>
                    <li>Discussion Forums</li>
                    <li>Expert Q&A Sessions</li>
                    <li>Member-Shared Resources</li>
                    <li>Events and Webinars</li>
                </ul>
        
                <p><a href="community.html" class="btn">Join the Community</a></p>
            </div>
        </section>
        

        <section class="cta antique-cta">
            <div class="container">
                <h2>Stay Updated</h2>
                <p>Subscribe to our newsletter for the latest updates and exclusive content.</p>
                <form class="subscribe-form" action="subscribe.php" method="post">
                    <input type="email" name="email" placeholder="Enter your email" required>
                    <button type="submit">Subscribe</button>
                </form>
            </div>
        </section>

        <footer class="antique-footer">
            <div class="container">
                <p>&copy; 2024 Farming Info. All rights reserved.</p>
                <p><a href="#">Privacy Policy</a> | <a href="#">Terms of Service</a></p>
            </div>
        </footer>
    </div>

    <script>
        document.querySelector('.menu-toggle').addEventListener('click', function() {
            document.querySelector('.side-nav').classList.toggle('open');
            document.querySelector('.main-content').classList.toggle('shifted');
        });
    </script>
</body>
</html>



