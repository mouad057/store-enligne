<?php

$error_message = ''; 


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    
    $fullname = isset($_POST['fullname']) ? htmlspecialchars(trim($_POST['fullname'])) : '';
    $email = isset($_POST['email']) ? htmlspecialchars(trim($_POST['email'])) : '';
    $password = isset($_POST['password']) ? trim($_POST['password']) : '';

    
    if (empty($fullname) || empty($email) || empty($password)) {
        $error_message = "Erreur : Tous les champs sont obligatoires.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error_message = "Erreur : Le format de l'adresse e-mail est invalide.";
    } else {
        
        
        
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

       
        header("Location: home.php");
        exit(); 
    }
}

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer un compte</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f0f4f8;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            color: #333;
        }

        .container {
            display: flex;
            width: 90%;
            max-width: 900px;
            background-color: #ffffff;
            border-radius: 20px;
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .left-panel {
            flex-basis: 50%;
            background-color: #e0e8ff;
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative;
            padding: 40px;
        }

        .left-panel::before {
            content: '';
            position: absolute;
            width: 120%;
            height: 120%;
            background-color: #ffde59;
            border-radius: 45% 55% 70% 30% / 30% 60% 40% 70%;
            transform: rotate(-15deg);
            z-index: 1;
        }

        .left-panel img {
            max-width: 100%;
            position: relative;
            z-index: 2;
            filter: drop-shadow(0 10px 20px rgba(0,0,0,0.2));
        }

        .right-panel {
            flex-basis: 50%;
            padding: 40px 50px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .form-container h2 {
            font-size: 24px;
            font-weight: 600;
            margin-bottom: 20px;
            text-align: center;
        }

        .input-group {
            margin-bottom: 15px;
        }

        .input-group label {
            display: none;
        }

        .input-group input {
            width: 100%;
            padding: 12px 18px;
            border: none;
            border-radius: 10px;
            background-color: #f0f4f8;
            font-size: 15px;
            font-family: 'Poppins', sans-serif;
        }

        .input-group input::placeholder {
            color: #aaa;
        }

        .create-account-btn {
            width: 100%;
            padding: 12px;
            border: none;
            border-radius: 10px;
            background-color: #ffde59;
            color: #000;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: background-color 0.3s ease;
            margin-top: 10px;
        }

        .create-account-btn:hover {
            background-color: #ffd133;
        }

        .error-message {
            background-color: #ffebee;
            color: #c62828;
            padding: 10px;
            border-radius: 5px;
            text-align: center;
            margin-bottom: 15px;
            font-size: 14px;
        }

        .login-link {
            text-align: center;
            margin-top: 15px;
            font-size: 14px;
        }

        .login-link a {
            color: #fcc203;
            font-weight: 500;
            text-decoration: none;
        }

        .separator {
            text-align: center;
            margin: 20px 0;
            color: #ccc;
            font-weight: 500;
        }

        .social-login {
            display: flex;
            gap: 15px;
        }

        .social-btn {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 10px;
            text-decoration: none;
            color: #333;
            font-size: 13px;
            font-weight: 500;
            transition: background-color 0.3s ease;
        }

        .social-btn:hover {
            background-color: #f7f7f7;
        }

        .social-btn svg {
            margin-right: 8px;
        }

        footer {
            text-align: center;
            margin-top: 25px;
        }

        footer p {
            font-size: 12px;
            color: #aaa;
        }

        @media (max-width: 900px) {
            .container {
                flex-direction: column;
                width: 100%;
                max-width: 100%;
                height: 100%;
                border-radius: 0;
            }

            .left-panel {
                display: none;
            }

            .right-panel {
                flex-basis: 100%;
                width: 100%;
                padding: 40px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="left-panel">
            <img src="pika.png">
        </div>

        <div class="right-panel">
            <div class="form-container">
                <h2>Create your Free Account</h2>

                <?php
                if (!empty($error_message)) {
                    echo "<p class='error-message'>" . htmlspecialchars($error_message) . "</p>";
                }
                ?>

                <form action="" method="POST" novalidate>
                    <div class="input-group">
                        <label for="fullname">Full Name</label>
                        <input type="text" id="fullname" name="fullname" placeholder="Enter your Full Name here" required>
                    </div>

                    <div class="input-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" placeholder="Enter your Email here" required>
                    </div>

                    <div class="input-group">
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password" placeholder="Enter your Password here" required>
                    </div>

                    <button type="submit" class="create-account-btn">Create Account</button>
                </form>

                <p class="login-link">Already have an account? <a href="login.php">Log in</a></p>

                <div class="separator">- OR -</div>

                <div class="social-login">
                    <a href="#" class="social-btn google-btn">
                        <svg viewBox="0 0 24 24" width="24" height="24"><path fill="currentColor" d="M21.35,11.1H12.18V13.83H18.69C18.36,17.64 15.19,19.27 12.19,19.27C8.36,19.27 5,16.25 5,12C5,7.75 8.36,4.73 12.19,4.73C15.28,4.73 17.27,6.75 17.27,6.75L19.34,4.73C19.34,4.73 16.92,2 12.19,2C6.42,2 2.03,6.8 2.03,12C2.03,17.2 6.42,22 12.19,22C17.6,22 21.7,18.2 21.7,12.34C21.7,11.7 21.52,11.1 21.35,11.1Z"></path></svg>
                        <span>Sign up with Google</span>
                    </a>
                    <a href="#" class="social-btn github-btn">
                       <svg viewBox="0 0 24 24" width="24" height="24"><path fill="currentColor" d="M12,2A10,10 0 0,0 2,12C2,16.42 4.87,20.17 8.84,21.5C9.34,21.58 9.5,21.27 9.5,21C9.5,20.77 9.5,20.14 9.5,19.31C6.73,19.91 6.14,17.97 6.14,17.97C5.68,16.88 5.03,16.6 5.03,16.6C4.12,16 5.1,16 5.1,16C6.1,16.08 6.63,17.1 6.63,17.1C7.5,18.6 8.94,18.17 9.5,17.9C9.58,17.27 9.83,16.84 10.13,16.59C7.88,16.31 5.5,15.47 5.5,11.5C5.5,10.27 5.96,9.27 6.65,8.5C6.55,8.22 6.2,7.23 6.75,6.15C6.75,6.15 7.59,5.88 9.5,7.17C10.29,6.95 11.15,6.84 12,6.84C12.85,6.84 13.71,6.95 14.5,7.17C16.41,5.88 17.25,6.15 17.25,6.15C17.8,7.23 17.45,8.22 17.35,8.5C18.04,9.27 18.5,10.27 18.5,11.5C18.5,15.5 16.12,16.31 13.87,16.59C14.23,16.89 14.5,17.54 14.5,18.45C14.5,19.78 14.5,20.78 14.5,21C14.5,21.27 14.66,21.59 15.17,21.5C19.14,20.16 22,16.42 22,12A10,10 0 0,0 12,2Z"></path></svg>
                        <span>Sign up with GitHub</span>
                    </a>
                </div>

                <footer>
                    <p>Reserved directs to mouad bougayou</p>
                </footer>
            </div>
        </div>
    </div>
</body>

</html>
