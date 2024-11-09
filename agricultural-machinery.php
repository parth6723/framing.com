<!DOCTYPE php>
<php lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Agricultural machinery</title>
        <link rel="stylesheet" href="agricultural-machinery.css">

    </head>

    <body>
        <div class="side-nav">
            <div class="nav-header">
                <h2>Agricultural machinery</h2>
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
                    <h1>Agricultural machinery</h1>
                </div>
            </header>


            <section class="info-points">
                <div class="container">
                    <ul>
                        <b> Agricultural machinery, also known as agricultural tech, is a broad category
                            of machines used to help farmers improve
                            their productivity and efficiency. Some examples of agricultural machinery include:
                        </b>

                        <li> Tractors and power</li>
                        <li> Tillage or soil cultivation machinery</li>
                        <li> Planting, seeding, fertilizing, and pest control machinery</li>
                        <li> Irrigation machinery</li>
                        <li> Harvesting, haymaking, and post-harvest machinery</li>
                        <li> Milking machinery</li>
                        <li> Grinder mixers</li>
                        <li> Wool presses</li>
                        <li> Windmills </li>

                       <p> Some specific examples of agricultural machinery and their uses include:Plough: A primary tillage tool that prepares land for planting
                        Combine harvester: A multi-crop machine that harvests multiple grain crops Rotavator or rotary tiller: A versatile tillage tool that breaks up soil
                        Disc harrow: A tillage tool that breaks up soil lumps and controls weeds Cultipacker: Levels planting surfaces by pressing stones into the soil, compacting clumps, and eliminating air pockets
                        Threshing drum: Beats cut crops to separate the grains from their stalks The central government's Sub-mission On Agriculture Mechanization (SMAM) scheme provides farmers with subsidies of 50 to 80 percent for buying agricultural machinery. Women farmers are given priority under the scheme.
                        </p>
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
            // JavaScript for toggle menu
            document.querySelector('.menu-toggle').addEventListener('click', function() {
                document.querySelector('.side-nav').classList.toggle('open');
                document.querySelector('.main-content').classList.toggle('shifted');
            });
        </script>
    </body>
</php>