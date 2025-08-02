<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Elite Gamer - Articles</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <style>
        /* --- PALETTE DE COULEURS UNIFIÉE --- */
        :root {
            --color-bg: #F9F9F9;
            --color-white: #FFFFFF;
            --color-border: #EFEFEF;
            --color-text: #2c2c2c;
            --color-text-light: #888888;
            --color-primary: #FFD147; /* Jaune principal */

            --bg-panel: #f8f9fa;
            --text-dark: #212529;
            --text-muted: #6c757d;
            --border-color-content: #dee2e6;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: var(--bg-panel);
            color: var(--text-dark);
            font-size: 14px;
        }

        .dashboard-container {
            display: flex;
            min-height: 100vh;
        }

        /* --- NOUVEAU DESIGN DU MENU (SIDEBAR) --- */
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
            padding-bottom: 20px;
            border-bottom: 1px solid var(--color-border);
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
            color: var(--text-dark);
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
            margin: 20px 0 10px 15px;
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
            font-size: 1.1em;
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
            background-color: rgba(44, 44, 44, 0.1);
            color: var(--color-text);
        }

        /* --- STYLES DU CONTENU PRINCIPAL (ARTICLES) --- */
        .main-content {
            flex: 1;
            margin-left: 260px;
            padding: 20px 30px;
        }

        .main-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }

        .header-filters {
            display: flex;
            gap: 20px;
        }

        .header-filters .filter {
            background-color: var(--color-white);
            padding: 8px 15px;
            border-radius: 8px;
            font-size: 13px;
            border: 1px solid var(--border-color-content);
        }

        .header-search {
            position: relative;
        }

        .header-search input {
            background-color: var(--color-white);
            border: 1px solid var(--border-color-content);
            border-radius: 8px;
            padding: 8px 15px 8px 40px;
            color: var(--text-dark);
            width: 250px;
        }

        .header-search i {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--text-muted);
        }

        .featured-article {
            display: flex;
            gap: 30px;
            background-color: var(--color-white);
            padding: 20px;
            border-radius: 15px;
            border: 1px solid var(--border-color-content);
            margin-bottom: 40px;
        }

        .featured-article-image { flex-basis: 55%; }
        .featured-article-image img { width: 100%; height: 100%; object-fit: cover; border-radius: 10px; }
        .featured-article-content { flex-basis: 45%; display: flex; flex-direction: column; }
        .featured-article-content .category { color: var(--color-primary); font-weight: 600; margin-bottom: 10px; }
        .featured-article-content h2 { font-size: 28px; font-weight: 600; margin-bottom: 15px; line-height: 1.3; }
        .featured-article-content p { color: var(--text-muted); line-height: 1.6; margin-bottom: 20px; }
        
        .article-meta {
            margin-top: auto;
            display: flex;
            align-items: center;
            gap: 15px;
            font-size: 13px;
            color: var(--text-muted);
        }
        
        .article-meta img { width: 40px; height: 40px; border-radius: 50%; }
        .author-info strong { display: block; color: var(--text-dark); font-weight: 500; }
        
        .articles-section h3 { font-size: 20px; margin-bottom: 20px; }
        
        .articles-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 25px;
        }
        
        .article-card {
            background-color: var(--color-white);
            border-radius: 15px;
            overflow: hidden;
            border: 1px solid var(--border-color-content);
            box-shadow: 0 4px 12px rgba(0,0,0,0.05);
            transition: transform 0.3s, box-shadow 0.3s;
        }
        
        .article-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(0,0,0,0.08);
        }
        
        .article-card-image img { width: 100%; height: 160px; object-fit: cover; }
        .article-card-content { padding: 20px; }
        .article-card-content h4 { font-size: 16px; font-weight: 600; margin-bottom: 10px; line-height: 1.4; }
        
        .article-card-meta {
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 12px;
            color: var(--text-muted);
        }
        
        .article-card-meta img { width: 30px; height: 30px; border-radius: 50%; }

        @media (max-width: 1200px) {
            .featured-article { flex-direction: column; }
        }
        
        @media (max-width: 992px) {
            .sidebar { transform: translateX(-100%); position: absolute; z-index: 1000; }
            .main-content { margin-left: 0; }
            .main-header { flex-direction: column; align-items: flex-start; gap: 15px; }
        }
        
    </style>
</head>
<body>
    <div class="dashboard-container">
        <aside class="sidebar">
            <div class="sidebar-header">
                <div class="user-profile">
                    <img src="avatar.jpg" class="avatar" alt="Avatar de l'utilisateur">
                    <div class="user-info">
                        <span>Welcome</span>
                        <strong>Bougayou Mouad</strong>
                    </div>
                </div>
            </div>

            <ul class="navigation">
                <li><a href="home.php"><i class="fa-solid fa-table-cells-large"></i> Dashboard</a></li>
                <p class="nav-title">Navigation</p>
                <li><a href="tournaments.php"><i class="fa-solid fa-trophy"></i> Tournaments <span class="badge">12</span></a></li>
                <li><a href="streams.php"><i class="fa-solid fa-video"></i> Streams</a></li>
                <li><a href="article.php" class="active"><i class="fa-solid fa-newspaper"></i> Articles</a></li>
                <li><a href="shop.php"><i class="fa-solid fa-cart-shopping"></i> Shop</a></li>
                <li><a href="leader.php"><i class="fa-solid fa-chart-line"></i> Leaderboards</a></li>
                <p class="nav-title">Account</p>
                <li><a href="support.php"><i class="fa-solid fa-headset"></i> Support</a></li>
                <li><a href="sitting.php"><i class="fa-solid fa-circle-question"></i> FAQ</a></li>gear"></i> Settings</a></li>
            </ul>
        </aside>

        <main class="main-content">
            <header class="main-header">
                <div class="header-filters">
                    <div class="filter">Category: All</div>
                    <div class="filter">Order by: Latest</div>
                </div>
                <div class="header-search">
                    <i class="fa-solid fa-magnifying-glass"></i>
                    <input type="text" placeholder="Search articles...">
                </div>
            </header>

            <section class="featured-article">
                <div class="featured-article-image">
                    <img src="https://images.unsplash.com/photo-1511512578047-dfb367046420?q=80&w=2071&auto=format&fit=crop" alt="Image de l'article en vedette">
                </div>
                <div class="featured-article-content">
                    <span class="category">NEWS</span>
                    <h2>The Future of Esports: What to Expect in 2026</h2>
                    <p>Discover the upcoming trends, new games hitting the professional scene, and how technology is shaping the future of competitive gaming.</p>
                    <div class="article-meta">
                        <img src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?q=80&w=1887&auto=format&fit=crop" alt="Auteur Jane Doe">
                        <div class="author-info">
                            <strong>Jane Doe</strong>
                            <span>August 2, 2025</span>
                        </div>
                    </div>
                </div>
            </section>

            <section class="articles-section">
                <h3>Latest Articles</h3>
                <div class="articles-grid">
                    <div class="article-card">
                        <div class="article-card-image">
                            <img src="cask.jpg" alt="Casque de jeu">
                        </div>
                        <div class="article-card-content">
                            <h4>Top 5 Gaming Headsets for an Immersive Experience</h4>
                            <div class="article-card-meta">
                                <img src="https://images.unsplash.com/photo-1535713875002-d1d0cf377fde?q=80&w=1780&auto=format&fit=crop" alt="Auteur John Smith">
                                <span>John Smith</span>
                            </div>
                        </div>
                    </div>
                    <div class="article-card">
                        <div class="article-card-image">
                            <img src="https://images.unsplash.com/photo-1580327344181-c1163234e5a0?q=80&w=2070&auto=format&fit=crop" alt="Image d'un PC de jeu">
                        </div>
                        <div class="article-card-content">
                            <h4>How to Build Your First Gaming PC: A Beginner's Guide</h4>
                            <div class="article-card-meta">
                                <img src="https://images.unsplash.com/photo-1599566150163-29194dcaad36?q=80&w=1887&auto=format&fit=crop" alt="Auteur Emily White">
                                <span>Emily White</span>
                            </div>
                        </div>
                    </div>
                    <div class="article-card">
                        <div class="article-card-image">
                            <img src="retro.avif" alt="Image de jeu rétro">
                        </div>
                        <div class="article-card-content">
                            <h4>The Rise of Retro Gaming: Why Old is Gold</h4>
                            <div class="article-card-meta">
                                <img src="https://images.unsplash.com/photo-1566275529824-cca6d008f3da?q=80&w=1887&auto=format&fit=crop" alt="Auteur Chris Green">
                                <span>Chris Green</span>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // SCRIPT MIS À JOUR pour le nouveau menu
            const navLinks = document.querySelectorAll('.navigation li a');
            navLinks.forEach(link => {
                link.addEventListener('click', function(e) {
                    // Ne prévient le comportement que si le href est "#"
                    if (this.getAttribute('href') !== '#') return;
                    e.preventDefault(); 
                    
                    navLinks.forEach(l => l.classList.remove('active'));
                    this.classList.add('active');
                });
            });
        });
    </script>
</body>
</html>