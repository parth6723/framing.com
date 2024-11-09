<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agricultural produces</title>
    <link rel="stylesheet" href="agricultural-produces.css">

</head>

<body>
    <div class="side-nav">
        <div class="nav-header">
            <h2>Agricultural produces</h2>
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
                <h1>Agricultural produces</h1>
            </div>
        </header>

        <section class="info-points">
            <div class="container">
                <ul>
                    <li> <b> What is agricultural produce?</b>
                        <p>Agricultural produce includes all products that come from farms, gardens, orchards, and forests, including dairy, animal husbandry, fish, fishing, and peasant handicrafts.
                        </p>
                    </li>
                    <li><b> Examples of agricultural produce</b>
                        <p> Grains and cereals like wheat, rice, maize, barley, corn, sorghum, millet, and lentil. Spices like cumin, coriander, turmeric, fennel, cardamom, fenugreek, poppy, and carom. Oil seeds like soyabean, groundnut, flaxseeds, sesame, and mustard. Herbs like psyllium, basil, chia, ashwagandha, and chirayata.
                        </p>
                    </li>
                    <li> <b> Agricultural production activities</b>
                        <p> These include cultivating soil, planting, raising and harvesting crops, rearing, feeding, and managing animals.
                        </p>
                    </li>
                    <li> <b> Agricultural production types</b>
                        <p> These include aquaculture, floriculture, horticulture, maple syrup harvesting, and silviculture.
                        </p>
                    </li>
                    <li><b> Agricultural production information</b>
                        <p> The APEDA AgriExchange provides state-wise production data for agricultural products in India. The National Portal of India also offers services related to agriculture, including online crop insurance, a fertilizer distribution system, and the ability to register as a new farmer.
                        </p>
                    </li>
                </ul>
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