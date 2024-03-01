<?php

session_start();


if (!isset($_SESSION["loggato"])) {
    header("Location: login.php");
    exit();
} else {
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        $stato = $_GET["stato"] ?? '';
    } 

    $nome = $_SESSION["nome"];
    $cognome = $_SESSION["cognome"];
    $email = $_SESSION["email"];
}

/*

Testing

$nome = "Francesco";
$cognome = "Mancuso";
$email = "hello@francescomancuso.it";
$stato = "";

*/
?>

<!DOCTYPE html>
<html lang="it">
    <head>
        <!-- 

            Copyright (C) 2024 Francesco Mancuso - www.francescomancuso.it 
            È vietata la copia, la pubblicazione, la riproduzione e la redistribuzione dei contenuti in qualsiasi modo o forma
            
        -->

        <meta http-equiv="Content-type" content="text/html; charset=utf-8">
        <meta http-equiv="Cache-control" content="no-cache">
        <meta name="theme-color" content="#47eadf" />
        <meta http-equiv="Pragma" content="no-cache">
        <meta http-equiv="Expires" content="0">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=1">
        <meta name="description" content="Simulatore del progetto Gateway - Introduzione alle Reti - gateway.francescomancuso.it">
        <meta name="keywords" content="Francesco Mancuso, ITTS E. Scalfaro, Gateway, Catanzaro, Reti, Sistemi e Reti, Simulatore">
        <meta name="author" content="Francesco Mancuso">
        <meta name="robots" content="max-image-preview:large" />
        <meta property="og:locale" content="it_IT" />
        <meta property="og:site_name" content="Account - Dashboard Simulatore › Gateway" />
        <meta property="og:type" content="article" />
        <meta property="og:title" content="Account - Dashboard Simulatore › Gateway" />
        <meta property="og:description" content="Simulatore del progetto Gateway - Introduzione alle Reti - gateway.francescomancuso.it" />
        <meta property="og:url" content="https://gateway.francescomancuso.it/simulatore/" />
        <meta property="og:image" content="https://gateway.francescomancuso.it/simulatore/assets/placeholder.png" />
        <meta property="og:image:secure_url" content="https://gateway.francescomancuso.it/simulatore/assets/placeholder.png" />
        <meta property="og:image:width" content="1920" />
        <meta property="og:image:height" content="1080" />
        <meta name="twitter:card" content="summary_large_image" />
        <meta name="twitter:title" content="Account - Dashboard Simulatore › Gateway" />
        <meta name="twitter:description" content="Simulatore del progetto Gateway - Introduzione alle Reti - gateway.francescomancuso.it" />
        <meta name="twitter:image" content="https://gateway.francescomancuso.it/simulatore/assets/placeholder.png" />
        <script src="https://cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
        <script src="https://kit.fontawesome.com/c2497a668c.js" crossorigin="anonymous"></script>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300..700&display=swap" rel="stylesheet">
        <script src="dashboard.js" defer></script>
        <link rel="stylesheet" href="style.css">
        <link rel="icon" type="image/x-icon" href="favicon.ico">
        <title>Account - Dashboard Simulatore › Gateway</title>
    </head>

    <body data-body>
       
        <div class="top-header">
            <div class="container">
                <a href="https://gateway.francescomancuso.it/"><i class="fa-solid fa-arrow-left"></i> Torna al Sito Principale</a>
            </div>
        </div>
        <header id="header">
            <div class="container">
                <div class="header-left">
                    <a href="https://gateway.francescomancuso.it/simulatore/"><img src="https://gateway.francescomancuso.it/simulatore/assets/logo_scritta_bianco3.png" alt="Gateway" id="logo-nav"></a>
                </div>

                <div class="header-right">
                    <div class="nascondi">Simulatore</div>

                    <div class="dark-mode-btn" data-switchcontainer>
                        <button class="switchthemebtn" title="Cambia tema" data-switchdarkmode>
                            <i class="switchthemebtn fa-solid" data-icontheme></i>
                        </button>
                    </div>
                </div>
            </div>            
        </header>

        <div id="middle">
            <div class="page-header">
                <div class="page-header-overlay">
                    <div class="container">
                        <h1>Account</h1>
                        <div class="toolbar animazione1">
                            <div class="utente">
                                Ciao <strong><?php echo $nome; ?> <?php echo $cognome; ?></strong> <i style="font-size: 80%;">(<?php echo $email; ?>)</i>
                            </div>
                            <ul>
                                <li><a href="index.php"><i class="fa-solid fa-gauge-high"></i> Dashboard</a></li>
                                <li class="attivo"><a href="account.php"><i class="fa-solid fa-circle-user"></i> Account</a></li>
                                <li><a href="logout.php"><i class="fa-solid fa-right-from-bracket"></i> Esci</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="page-content">

                <div class="container">
                    
                <?php 
                    if ($stato == 'true') {
                        ?>
                        <div class="messaggio account successo animazione2">
                        Dati aggiornati con successo!
                        </div>
                        <?php
                    } else if ($stato == 'false') {
                        ?>
                        <div class="messaggio account errore animazione2">
                        Errore nel salvataggio dei dati. Riprova
                        </div>
                        <?php
                    }
                ?>

                    <form action="salva.php" method="post" id="formaccount">
                        <h2>I tuoi dati</h2>
                        <br>

                        <div class="email-container form-input-container">
                            <label for="email"><i class="fa-solid fa-envelope"></i>&nbsp;E-mail</label>
                            <input id="email" name="email" type="email" value="<?php echo $email; ?>" required>
                        </div>
                        
                        <div class="griglia-form">
                            <div class="nome-container form-input-container">
                                <label for="nome"><i class="fa-solid fa-user"></i>&nbsp;Nome</label>
                                <input id="nome" name="nome" type="text" value="<?php echo $nome; ?>" required>
                            </div>
                            <div class="cognome-container form-input-container">
                                <label for="cognome"><i class="fa-regular fa-user"></i>&nbsp;Cognome</label>
                                <input id="cognome" name="cognome" type="text" value="<?php echo $cognome; ?>" required>
                            </div>
                        </div>

                        <br>
                        <h2>Cambia password</h2>
                        <br>
                        
                        <div class="password-container form-input-container">
                            <label for="password"><i class="fa-solid fa-key"></i>&nbsp;Nuova Password</label>
                            <div class="container-password">
                            <input id="password" name="password" type="password">
                            <div onclick="showPassword()" title="Mostra Password"><i class="fa-solid fa-eye" id="eyeicon" aria-hidden="true"></i></div>
                            <script>
                                function showPassword() {
                                    var x = document.getElementById("password");
                                    var y = document.getElementById("eyeicon");
                                    if (x.type === "password") {
                                        x.type = "text";
                                        y.classList.remove("fa-eye");
                                        y.classList.add("fa-eye-slash");
                                    } else {
                                        x.type = "password";
                                        y.classList.remove("fa-eye-slash");
                                        y.classList.add("fa-eye");
                                    }
                                }
                            </script>
                        </div>
                        </div>
                        
                        <input type="submit" value="Salva" class="btn">

                    </form>

                </div>

            </div>
        </div>

        <footer id="footer">
            <div class="container">
                <div class="copyright">
                    <p>È vietata la copia, la pubblicazione, la riproduzione e la redistribuzione dei contenuti in qualsiasi modo o forma.
                    <br>
                    Copyright © 2024 <a href="https://gateway.francescomancuso.it" target="_blank"><strong>Gateway</strong></a> | Realizzazione: <strong><a href="https://www.francescomancuso.it/" target="_blank" style="color:#47eadf;font-weight:900">Francesco Mancuso</a></strong></p>
                    <p class="copy-network">
                    <a href="https://www.francescomancuso.it/network/" id="fmnetwork"><img src="https://gateway.francescomancuso.it/simulatore/assets/fm-logo-network2024_white.png" alt="FM Network"></a></p> 
                </div>
            </div>
        </footer>

    </body>
</html>