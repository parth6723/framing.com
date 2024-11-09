<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Farming Information </title>
    <link rel="stylesheet" href="farming-info.css">

</head>

<body>
    <div class="side-nav">
        <div class="nav-header">
            <a>
                <h2>Farming Info</h2</a>
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
                <h1>Welcome to Farming Info</h1>
            </div>
        </header>

        <section class="about-farming">
            <div class="container">
                <h2>About Farming</h2>
                <h3>Farming is the backbone of our society, providing essential food and resources to sustain life. Our farmers work tirelessly to cultivate the land, grow crops, and raise livestock, ensuring that we have access to fresh, nutritious food. The agricultural industry is vital to our economy, supporting rural communities, and creating jobs.</h3>
                <h5>Through modern techniques and sustainable practices, farming continues to evolve, meeting the challenges of a growing population and changing climate. At our core, we are dedicated to supporting farmers with the knowledge, resources, and tools they need to succeed.</h5>

                <h5>Agriculture, with its allied sectors, is unquestionably the largest livelihood provider in India, more so in the vast rural areas. It also contributes a significant figure to the Gross Domestic Product (GDP). Sustainable agriculture, in terms of food security, rural employment, and environmentally sustainable technologies such as soil conservation, sustainable natural resource management and biodiversity protection, are essential for holistic rural development. Indian agriculture and allied activities have witnessed a green revolution, a white revolution, a yellow revolution and a blue revolution.
                    This section provides the information on agriculture produces; machineries, research etc. Detailed information on the government policies, schemes, agriculture loans, market prices, animal husbandry, fisheries, horticulture, loans & credit, sericulture etc. is also available.</h5>
                <ul>
                    <li>Understanding different farming methods and techniques</li>
                    <li>Learning about the importance of soil health and water management</li>
                    <li>Exploring crop rotation and sustainable farming practices</li>
                    <li>Recognizing the significance of livestock and animal husbandry</li>
                </ul>
                <center>
                    <h1>Minister of Agriculture and Farmers Welfare</h1>
                    <h1>Cabinet Minister</h1>
                    <h2>Shri Shivraj Singh Chouhan</h2>
                </center>
            </div>
        </section>





        <script>
            document.querySelector('.menu-toggle').addEventListener('click', function() {
                document.querySelector('.side-nav').classList.toggle('open');
                document.querySelector('.main-content').classList.toggle('shifted');
            });
        </script>
</body>

</html>