<?php

session_start();

if (isset($_SESSION["loggato"])) {
    header("Location: /simulatore/dashboard/");
    exit();
} else {
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        $loginstatus = $_GET["login"] ?? '';
    } else {
        $loginstatus = '';
    }

    session_destroy();

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
        <meta property="og:site_name" content="Accedi - Dashboard Simulatore › Gateway" />
        <meta property="og:type" content="article" />
        <meta property="og:title" content="Accedi - Dashboard Simulatore › Gateway" />
        <meta property="og:description" content="Simulatore del progetto Gateway - Introduzione alle Reti - gateway.francescomancuso.it" />
        <meta property="og:url" content="https://gateway.francescomancuso.it/simulatore/" />
        <meta property="og:image" content="https://gateway.francescomancuso.it/simulatore/assets/placeholder.png" />
        <meta property="og:image:secure_url" content="https://gateway.francescomancuso.it/simulatore/assets/placeholder.png" />
        <meta property="og:image:width" content="1920" />
        <meta property="og:image:height" content="1080" />
        <meta name="twitter:card" content="summary_large_image" />
        <meta name="twitter:title" content="Accedi - Dashboard Simulatore › Gateway" />
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
        <title>Accedi - Dashboard Simulatore › Gateway</title>
    </head>

    <body data-body style="background-color:rgb(4, 72, 109)">
       
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

        <div id="middle" class="login">
            
            <div class="page-content">

                <div class="container">

                    <?php

                    if ($loginstatus == 'false') {
                        ?>
                        <div class="messaggio login errore animazione1">
                            Le credenziali inserite non sono corrette. Riprova
                        </div>
                        <?php
                    }

                    ?>

                    <form action="auth.php" method="post" id="login" class="animazione2">

                        <h3>Accedi alla Dashboard</h3>
                        
                        <label for="username">
                            <i class="fa-solid fa-envelope" aria-hidden="true"></i>&nbsp;<p>Email</p>
                        </label>
                        <input type="email" id="username" name="username" required>

                        <label for="password">
                            <i class="fa-solid fa-key" aria-hidden="true"></i>&nbsp;<p>Password</p>
                        </label>
                        <div class="container-password">
                            <input type="password" id="password" name="password" required>
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
                        
                        

                        <input type="submit" value="Accedi" class="btn">
                    </form>
                </div>

                <div id="particles-js" style="background-color:rgb(4, 55, 82);"></div>
                                
                <script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script> 
                
                <script>
                particlesJS("particles-js", {"particles":{"number":{"value":40,"density":{"enable":true,"value_area":800}},"color":{"value":"#ffffff"},"shape":{"type":"circle","stroke":{"width":0,"color":"#000000"},"polygon":{"nb_sides":5},"image":{"src":"img/github.svg","width":100,"height":100}},"opacity":{"value":0.5,"random":true,"anim":{"enable":false,"speed":1,"opacity_min":0.1,"sync":false}},"size":{"value":6,"random":true,"anim":{"enable":false,"speed":40,"size_min":0.1,"sync":false}},"line_linked":{"enable":true,"distance":150,"color":"#ffffff","opacity":0.4,"width":1},"move":{"enable":true,"speed":6,"direction":"none","random":false,"straight":false,"out_mode":"out","bounce":false,"attract":{"enable":false,"rotateX":600,"rotateY":1200}}},"interactivity":{"detect_on":"canvas","events":{"onhover":{"enable":false,"mode":"repulse"},"onclick":{"enable":false,"mode":"repulse"},"resize":true},"modes":{"grab":{"distance":400,"line_linked":{"opacity":1}},"bubble":{"distance":400,"size":40,"duration":2,"opacity":8,"speed":3},"repulse":{"distance":200,"duration":0.4},"push":{"particles_nb":4},"remove":{"particles_nb":2}}},"retina_detect":true});
                </script>
            </div>

            <div class="nulla"></div>

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
<?php
}
?>