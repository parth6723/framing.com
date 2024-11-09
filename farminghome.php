<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage - Farming Information and Seed Products</title>

    <link rel="stylesheet" href="Farminghome.css">
    
</head>

<body style="background-color: black; color: white;">

    <nav class="navbar">
        <a class="navbar-brand" href="farminghome.php">
            <img src="backlook/farm-logo.jpg" width="70" height="70" alt="Farm Logo">
        </a>
        <ul class="navbar-menu">
            <li><a href="farminghome.php" class="nav-link">Home</a></li>
            <li><a href="farming-store.php" class="nav-link">Store</a></li>
            
            <li class="dropdown">
                <a href="#" class="dropdown-toggle">Menu</a>
                <div class="dropdown-content">
                    <a href="farming-info.php">Farming Info</a>
                    <a href="seed-products.php">Seed Products</a>
                    <a href="community.php">Community</a>
                    <a href="agriculture.php">Agriculture</a>
                    <a href="agricultural-licence.php">Agricultural Licence</a>
                    <a href="agricultural-machinery.php">Agricultural Machinery</a>
                    <a href="agricultural-produces.php">Agricultural Produces</a>
                    <a href="crops.php">Crops</a>
                    <a href="fertilizers-pesticides.php">Fertilizers & Pesticides</a>
                    <a href="irrigation.php">Irrigation</a>
                    <a href="organic-farming.php">Organic Farming</a>
                    <a href="plant-protection.php">Plant Protection</a>
                </div>
            </li>
            <li><a href="logout.php" class="nav-link btn-danger">Logout</a></li>
        </ul>
    </nav>

    <main style="padding-top: 70px;">
        <header>
            <div class="container">
            <h1 class="animated-text">
                    <span class="left">F</span>
                    <span class="left">a</span>
                    <span class="left">r</span>
                    <span class="left">m</span>
                    <span class="left">i</span>
                    <span class="left">n</span>
                    <span class="right">g</span>
&ThinSpace;
                    <span class="right">I</span>
                    <span class="right">n</span>
                    <span class="right">f</span>
                    <span class="right">o</span>
                    &ThinSpace;
                    <span class="right">H</span>
                    <span class="right">u</span>
                    <span class="right">b</span>
                </h1>
            </div>
        </header>

        <section class="hero">
            <div class="container">
                <h2>Welcome to the Ultimate Farming Resource Hub</h2>
                <p>Your one-stop destination for all farming techniques, guides, and top-quality seed products.</p>
                <a href="farming-info.php" class="btn">Learn More</a>
            </div>
        </section>

        <section class="video-section">
            <div class="container">
                <h1>Explore the Beauty of Farming</h1>
                <hr>
                <hr>
                <video autoplay muted loop class="bg-video" width="100%">
                    <source src="backlook/farminfo.mp4" type="video/mp4">
                    Your browser does not support HTML5 video.
                </video>
                <br>
                <hr>
                <hr>
                <b>
                    <h1>Transforming Agricultural Processes with Drone Technology.</h1>
                </b>
            </div>
        </section>

        <section class="photo-gallery">
            <div class="container">
                <hr>
                <h2>Farming in Action</h2>
                <hr>
                <div class="row">
                    <div class="col-md-4">
                        <img src="backlook/farm2.jpg" class="img-fluid" alt="Farm Machinery">
                        <p>State-of-the-art machinery used for efficient farming operations.</p>
                    </div>
                    <div class="col-md-4">
                        <img src="backlook/farm3.jpg" class="img-fluid" alt="Organic Farming">
                        <p>Organic farming techniques to boost soil health and crop yield.</p>
                    </div>
                    <div class="col-md-4">
                        <img src="backlook/farm4.jpg" class="img-fluid" alt="Crop Rotation">
                        <p>Crops being rotated to maintain soil fertility and reduce pests.</p>
                    </div>
                </div>
            </div>
        </section>

        <section class="info-points">
            <div class="container">
                <h2>Key Points of Interest:</h2>
                <ul>
                    <li>📘 Comprehensive guides on farming techniques and best practices.</li>
                    <li>🌱 Access to a wide range of high-quality seed products.</li>
                    <li>👥 Community support and discussion forums.</li>
                    <li>⚙️ Detailed information on agricultural machinery and licenses.</li>
                    <li>🛡️ Insights into crop protection, fertilizers, and pest control.</li>
                    <li>🌿 Latest trends in organic farming and sustainable practices.</li>
                    <li>☀️ Up-to-date weather forecasts and soil conservation methods.</li>
                </ul>
            </div>
        </section>

        <footer>
            <div class="container">
                <p>&copy; 2024 Farming Information and Seed Products. All rights reserved.</p>
                <p><a href="privacy-policy.html">Privacy Policy</a> | <a href="terms-conditions.html">Terms & Conditions</a></p>
            </div>
        </footer>
    </main>

</body>

</html>

