<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Elite Gamer - Settings</title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <style>
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
        
        /* --- CONTENU PRINCIPAL --- */
        .main-content {
            flex: 1;
            margin-left: 260px;
            padding: 20px 30px;
        }

        .main-header h1 {
            font-size: 28px;
            font-weight: 600;
            margin-bottom: 30px;
        }

        /* --- STYLES SPÉCIFIQUES À LA PAGE SETTINGS --- */
        .card {
            background-color: var(--color-white);
            padding: 30px;
            border-radius: 15px;
            border: 1px solid var(--border-color-content);
            margin-bottom: 30px;
        }

        .card h2 {
            font-size: 20px;
            margin-bottom: 25px;
            padding-bottom: 15px;
            border-bottom: 1px solid var(--border-color-content);
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
            font-size: 13px;
        }

        .form-group input {
            width: 100%;
            padding: 12px 15px;
            border-radius: 8px;
            border: 1px solid var(--border-color-content);
            background-color: var(--color-bg);
            font-family: 'Poppins', sans-serif;
            font-size: 14px;
        }

        .form-group input:focus {
            outline: none;
            border-color: var(--color-primary);
        }
        
        .avatar-upload {
            display: flex;
            align-items: center;
            gap: 20px;
        }
        
        .avatar-upload img {
            width: 70px;
            height: 70px;
            border-radius: 50%;
            object-fit: cover;
        }

        .avatar-upload-btn {
            background-color: #e9ecef;
            color: var(--text-dark);
            padding: 8px 16px;
            border-radius: 8px;
            cursor: pointer;
            font-weight: 500;
        }

        .form-actions {
            display: flex;
            justify-content: flex-end;
            margin-top: 30px;
        }

        .save-btn {
            padding: 12px 25px;
            background-color: var(--color-primary);
            border: none;
            color: var(--text-dark);
            font-weight: 600;
            font-size: 14px;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .save-btn:hover {
            background-color: #ffca2c;
        }

        /* Responsive */
        @media (max-width: 992px) {
            .sidebar { transform: translateX(-100%); position: absolute; z-index: 1000; }
            .main-content { margin-left: 0; }
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
                <li><a href="tournaments.php"><i class="fa-solid fa-trophy"></i> Tournaments</a></li>
                <li><a href="streams.php"><i class="fa-solid fa-video"></i> Streams</a></li>
                <li><a href="article.php"><i class="fa-solid fa-newspaper"></i> Articles</a></li>
                <li><a href="shop.php"><i class="fa-solid fa-cart-shopping"></i> Shop</a></li>
                <li><a href="leader.php"><i class="fa-solid fa-chart-line"></i> Leaderboards</a></li>
                <p class="nav-title">ACCOUNT</p>
                <li><a href="support.php"><i class="fa-solid fa-headset"></i> Support</a></li>
                <li><a href="#" class="active"><i class="fa-solid fa-gear"></i> Settings</a></li>
            </ul>
        </nav>

        <main class="main-content">
            <header class="main-header">
                <h1>Paramètres du Compte</h1>
            </header>
            
            <form id="settings-form">
                <div class="card">
                    <h2>Informations du Profil</h2>
                    <div class="form-group">
                        <label for="username">Nom d'utilisateur</label>
                        <input type="text" id="username" value="BougayouMouad">
                    </div>
                    <div class="form-group">
                        <label for="email">Adresse Email</label>
                        <input type="email" id="email" value="bougayou.mouad@example.com">
                    </div>
                    <div class="form-group">
                        <label>Avatar</label>
                        <div class="avatar-upload">
                            <img src="avatar.jpg" alt="Avatar actuel">
                            <label for="avatar-file" class="avatar-upload-btn">Changer d'avatar</label>
                            <input type="file" id="avatar-file" style="display: none;">
                        </div>
                    </div>
                </div>

                <div class="card">
                    <h2>Changer le mot de passe</h2>
                    <div class="form-group">
                        <label for="current-password">Mot de passe actuel</label>
                        <input type="password" id="current-password" placeholder="••••••••">
                    </div>
                    <div class="form-group">
                        <label for="new-password">Nouveau mot de passe</label>
                        <input type="password" id="new-password" placeholder="••••••••">
                    </div>
                    <div class="form-group">
                        <label for="confirm-password">Confirmer le nouveau mot de passe</label>
                        <input type="password" id="confirm-password" placeholder="••••••••">
                    </div>
                </div>

                <div class="form-actions">
                    <button type="submit" class="save-btn">Enregistrer les modifications</button>
                </div>
            </form>
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

            // Script pour le formulaire des paramètres
            const settingsForm = document.getElementById('settings-form');
            settingsForm.addEventListener('submit', function(e) {
                e.preventDefault();
                alert('Vos paramètres ont été enregistrés avec succès !');
            });
        });
    </script>
</body>
</html>