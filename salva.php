<?php

session_start();

if (!isset($_SESSION["loggato"])) {
    header("Location: login.php");
    exit();

} else {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $errorcount = 0;
        $nomesessione = $_SESSION["nome"];
        $cognomesessione = $_SESSION["cognome"];
        $emailsessione = $_SESSION["email"];

        $nomepost = htmlspecialchars($_POST["nome"], ENT_QUOTES, 'UTF-8');
        $cognomepost = htmlspecialchars($_POST["cognome"], ENT_QUOTES, 'UTF-8');
        $emailpost = htmlspecialchars($_POST["email"], ENT_QUOTES, 'UTF-8');
        $passwordpost = htmlspecialchars($_POST["password"], ENT_QUOTES, 'UTF-8');

        $hostname = "localhost";
        $username = "USERDB";
        $password = "PASSDB";
        $database = "NAMEDB";

        $mysqli = mysqli_connect($hostname, $username, $password, $database);

        if (!$mysqli) {
            die("Connessione al database fallita: " . mysqli_connect_error());
        }

        function updateData($mysqli, $colonna, $nuovovalore, $emailsessione, &$errorcount) {
            $queryUpdate = $mysqli->prepare("UPDATE utenti SET $colonna = ? WHERE email = ?");
            $queryUpdate->bind_param("ss", $nuovovalore, $emailsessione);
            $queryUpdate->execute();
        
            if ($queryUpdate->affected_rows > 0) {
                $errorcount = $errorcount;
            } else {
                $errorcount++;
                    // echo "Errore nell'aggiornamento dei dati: " . $queryUpdate->error;
            }
        
            $queryUpdate->close();
        }
        
            
        if ($nomesessione != $nomepost) {
            updateData($mysqli, "nome", $nomepost, $emailsessione, $errorcount);
        }
        
        if ($cognomesessione != $cognomepost) {
            updateData($mysqli, "cognome", $cognomepost, $emailsessione, $errorcount);
        }
        
        if ($passwordpost != '') {
            $hashed_password = password_hash($passwordpost, PASSWORD_DEFAULT);
            updateData($mysqli, "password", $hashed_password , $emailsessione, $errorcount);
        }
        
        if ($emailsessione != $emailpost) {
            updateData($mysqli, "email", $emailpost, $emailsessione, $errorcount);
        }

        mysqli_close($mysqli);
        
        if ($errorcount == 0) {
            $_SESSION["email"] = $emailpost;
            $_SESSION["nome"] = $nomepost;
            $_SESSION["cognome"] = $cognomepost;
            header("Location: account.php?stato=true");
            exit();
        } else {
            header("Location: account.php?stato=false");
            exit();
        }
        
    } else {
        header("Location: account.php");
        exit();
    } 
}

?>