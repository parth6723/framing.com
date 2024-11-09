<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Agricultural licenses</title>
    <link rel="stylesheet" href="agricultural-licence.css">
</head>

<body>
    <div class="side-nav">
        <div class="nav-header">
            <h2>Agricultural licenses</h2>
            <button class="menu-toggle"><i class="fas fa-times"></i></button>
        </div>
        <ul>
            < <li><a href="farming-info.php"><i class="fas fa-seedling"></i> Farming Information</a></li>
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
            <h1> Agricultural licenses</h1>
        </header>
        <section class="hero antique-hero">
            <div class="container">
                <h2>Here is some information about agricultural licenses in India</h2>
                <p>Your one-stop resource for all things farming.</p>
                <a href="farming-info.html" class="btn">Learn More</a>
            </div>
        </section>
        <section class="info-points">
            <div class="container">

                <ul>
                    Here is some information about agricultural licenses in India:

                    Food Safety and Standard Authority of India (FSSAI)
                    The FSSAI provides information on licenses for agricultural products, including downloadable forms for licensing, registration, and renewal.

                    FSSAI Basic Registration
                    Agricultural businesses with a turnover of less than Rs. 12 lakhs are considered small businesses and can apply for a basic food license. When the business turnover reaches Rs. 12 lakhs, the food license must be updated to state FSSAI registration.

                    Import Export Code (IEC) Number
                    All exporters and importers need to have an IEC Number.

                    Agricultural board trade license
                    Any person who deals in agricultural produce can register for an agricultural product license.

                    PACA Licensing
                    You can call the Agricultural Marketing Service toll free at 1-800-495-7222 for more information about licensing requirements or to apply for a license.

                </ul>
            </div>
        </section>

        <footer class="antique-footer">
            <p>&copy; 2024 Farming Information. All rights reserved.</p>
            <p><a href="#">Privacy Policy</a> | <a href="#">Terms of Service</a></p>
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