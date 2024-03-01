<?php

session_start();

if (!isset($_SESSION["loggato"])) {
    header("Location: login.php");
    exit();
} else {
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        $stato = $_GET["stato"] ?? '';
        $eliminato = $_GET["eliminato"] ?? '';
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
$stato = '';
$eliminato = '';

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
        <meta property="og:site_name" content="Dashboard Simulatore › Gateway" />
        <meta property="og:type" content="article" />
        <meta property="og:title" content="Dashboard Simulatore › Gateway" />
        <meta property="og:description" content="Simulatore del progetto Gateway - Introduzione alle Reti - gateway.francescomancuso.it" />
        <meta property="og:url" content="https://gateway.francescomancuso.it/simulatore/" />
        <meta property="og:image" content="https://gateway.francescomancuso.it/simulatore/assets/placeholder.png" />
        <meta property="og:image:secure_url" content="https://gateway.francescomancuso.it/simulatore/assets/placeholder.png" />
        <meta property="og:image:width" content="1920" />
        <meta property="og:image:height" content="1080" />
        <meta name="twitter:card" content="summary_large_image" />
        <meta name="twitter:title" content="Dashboard Simulatore › Gateway" />
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
        <title>Dashboard Simulatore › Gateway</title>
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
                        <h1>Dashboard</h1>
                        <div class="toolbar animazione1">
                            <div class="utente">
                                Ciao <strong><?php echo $nome; ?> <?php echo $cognome; ?></strong> <i style="font-size: 80%;">(<?php echo $email; ?>)</i>
                            </div>
                            <ul>
                                <li class="attivo"><a href="index.php"><i class="fa-solid fa-gauge-high"></i> Dashboard</a></li>
                                <li><a href="account.php"><i class="fa-solid fa-circle-user"></i> Account</a></li>
                                <li><a href="logout.php"><i class="fa-solid fa-right-from-bracket"></i> Esci</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="page-content">

                <div class="container">

                    <div class="griglia-pagina">

                        <div class="left">

                            <h2>Messaggi recenti</h2>
                            <br>
<?php
if ($eliminato == 'true') {
    ?>
    <div class="messaggio account successo animazione2">
        Messaggio eliminato con successo!
    </div>
    <?php
} else if ($eliminato == 'false') {
    ?>
    <div class="messaggio account errore animazione2">
        Errore nell'eliminazione del messaggio, riprova.
    </div>
    <?php
}

    $hostname = "localhost";
    $username = "USERDB";
    $password = "PASSDB";
    $database = "NAMEDB";

$mysqli = mysqli_connect($hostname, $username, $password, $database);

if (!$mysqli) {
    die("Connessione al database fallita: " . mysqli_connect_error());
}

$query = "SELECT id, nome, email, messaggio FROM testi WHERE pubblicato = 1 ORDER BY id DESC";
$result = mysqli_query($mysqli, $query);

if($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo '<div class="messaggio-db">';
        echo '<div class="dati-messaggio">';
        
        echo "Autore: <strong>" . $row['nome'] . "</strong>";
        echo '<i style="font-size:80%"> (' . $row['email'] . ')</i>';
        echo '</div>';

        echo '<div class="contenuto-messaggio">' . $row['messaggio'] . '</div>';
        
        echo '<div class="elimina-messaggio">';
        echo "ID: " . $row['id'] . "<br>";
        echo '<form method="post" action="elimina-messaggio.php">';
        echo '<input type="hidden" name="id_messaggio" value="' . $row['id'] . '">';
        echo '<input type="submit" value="Elimina" class="btn">';
        echo '</form>';
        echo '</div>';
        echo '</div>';
    
    }
    
    mysqli_free_result($result);

} else {
    echo "Errore nella query: " . mysqli_error($mysqli);
}

mysqli_close($mysqli);

?>

                        </div>


                        <div class="right">
                        <h2>Invia Messaggio</h2>
                        <br>
                        <?php 
                    if ($stato == 'true') {
                        ?>
                        <div class="messaggio account successo animazione2">
                        Messaggio inviato con successo!
                        </div>
                        <?php
                    } else if ($stato == 'false') {
                        ?>
                        <div class="messaggio account errore animazione2">
                        Errore nell'invio del messaggio, riprova.
                        </div>
                        <?php
                    }
                ?>

                    <form action="invia-messaggio.php" method="post" id="formdash">
                        
                        <div class="email-container form-input-container">
                            <label for="email"><i class="fa-solid fa-envelope"></i>&nbsp;E-mail</label>
                            <input id="email" name="email" type="email" value="<?php echo $email; ?>" required>
                        </div>

                        <div class="messaggio-container form-input-container">
                            <label for="messaggio"><i class="fa-solid fa-message"></i>&nbsp;Messaggio</label>
                            <textarea id="messaggio" name="messaggio" rows="5" placeholder="Scrivi qui il tuo messaggio..." required></textarea>
                        </div>
                                         
                        <input type="submit" value="Invia" class="btn">

                    </form>

                        </div>

                    </div>

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