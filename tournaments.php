<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Elite Gamer - Tournois</title>
    
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
            --color-primary: #FFD147; /* Jaune principal du nouveau menu */
            
            /* Couleurs conservées pour le contenu */
            --bg-panel: #f8f9fa;
            --text-dark: #212529;
            --text-muted: #6c757d;
            --border-color-content: #dee2e6; /* Renommée pour éviter conflit */
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
            flex-shrink: 0;
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
        
        /* --- STYLES DU CONTENU PRINCIPAL (CONSERVÉS) --- */
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
            width: 16px;
        }
        
        .tournaments-page-section {
            background-color: var(--color-white);
            padding: 30px;
            border-radius: 15px;
            border: 1px solid var(--border-color-content);
        }
        
        .tournaments-page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
        }
        
        .tournaments-page-header h2 {
            font-size: 24px;
            color: var(--text-dark);
        }
        
        .tournament-status-filters {
            display: flex;
            gap: 10px;
        }
        
        .tournament-status-filters .filter-btn {
            background-color: transparent;
            border: 1px solid var(--border-color-content);
            color: var(--text-muted);
            padding: 8px 16px;
            border-radius: 8px;
            cursor: pointer;
            font-family: 'Poppins', sans-serif;
            font-weight: 500;
            transition: all 0.3s;
        }
        
        .tournament-status-filters .filter-btn:hover {
            background-color: #e9ecef;
            color: var(--text-dark);
        }
        
        .tournament-status-filters .filter-btn.active {
            background-color: var(--color-primary);
            color: var(--text-dark);
            border-color: var(--color-primary);
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
            border: 1px solid var(--border-color-content);
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
        
        .card-content { padding: 20px; }
        .card-content h3 { font-size: 18px; margin-bottom: 10px; color: var(--text-dark); }
        .card-content p { font-size: 13px; color: var(--text-muted); margin-bottom: 15px; line-height: 1.5; }
        .card-footer { display: flex; justify-content: space-between; align-items: center; padding: 0 20px 20px; }
        
        .prize-pool {
            background-color: rgba(255, 193, 7, 0.15);
            color: #b38600;
            padding: 5px 12px;
            border-radius: 8px;
            font-weight: 600;
            font-size: 13px;
        }
        
        .join-btn {
            background-color: var(--color-primary);
            color: var(--text-dark);
            padding: 8px 18px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 600;
            font-size: 13px;
        }

        @media (max-width: 992px) {
            .sidebar { transform: translateX(-100%); position: absolute; z-index: 1000; transition: transform 0.3s ease-in-out; }
            .main-content { margin-left: 0; }
            body.menu-open .sidebar { transform: translateX(0); }
            .main-header, .tournaments-page-header { flex-direction: column; align-items: flex-start; gap: 15px; }
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
                <li><a href="tournaments.php" class="active"><i class="fa-solid fa-trophy"></i> Tournaments <span class="badge">12</span></a></li>
                <li><a href="streams.php"><i class="fa-solid fa-video"></i> Streams</a></li>
                <li><a href="article.php"><i class="fa-solid fa-newspaper"></i> Articles</a></li>
                <li><a href="shop.php"><i class="fa-solid fa-cart-shopping"></i> Shop</a></li>
                <li><a href="leader.php"><i class="fa-solid fa-chart-line"></i> Leaderboards</a></li>
                <p class="nav-title">Account</p>
                <li><a href="support.php"><i class="fa-solid fa-headset"></i> Support</a></li>
                <li><a href="sitting"><i class="fa-solid fa-gear"></i> Settings</a></li>
            </ul>
        </aside>

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

            <section class="tournaments-page-section">
                <div class="tournaments-page-header">
                    <h2>All Tournaments</h2>
                    <div class="tournament-status-filters">
                        <button class="filter-btn active">All</button>
                        <button class="filter-btn">Upcoming</button>
                        <button class="filter-btn">Live</button>
                        <button class="filter-btn">Finished</button>
                    </div>
                </div>
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
                    <div class="tournament-card">
                        <div class="card-image" style="background-image: url('apex.jpg')"></div>
                        <div class="card-content">
                            <h3>Apex Legends Masters</h3>
                            <p>Become the champion of the arena in this high-stakes competition.</p>
                        </div>
                        <div class="card-footer">
                            <span class="prize-pool">15,000 pts</span>
                            <a href="#" class="join-btn">Join Tournament</a>
                        </div>
                    </div>
                    <div class="tournament-card">
                        <div class="card-image" style="background-image: url('https://images.unsplash.com/photo-1580234811497-9df7fd2f357e?q=80&w=1932&auto=format&fit=crop')"></div>
                        <div class="card-content">
                            <h3>Rocket League Skies</h3>
                            <p>Fly high and score amazing goals to claim victory and the grand prize.</p>
                        </div>
                        <div class="card-footer">
                            <span class="prize-pool">9,000 pts</span>
                            <a href="#" class="join-btn">Join Tournament</a>
                        </div>
                    </div>
                     <div class="tournament-card">
                        <div class="card-image" style="background-image: url('fight.avif')"></div>
                        <div class="card-content">
                            <h3>Street Fighter Duel</h3>
                            <p>The ultimate 1v1 challenge. Do you have what it takes to be the best?</p>
                        </div>
                        <div class="card-footer">
                            <span class="prize-pool">5,000 pts</span>
                            <a href="#" class="join-btn">Join Tournament</a>
                        </div>
                    </div>
                     <div class="tournament-card">
                        <div class="card-image" style="background-image: url('mini.avif')"></div>
                        <div class="card-content">
                            <h3>Minecraft Build-Off</h3>
                            <p>Showcase your creativity and building skills in this epic build-off.</p>
                        </div>
                        <div class="card-footer">
                            <span class="prize-pool">7,500 pts</span>
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
            const navLinks = document.querySelectorAll('.navigation li a');
            navLinks.forEach(link => {
                link.addEventListener('click', function(e) {
                    if (this.getAttribute('href') !== '#') return; // Ne fait rien si c'est un vrai lien
                    e.preventDefault(); 
                    navLinks.forEach(l => l.classList.remove('active'));
                    this.classList.add('active');
                });
            });

            // Script pour les filtres de statut des tournois (conservé)
            const filterButtons = document.querySelectorAll('.filter-btn');
            filterButtons.forEach(button => {
                button.addEventListener('click', function() {
                    filterButtons.forEach(btn => btn.classList.remove('active'));
                    this.classList.add('active');
                    // Logique de filtrage à ajouter ici
                });
            });
        });
    </script>
</body>
</html>