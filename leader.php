<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Elite Gamer - Leaderboards</title>
    
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
            --border-color-content: #dee2e6;
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
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }
        
        .header-filters {
            display: flex;
            gap: 10px;
        }
        
        .header-filters .filter-btn {
            background-color: var(--color-white);
            border: 1px solid var(--border-color-content);
            color: var(--text-muted);
            padding: 8px 16px;
            border-radius: 8px;
            cursor: pointer;
            font-family: 'Poppins', sans-serif;
            font-weight: 500;
            transition: all 0.3s;
        }
        
        .header-filters .filter-btn:hover {
            background-color: #e9ecef;
            color: var(--text-dark);
        }
        
        .header-filters .filter-btn.active {
            background-color: var(--color-primary);
            color: var(--text-dark);
            border-color: var(--color-primary);
        }
        
        .header-search {
            position: relative;
        }
        
        .header-search input {
            background-color: var(--color-white);
            border: 1px solid var(--border-color-content);
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
        
        /* --- STYLES SPÉCIFIQUES À LA PAGE LEADERBOARDS --- */
        .leaderboard-section {
            background-color: var(--color-white);
            padding: 30px;
            border-radius: 15px;
            border: 1px solid var(--border-color-content);
        }
        
        .leaderboard-section h1 {
            font-size: 24px;
            color: var(--text-dark);
            margin-bottom: 25px;
        }
        
        .leaderboard-table {
            width: 100%;
            border-collapse: collapse;
        }
        
        .leaderboard-table th,
        .leaderboard-table td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid var(--color-border);
        }
        
        .leaderboard-table thead th {
            font-size: 12px;
            font-weight: 500;
            color: var(--text-muted);
            text-transform: uppercase;
        }
        
        .leaderboard-table tbody tr:hover {
            background-color: var(--color-bg);
        }
        
        .leaderboard-table .rank {
            font-weight: 600;
            font-size: 1.1em;
            color: var(--text-dark);
            text-align: center;
        }

        .leaderboard-table .player-info {
            display: flex;
            align-items: center;
            gap: 15px;
        }
        
        .leaderboard-table .player-info img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            object-fit: cover;
        }
        
        .leaderboard-table .player-info span {
            font-weight: 500;
        }

        .leaderboard-table .points {
            font-weight: 600;
            font-size: 1.1em;
            color: var(--text-dark);
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
                <li><a href="shop.php"><i class="fa-solid fa-cart-shopping"></i> Shop</a></li>
                <li><a href="leaderboards.php" class="active"><i class="fa-solid fa-chart-line"></i> Leaderboards</a></li>
                <p class="nav-title">ACCOUNT</p>
                <li><a href="support.php"><i class="fa-solid fa-headset"></i> Support</a></li>
                <li><a href="sitting.php"><i class="fa-solid fa-gear"></i> Settings</a></li>
            </ul>
        </nav>

        <main class="main-content">
            <header class="main-header">
                <div class="header-filters">
                    <button class="filter-btn active">Général</button>
                    <button class="filter-btn">Hebdomadaire</button>
                    <button class="filter-btn">Par Jeu</button>
                </div>
                <div class="header-search">
                    <i class="fa-solid fa-magnifying-glass"></i>
                    <input type="text" placeholder="Rechercher un joueur...">
                </div>
            </header>

            <section class="leaderboard-section">
                <h1>Classement Général</h1>
                <table class="leaderboard-table">
                    <thead>
                        <tr>
                            <th style="width: 10%; text-align: center;">Rang</th>
                            <th style="width: 60%;">Joueur</th>
                            <th style="width: 30%;">Points</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $players = [
                                ["rank" => 1, "name" => "ShadowStriker", "avatar" => "https://i.pravatar.cc/150?u=a042581f4e29026704d", "points" => 15230],
                                ["rank" => 2, "name" => "CyberNinja", "avatar" => "https://i.pravatar.cc/150?u=a042581f4e29026705d", "points" => 14890],
                                ["rank" => 3, "name" => "PixelPilot", "avatar" => "https://i.pravatar.cc/150?u=a042581f4e29026706d", "points" => 14500],
                                ["rank" => 4, "name" => "VortexViper", "avatar" => "https://i.pravatar.cc/150?u=a042581f4e29026707d", "points" => 13980],
                                ["rank" => 5, "name" => "AlphaAce", "avatar" => "https://i.pravatar.cc/150?u=a042581f4e29026708d", "points" => 13550],
                                ["rank" => 6, "name" => "Ironclad", "avatar" => "https://i.pravatar.cc/150?u=a042581f4e29026709d", "points" => 13210],
                                ["rank" => 7, "name" => "BlitzQueen", "avatar" => "https://i.pravatar.cc/150?u=a042581f4e29026710d", "points" => 12870],
                                ["rank" => 8, "name" => "NovaSpecter", "avatar" => "https://i.pravatar.cc/150?u=a042581f4e29026711d", "points" => 12500],
                            ];

                            foreach ($players as $player) {
                                echo '<tr>';
                                echo '  <td class="rank">' . htmlspecialchars($player['rank']) . '</td>';
                                echo '  <td>';
                                echo '      <div class="player-info">';
                                echo '          <img src="' . htmlspecialchars($player['avatar']) . '" alt="Avatar de ' . htmlspecialchars($player['name']) . '">';
                                echo '          <span>' . htmlspecialchars($player['name']) . '</span>';
                                echo '      </div>';
                                echo '  </td>';
                                echo '  <td class="points">' . number_format($player['points']) . ' pts</td>';
                                echo '</tr>';
                            }
                        ?>
                    </tbody>
                </table>
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

            // Script pour les filtres
            const filterButtons = document.querySelectorAll('.filter-btn');
            filterButtons.forEach(button => {
                button.addEventListener('click', function() {
                    filterButtons.forEach(btn => btn.classList.remove('active'));
                    this.classList.add('active');
                });
            });
        });
    </script>
</body>
</html>