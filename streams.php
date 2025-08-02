<?php
    // Définir le lien d'intégration de la vidéo YouTube ici
    // Important: il faut utiliser le lien "/embed/", pas le lien de partage normal.
    $youtubeEmbedUrl = "https://www.youtube.com/embed/dQw4w9WgXcQ"; // Lien d'exemple
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Elite Gamer - Streams</title>

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

            --text-dark: #212529;
            --text-muted: #6c757d;
            --border-color-content: #dee2e6;
            --live-dot-color: #dc3545;
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

        /* --- NOUVEAU DESIGN DU MENU (SIDEBAR) --- */
        .sidebar {
            background-color: var(--color-white);
            width: 260px; /* Largeur standardisée */
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
        
        /* --- STYLES DU CONTENU PRINCIPAL (STREAMS) --- */
        .main-content {
            flex: 1;
            margin-left: 260px; /* Ajusté à la nouvelle largeur de la sidebar */
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
        
        .header-search { position: relative; }
        
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
        
        .featured-stream { margin-bottom: 40px; }
        
        .video-player-wrapper {
            position: relative;
            padding-bottom: 56.25%; /* Ratio 16:9 */
            height: 0;
            overflow: hidden;
            background-color: #000;
            border-radius: 15px;
            margin-bottom: 20px;
        }
        
        .video-player-wrapper iframe {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
        }
        
        .stream-info { display: flex; align-items: flex-start; gap: 20px; }
        .streamer-avatar img { width: 55px; height: 55px; border-radius: 50%; border: 2px solid var(--color-primary); }
        .stream-details h2 { font-size: 22px; font-weight: 600; margin-bottom: 5px; }
        .stream-details .streamer-name { font-weight: 500; color: var(--text-dark); }
        .stream-details .game-category { color: var(--text-muted); }
        .live-channels-section h3 { font-size: 20px; margin-bottom: 20px; }
        
        .streams-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 25px;
        }
        
        .stream-card {
            background-color: var(--color-white);
            border-radius: 15px;
            overflow: hidden;
            border: 1px solid var(--border-color-content);
            transition: transform 0.3s, box-shadow 0.3s;
        }
        
        .stream-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(0,0,0,0.08);
        }
        
        .stream-thumbnail { position: relative; }
        .stream-thumbnail img { width: 100%; height: auto; display: block; }
        
        .live-badge {
            position: absolute;
            top: 10px;
            left: 10px;
            background-color: var(--live-dot-color);
            color: #fff;
            padding: 4px 10px;
            border-radius: 6px;
            font-size: 12px;
            font-weight: 600;
            text-transform: uppercase;
        }
        
        .viewers-count {
            position: absolute;
            bottom: 10px;
            left: 10px;
            background-color: rgba(0,0,0,0.6);
            color: #fff;
            padding: 4px 10px;
            border-radius: 6px;
            font-size: 12px;
        }
        
        .stream-card-info { display: flex; padding: 15px; gap: 15px; }
        .streamer-avatar-small img { width: 40px; height: 40px; border-radius: 50%; }
        .stream-card-details .stream-title { font-weight: 600; margin-bottom: 3px; display: block; color: var(--text-dark); text-decoration: none; }
        .stream-card-details .streamer-name,
        .stream-card-details .game-category { font-size: 13px; color: var(--text-muted); display: block; }

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
                    <img src="avatar.jpg" class="avatar">
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
                <li><a href="streams.php" class="active"><i class="fa-solid fa-video"></i> Streams</a></li>
                <li><a href="article.php"><i class="fa-solid fa-newspaper"></i> Articles</a></li>
                <li><a href="shop.php"><i class="fa-solid fa-cart-shopping"></i> Shop</a></li>
                <li><a href="leader.php"><i class="fa-solid fa-chart-line"></i> Leaderboards</a></li>
                <p class="nav-title">Account</p>
                <li><a href="support.php"><i class="fa-solid fa-headset"></i> Support</a></li>
                <li><a href="sitting.php"><i class="fa-solid fa-gear"></i> Settings</a></li>
            </ul>
        </aside>

        <main class="main-content">
            <header class="main-header">
                <div class="header-filters">
                    <div class="filter">Category: All</div>
                    <div class="filter">Order by: Viewers</div>
                </div>
                <div class="header-search">
                    <i class="fa-solid fa-magnifying-glass"></i>
                    <input type="text" placeholder="Search streams...">
                </div>
            </header>

            <section class="featured-stream">
                <div class="video-player-wrapper">
                    <iframe 
                        src="<?php echo htmlspecialchars($youtubeEmbedUrl); ?>" 
                        title="Lecteur vidéo YouTube" 
                        frameborder="0" 
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" 
                        allowfullscreen>
                    </iframe>
                </div>
                <div class="stream-info">
                    <div class="streamer-avatar">
                        <img src="https://images.unsplash.com/photo-1511367461989-f85a21fda167?q=80&w=1931&auto=format&fit=crop" alt="Avatar du streamer">
                    </div>
                    <div class="stream-details">
                        <h2>Grand Finals - World Championship 2025!</h2>
                        <span class="streamer-name">ProGamer123</span>
                        <span class="game-category">League of Legends</span>
                    </div>
                </div>
            </section>

            <section class="live-channels-section">
                <h3>Live Channels We Think You'll Like</h3>
                <div class="streams-grid">
                    <div class="stream-card">
                        <div class="stream-thumbnail">
                            <img src="valorant.jpg" alt="Miniature du stream">
                            <div class="live-badge">LIVE</div>
                            <div class="viewers-count">15.2K viewers</div>
                        </div>
                        <div class="stream-card-info">
                            <div class="streamer-avatar-small">
                                <img src="https://images.unsplash.com/photo-1535713875002-d1d0cf377fde?q=80&w=1780&auto=format&fit=crop" alt="Avatar">
                            </div>
                            <div class="stream-card-details">
                                <a href="#" class="stream-title">Ranked Climb to the Top!</a>
                                <span class="streamer-name">ValorantViper</span>
                                <span class="game-category">Valorant</span>
                            </div>
                        </div>
                    </div>
                    <div class="stream-card">
                        <div class="stream-thumbnail">
                            <img src="mini.avif" alt="Miniature du stream">
                            <div class="live-badge">LIVE</div>
                            <div class="viewers-count">11.8K viewers</div>
                        </div>
                        <div class="stream-card-info">
                            <div class="streamer-avatar-small">
                                <img src="https://images.unsplash.com/photo-1599566150163-29194dcaad36?q=80&w=1887&auto=format&fit=crop" alt="Avatar">
                            </div>
                            <div class="stream-card-details">
                                <a href="#" class="stream-title">Building a Mega-Castle</a>
                                <span class="streamer-name">CraftyMiner</span>
                                <span class="game-category">Minecraft</span>
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