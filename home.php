<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Elite Gamer - Dashboard</title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <style>
        /* --- PALETTE DE COULEURS & STYLES GLOBAUX --- */
        :root {
            /* Couleurs du nouveau design de menu */
            --color-bg: #F9F9F9;
            --color-white: #FFFFFF;
            --color-border: #EFEFEF;
            --color-text: #2c2c2c;
            --color-text-light: #888888;
            --color-primary: #FFD147; /* Jaune principal */
            
            /* Couleurs conservées pour le contenu principal */
            --primary-accent: #ffc107;
            --text-dark: #212529;
            --text-muted: #6c757d;
            --border-color: #dee2e6;
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

        /* --- NOUVEAU STYLE DE LA BARRE LATÉRALE (MENU) --- */
        .sidebar {
            background-color: var(--color-white);
            width: 260px;
            padding: 25px 20px;
            border-right: 1px solid var(--color-border);
            display: flex;
            flex-direction: column;
            flex-shrink: 0;
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
        
        /* --- CONTENU PRINCIPAL (Styles conservés) --- */
        .main-content {
            flex: 1;
            margin-left: 260px; /* Espace pour la barre latérale fixe */
            padding: 20px 30px;
        }

        /* Header */
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
            border: 1px solid var(--border-color);
        }
        
        .header-search {
            position: relative;
        }
        
        .header-search input {
            background-color: var(--color-white);
            border: 1px solid var(--border-color);
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
            width: 16px;
        }
        
        /* Hero Section */
        .hero-section {
            background-image: url('https://images.unsplash.com/photo-1542751371-adc38448a05e?q=80&w=2070&auto=format&fit=crop');
            background-size: cover;
            background-position: center;
            border-radius: 15px;
            padding: 40px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            min-height: 350px;
            position: relative;
            margin-bottom: 40px;
            color: #fff;
        }
        
        .hero-section::before {
            content: '';
            position: absolute;
            top: 0; left: 0;
            width: 100%; height: 100%;
            background: linear-gradient(90deg, rgba(26, 30, 42, 0.8) 0%, rgba(26, 30, 42, 0.1) 100%);
            border-radius: 15px;
        }
        
        .hero-content {
            position: relative;
            z-index: 2;
            max-width: 50%;
        }
        
        .hero-content h1 {
            font-size: 36px;
            font-weight: 700;
            margin-bottom: 10px;
        }
        
        .hero-content p {
            color: #e9ecef;
            margin-bottom: 20px;
        }
        
        .hero-stats {
            display: flex;
            gap: 30px;
        }
        
        .hero-stats .stat-item strong {
            font-size: 24px;
            font-weight: 600;
            color: var(--primary-accent);
        }
        
        .hero-stats .stat-item span {
            font-size: 13px;
            color: #e9ecef;
            margin-left: 8px;
        }
        
        /* Tournaments Section */
        .tournaments-section h2 {
            font-size: 22px;
            margin-bottom: 20px;
            color: var(--text-dark);
        }
        
        .tournaments-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 25px;
        }
        
        .tournament-card {
            background-color: var(--color-white);
            border-radius: 15px;
            overflow: hidden;
            border: 1px solid var(--border-color);
            box-shadow: 0 4px 12px rgba(0,0,0,0.05);
            transition: transform 0.3s, box-shadow 0.3s;
        }
        
        .tournament-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(0,0,0,0.08);
        }
        
        .card-image {
            height: 150px;
            background-size: cover;
            background-position: center;
        }
        
        .card-content {
            padding: 20px;
        }
        
        .card-content h3 {
            font-size: 18px;
            margin-bottom: 10px;
            color: var(--text-dark);
        }
        
        .card-content p {
            font-size: 13px;
            color: var(--text-muted);
            margin-bottom: 15px;
            line-height: 1.5;
        }
        
        .card-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 20px 20px;
        }
        
        .prize-pool {
            background-color: rgba(255, 193, 7, 0.15);
            color: #b38600;
            padding: 5px 12px;
            border-radius: 8px;
            font-weight: 600;
            font-size: 13px;
        }
        
        .join-btn {
            background-color: var(--primary-accent);
            color: var(--text-dark);
            padding: 8px 18px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 600;
            font-size: 13px;
        }

        /* Responsive */
        @media (max-width: 992px) {
            .sidebar {
                transform: translateX(-100%);
                position: absolute;
                z-index: 1000;
            }
            .main-content {
                margin-left: 0;
            }
            .main-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 15px;
            }
        }
    </style>
</head>
<body>
    <div class="dashboard-container">
        <nav class="sidebar">
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
                <li><a href="#" class="active"><i class="fa-solid fa-table-cells-large"></i> Dashboard</a></li>
                <p class="nav-title">NAVIGATION</p>
                <li><a href="tournaments.php"><i class="fa-solid fa-trophy"></i> Tournaments <span class="badge">12</span></a></li>
                <li><a href="streams.php"><i class="fa-solid fa-video"></i> Streams</a></li>
                <li><a href="article.php"><i class="fa-solid fa-newspaper"></i> Articles</a></li>
                <li><a href="shop.php"><i class="fa-solid fa-cart-shopping"></i> Shop</a></li>
                <li><a href="leader.php"><i class="fa-solid fa-chart-line"></i> Leaderboards</a></li>
                <p class="nav-title">ACCOUNT</p>
                <li><a href="support.php"><i class="fa-solid fa-headset"></i> Support</a></li>
                <li><a href="setting.php"><i class="fa-solid fa-gear"></i> Settings</a></li>
            </ul>
        </nav>

        <main class="main-content">
            <header class="main-header">
                <div class="header-filters">
                    <div class="filter">Order by: Relevance</div>
                    <div class="filter">All Platforms</div>
                    <div class="filter">Region: Europe</div>
                </div>
                <div class="header-search">
                    <i class="fa-solid fa-magnifying-glass"></i>
                    <input type="text" placeholder="Search in Tournaments...">
                </div>
            </header>

            <section class="hero-section">
                <div class="hero-content">
                    <h1>COMPETE IN YOUR FAVOURITE GAMES</h1>
                    <p>Compete in epic tournaments on Elite Gamers Arena.</p>
                    <div class="hero-stats">
                        <div class="stat-item">
                            <strong>3200</strong>
                            <span>Matches played</span>
                        </div>
                        <div class="stat-item">
                            <strong>235</strong>
                            <span>Tournaments held</span>
                        </div>
                    </div>
                </div>
            </section>

            <section class="tournaments-section">
                <h2>Featured Tournaments</h2>
                <div class="tournaments-grid">
                    <div class="tournament-card">
                        <div class="card-image" style="background-image: url('winter.png')"></div>
                        <div class="card-content">
                            <h3>Winter 2025 Tournament</h3>
                            <p>Compete with your friends in this winter season themed championship.</p>
                        </div>
                        <div class="card-footer">
                            <span class="prize-pool">12,500 pts</span>
                            <a href="#" class="join-btn">Join Tournament</a>
                        </div>
                    </div>
                    <div class="tournament-card">
                        <div class="card-image" style="background-image: url('https://images.unsplash.com/photo-1665686306574-1ace09918530?q=80&w=1974&auto=format&fit=crop')"></div>
                        <div class="card-content">
                            <h3>Another Tournament Title</h3>
                            <p>One more perfect is coming upon us. Be sure to sign up for this.</p>
                        </div>
                        <div class="card-footer">
                            <span class="prize-pool">10,000 pts</span>
                            <a href="#" class="join-btn">Join Tournament</a>
                        </div>
                    </div>
                    <div class="tournament-card">
                        <div class="card-image" style="background-image: url('fortnite.jpg')"></div>
                        <div class="card-content">
                            <h3>Fortnite Epic Challenge</h3>
                            <p>The incredible challenge awaits you in this random paragraph.</p>
                        </div>
                        <div class="card-footer">
                            <span class="prize-pool">13,500 pts</span>
                            <a href="#" class="join-btn">Join Tournament</a>
                        </div>
                    </div>
                    <div class="tournament-card">
                        <div class="card-image" style="background-image: url('jeu.jpg')"></div>
                        <div class="card-content">
                            <h3>Guns & Glory Championship</h3>
                            <p>Pewpew everyone or die trying. Random text example message.</p>
                        </div>
                        <div class="card-footer">
                            <span class="prize-pool">11,000 pts</span>
                            <a href="#" class="join-btn">Join Tournament</a>
                        </div>
                    </div>
                </div>
            </section>
        </main>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // SCRIPT MIS À JOUR pour le nouveau menu
            // Il sélectionne maintenant les liens par '.navigation li a'
            const navLinks = document.querySelectorAll('.navigation li a');
            
            navLinks.forEach(link => {
                link.addEventListener('click', function(e) {
                    // On ne prévient le comportement par défaut que si le lien est "#"
                    if (this.getAttribute('href') === '#') {
                        e.preventDefault(); 
                    }
                    // Enlève la classe 'active' de tous les liens
                    navLinks.forEach(l => l.classList.remove('active'));
                    // Ajoute la classe 'active' au lien cliqué
                    this.classList.add('active');
                });
            });
        });
    </script>
</body>
</html>