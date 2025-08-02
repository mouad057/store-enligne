<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Elite Gamer - Shop</title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <style>
        /* --- PALETTE DE COULEURS & STYLES GLOBAUX --- */
        :root {
            --color-bg: #F9F9F9;
            --color-white: #FFFFFF;
            --color-border: #EFEFEF;
            --color-text: #2c2c2c;
            --color-text-light: #888888;
            --color-primary: #FFD147; 
            --text-dark: #212529;
            --text-muted: #6c757d;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: var(--color-bg);
            color: var(--text-dark);
            font-size: 14px;
        }

        .dashboard-container {
            display: flex;
            min-height: 100vh;
        }

        /* --- STYLE DE LA BARRE LATÉRALE (MENU) --- */
        .sidebar {
            background-color: var(--color-white);
            width: 260px;
            padding: 25px 20px;
            border-right: 1px solid var(--color-border);
            display: flex;
            flex-direction: column;
            position: fixed;
            height: 100%;
            overflow-y: auto;
        }

        .sidebar-header .user-profile {
            display: flex;
            align-items: center;
            margin-bottom: 30px;
        }

        .sidebar-header .avatar {
            width: 45px;
            height: 45px;
            border-radius: 50%;
            margin-right: 15px;
            object-fit: cover;
            border: 2px solid var(--color-primary);
        }

        .sidebar-header .user-info {
            display: flex;
            flex-direction: column;
            line-height: 1.2;
        }

        .sidebar-header .user-info span {
            font-size: 0.9em;
            color: var(--color-text-light);
        }

        .sidebar-header .user-info strong {
            font-weight: 600;
            font-size: 16px;
        }

        .navigation {
            list-style: none;
            padding-left: 0;
        }

        .navigation .nav-title {
            color: var(--color-text-light);
            font-size: 0.75em;
            font-weight: 600;
            text-transform: uppercase;
            margin: 25px 0 15px 15px;
            letter-spacing: 0.5px;
        }

        .navigation li a {
            display: flex;
            align-items: center;
            padding: 12px 15px;
            text-decoration: none;
            color: var(--color-text-light);
            font-weight: 500;
            border-radius: 8px;
            margin-bottom: 5px;
            transition: background-color 0.3s, color 0.3s;
        }

        .navigation li a:hover {
            background-color: var(--color-bg);
            color: var(--color-text);
        }

        .navigation li a.active {
            background-color: var(--color-primary);
            color: var(--color-text);
            font-weight: 600;
        }

        .navigation li a i {
            width: 20px;
            margin-right: 15px;
            text-align: center;
        }

        .navigation li a .badge {
            margin-left: auto;
            background-color: var(--color-border);
            color: var(--color-text-light);
            font-size: 0.75em;
            padding: 2px 8px;
            border-radius: 10px;
            font-weight: 600;
        }
        
        .navigation li a.active .badge {
            background-color: rgba(0,0,0,0.1);
        }
        
        /* --- CONTENU PRINCIPAL --- */
        .main-content {
            flex: 1;
            margin-left: 260px;
            padding: 20px 30px;
        }

        .main-header {
            display: flex;
            justify-content: flex-end;
            align-items: center;
            margin-bottom: 30px;
        }
        
        .header-search {
            position: relative;
        }
        
        .header-search input {
            background-color: var(--color-white);
            border: 1px solid #dee2e6;
            border-radius: 8px;
            padding: 10px 15px 10px 40px;
            color: var(--text-dark);
            width: 300px;
        }
        
        .header-search i {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--text-muted);
        }
        
        /* --- STYLES SPÉCIFIQUES À LA PAGE SHOP --- */
        .shop-section h1 {
            font-size: 2.2em;
            font-weight: 600;
            color: var(--text-dark);
            margin-bottom: 5px;
        }

        .shop-section p {
            font-size: 1em;
            color: var(--text-muted);
            margin-bottom: 30px;
        }

        .product-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(260px, 1fr));
            gap: 30px;
        }

        .product-card {
            background-color: var(--color-white);
            border-radius: 15px;
            border: 1px solid #dee2e6;
            box-shadow: 0 4px 12px rgba(0,0,0,0.05);
            overflow: hidden;
            display: flex;
            flex-direction: column;
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .product-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(0,0,0,0.08);
        }

        .product-card img {
            width: 100%;
            height: 220px;
            object-fit: cover;
        }
        
        .product-card-content {
            padding: 20px;
            display: flex;
            flex-direction: column;
            flex-grow: 1;
        }

        .product-card h3 {
            font-size: 1.1em;
            font-weight: 600;
            color: var(--text-dark);
            margin-bottom: auto;
            line-height: 1.4;
        }

        .product-card .price {
            font-size: 1.3em;
            font-weight: 700;
            color: var(--text-dark);
            margin: 15px 0;
        }

        .add-to-cart-btn {
            display: block;
            width: 100%;
            padding: 12px;
            background-color: var(--color-primary);
            border: none;
            color: var(--text-dark);
            font-weight: 600;
            font-size: 0.9em;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.3s;
            text-align: center;
        }

        .add-to-cart-btn:hover {
            background-color: #ffca2c;
        }
    </style>
</head>
<body>
    <div class="dashboard-container">
        <nav class="sidebar">
            <div class="sidebar-header">
                <div class="user-profile">
                    <img src="avatar.jpg" class="avatar" alt="Avatar">
                    <div class="user-info">
                        <span>Welcome</span>
                        <strong>Bougayou Mouad</strong>
                    </div>
                </div>
            </div>

            <ul class="navigation">
                <li><a href="home.php"><i class="fa-solid fa-table-cells-large"></i> Dashboard</a></li>
                <p class="nav-title">NAVIGATION</p>
                <li><a href="tournaments.php"><i class="fa-solid fa-trophy"></i> Tournaments <span class="badge">12</span></a></li>
                <li><a href="streams.php"><i class="fa-solid fa-video"></i> Streams</a></li>
                <li><a href="article.php"><i class="fa-solid fa-newspaper"></i> Articles</a></li>
                <li><a href="shop.php" class="active"><i class="fa-solid fa-cart-shopping"></i> Shop</a></li>
                <li><a href="leader.php"><i class="fa-solid fa-chart-line"></i> Leaderboards</a></li>
                <p class="nav-title">ACCOUNT</p>
                <li><a href="support.php"><i class="fa-solid fa-headset"></i> Support</a></li>
                <li><a href="sitting.php"><i class="fa-solid fa-circle-question"></i> FAQ</a></li>gear"></i> Settings</a></li>
            </ul>
        </nav>

        <main class="main-content">
            <header class="main-header">
                <div class="header-search">
                    <i class="fa-solid fa-magnifying-glass"></i>
                    <input type="text" placeholder="Rechercher des produits...">
                </div>
            </header>

            <section class="shop-section">
                <h1>Notre Boutique</h1>
                <p>Équipez-vous avec le meilleur matériel gaming.</p>
                
                <div class="product-grid">
                    <?php
                        $products = [
                            ["name" => "Casque Gamer Pro", "price" => "79.99€", "image" => "casque.jpg"],
                            ["name" => "Clavier Mécanique RGB", "price" => "119.90€", "image" => "clavier.jpg"],
                            ["name" => "Souris Gamer Ultra-légère", "price" => "49.50€", "image" => "souris.png"],
                            ["name" => "Tapis de Souris XXL", "price" => "25.00€", "image" => "tapier.jpg"],
                            ["name" => "Manette Pro Sans-Fil", "price" => "65.00€", "image" => "1.jpg"],
                            ["name" => "Fauteuil Gamer Ergonomique", "price" => "249.99€", "image" => "https://images.unsplash.com/photo-1598550476439-6847785fcea6?w=600"],
                        ];

                        foreach ($products as $product) {
                            echo '<div class="product-card">';
                            echo '  <img src="' . htmlspecialchars($product['image']) . '" alt="' . htmlspecialchars($product['name']) . '">';
                            echo '  <div class="product-card-content">';
                            echo '      <h3>' . htmlspecialchars($product['name']) . '</h3>';
                            echo '      <p class="price">' . htmlspecialchars($product['price']) . '</p>';
                            echo '      <button class="add-to-cart-btn">Ajouter au panier</button>';
                            echo '  </div>';
                            echo '</div>';
                        }
                    ?>
                </div>
            </section>
        </main>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Script pour le menu
            const navLinks = document.querySelectorAll('.navigation li a');
            navLinks.forEach(link => {
                link.addEventListener('click', function(e) {
                    if (this.getAttribute('href') === '#') {
                        e.preventDefault();
                    }
                });
            });

            // Script pour les boutons d'ajout au panier
            const addToCartButtons = document.querySelectorAll('.add-to-cart-btn');
            addToCartButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const card = this.closest('.product-card');
                    const productName = card.querySelector('h3').textContent;
                    alert(productName + ' a été ajouté à votre panier !');
                });
            });
        });
    </script>
</body>
</html>