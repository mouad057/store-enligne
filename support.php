<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Elite Gamer - Support</title>
    
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

        .navigation li a .badge {
            margin-left: auto;
            background-color: var(--color-border);
            color: var(--color-text-light);
            font-size: 0.75em;
            padding: 2px 8px;
            border-radius: 10px;
            font-weight: 600;
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
        
        /* --- STYLES SPÉCIFIQUES À LA PAGE SUPPORT --- */
        .support-grid {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 30px;
        }

        .card {
            background-color: var(--color-white);
            padding: 30px;
            border-radius: 15px;
            border: 1px solid var(--border-color-content);
        }

        .card h2 {
            font-size: 22px;
            margin-bottom: 25px;
        }

        /* FAQ Section */
        .faq-item {
            border-bottom: 1px solid var(--border-color-content);
            padding-bottom: 15px;
            margin-bottom: 15px;
        }
        .faq-item:last-child {
            border-bottom: none;
            margin-bottom: 0;
        }
        .faq-question {
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-weight: 500;
            cursor: pointer;
        }
        .faq-question i {
            transition: transform 0.3s;
        }
        .faq-answer {
            color: var(--text-muted);
            margin-top: 15px;
            line-height: 1.6;
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.3s ease-out;
        }
        .faq-item.active .faq-answer {
            max-height: 200px; /* Hauteur suffisante pour la réponse */
        }
        .faq-item.active .faq-question i {
            transform: rotate(180deg);
        }

        /* Formulaire de contact */
        .contact-form .form-group {
            margin-bottom: 20px;
        }
        .contact-form label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
            font-size: 13px;
        }
        .contact-form input,
        .contact-form textarea {
            width: 100%;
            padding: 12px 15px;
            border-radius: 8px;
            border: 1px solid var(--border-color-content);
            background-color: var(--color-bg);
            font-family: 'Poppins', sans-serif;
            font-size: 14px;
        }
        .contact-form input:focus,
        .contact-form textarea:focus {
            outline: none;
            border-color: var(--color-primary);
        }
        .contact-form textarea {
            min-height: 120px;
            resize: vertical;
        }
        .contact-form .submit-btn {
            width: 100%;
            padding: 12px;
            background-color: var(--color-primary);
            border: none;
            color: var(--text-dark);
            font-weight: 600;
            font-size: 14px;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .contact-form .submit-btn:hover {
            background-color: #ffca2c;
        }

        /* Responsive */
        @media (max-width: 992px) {
            .sidebar { transform: translateX(-100%); position: absolute; z-index: 1000; }
            .main-content { margin-left: 0; }
            .support-grid { grid-template-columns: 1fr; }
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
                <li><a href="leader.php"><i class="fa-solid fa-chart-line"></i> Leaderboards</a></li>
                <p class="nav-title">ACCOUNT</p>
                <li><a href="#" class="active"><i class="fa-solid fa-headset"></i> Support</a></li>
                <li><a href="setting.php"><i class="fa-solid fa-gear"></i> Settings</a></li>
            </ul>
        </nav>

        <main class="main-content">
            <header class="main-header">
                <h1>Support & Aide</h1>
            </header>

            <div class="support-grid">
                <div class="faq-section card">
                    <h2>Foire Aux Questions (FAQ)</h2>
                    <div class="faq-item">
                        <div class="faq-question">
                            <span>Comment puis-je participer à un tournoi ?</span>
                            <i class="fa-solid fa-chevron-down"></i>
                        </div>
                        <div class="faq-answer">
                            <p>Pour participer à un tournoi, rendez-vous sur la page "Tournaments", choisissez celui qui vous intéresse et cliquez sur le bouton "Join Tournament". Assurez-vous d'avoir lu les règles et de remplir les conditions requises.</p>
                        </div>
                    </div>
                    <div class="faq-item">
                        <div class="faq-question">
                            <span>Où puis-je voir mes points de classement ?</span>
                            <i class="fa-solid fa-chevron-down"></i>
                        </div>
                        <div class="faq-answer">
                            <p>Votre classement et vos points sont visibles sur la page "Leaderboards". Le classement est mis à jour en temps réel après chaque match validé.</p>
                        </div>
                    </div>
                    <div class="faq-item">
                        <div class="faq-question">
                            <span>Comment puis-je modifier mon profil ?</span>
                            <i class="fa-solid fa-chevron-down"></i>
                        </div>
                        <div class="faq-answer">
                            <p>Vous pouvez modifier les informations de votre profil, comme votre nom d'utilisateur ou votre avatar, en allant dans la section "Settings" (Paramètres).</p>
                        </div>
                    </div>
                    <div class="faq-item">
                        <div class="faq-question">
                            <span>Les paiements sur la boutique sont-ils sécurisés ?</span>
                            <i class="fa-solid fa-chevron-down"></i>
                        </div>
                        <div class="faq-answer">
                            <p>Oui, toutes les transactions effectuées sur notre boutique sont entièrement sécurisées grâce à un cryptage SSL et nos partenaires de paiement certifiés.</p>
                        </div>
                    </div>
                </div>

                <div class="contact-section card">
                    <h2>Envoyer une demande</h2>
                    <form id="contact-form" class="contact-form">
                        <div class="form-group">
                            <label for="name">Votre Nom</label>
                            <input type="text" id="name" name="name" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Votre Email</label>
                            <input type="email" id="email" name="email" required>
                        </div>
                        <div class="form-group">
                            <label for="subject">Sujet</label>
                            <input type="text" id="subject" name="subject" required>
                        </div>
                        <div class="form-group">
                            <label for="message">Message</label>
                            <textarea id="message" name="message" required></textarea>
                        </div>
                        <button type="submit" class="submit-btn">Envoyer</button>
                    </form>
                </div>
            </div>
        </main>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // --- SCRIPT POUR LE MENU ---
            const navLinks = document.querySelectorAll('.navigation li a');
            navLinks.forEach(link => {
                link.addEventListener('click', function(e) {
                    if (this.getAttribute('href') === '#') {
                        e.preventDefault();
                    }
                });
            });

            // --- SCRIPT POUR L'ACCORDÉON FAQ ---
            const faqItems = document.querySelectorAll('.faq-item');
            faqItems.forEach(item => {
                const question = item.querySelector('.faq-question');
                question.addEventListener('click', () => {
                    const currentlyActive = document.querySelector('.faq-item.active');
                    if (currentlyActive && currentlyActive !== item) {
                        currentlyActive.classList.remove('active');
                    }
                    item.classList.toggle('active');
                });
            });

            // --- SCRIPT POUR LE FORMULAIRE DE CONTACT ---
            const contactForm = document.getElementById('contact-form');
            contactForm.addEventListener('submit', function(e) {
                e.preventDefault(); // Empêche l'envoi réel du formulaire
                alert('Merci ! Votre message a bien été envoyé. Notre équipe vous répondra bientôt.');
                contactForm.reset(); // Réinitialise les champs du formulaire
            });
        });
    </script>
</body>
</html>