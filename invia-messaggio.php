<?php

session_start();

if (!isset($_SESSION["loggato"])) {
    header("Location: login.php");
    exit();

} else {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $errorcount = 0;
        $nomesessione = $_SESSION["nome"];
        $pubblicato = 1;

        $emailpost = htmlspecialchars($_POST["email"], ENT_QUOTES, 'UTF-8');
        $messaggiopost = htmlspecialchars($_POST["messaggio"], ENT_QUOTES, 'UTF-8');

        $hostname = "localhost";
        $username = "USERDB";
        $password = "PASSDB";
        $database = "NAMEDB";

        $mysqli = mysqli_connect($hostname, $username, $password, $database);

        if (!$mysqli) {
            die("Connessione al database fallita: " . mysqli_connect_error());
        }


        $query_insert = $mysqli->prepare("INSERT INTO testi (nome, email, messaggio, pubblicato) VALUES (?, ?, ?, ?)");
        $query_insert->bind_param("sssi", $nomesessione, $emailpost, $messaggiopost, $pubblicato);
        $query_insert->execute();
    
        if ($query_insert->affected_rows > 0) {
            $errorcount = $errorcount;
        } else {
            $errorcount++;
            // echo "Errore nell'inserimento del messaggio: " . $query_insert->error;
        }
    
        $query_insert->close();
        mysqli_close($mysqli);
        
        if ($errorcount == 0) {
            header("Location: /simulatore/dashboard/?stato=true");
            exit();
        } else {
            header("Location: /simulatore/dashboard/?stato=false");
            exit();
        }
        
    } else {
        header("Location: /simulatore/dashboard/");
        exit();
    } 
}
?>