<?php

session_start();

if (!isset($_SESSION["loggato"])) {
    header("Location: login.php");
    exit();

} else {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $errorcount = 0;
        $id_messaggio = $_POST['id_messaggio'];

        $hostname = "localhost";
        $username = "USERDB";
        $password = "PASSDB";
        $database = "NAMEDB";

        $mysqli = mysqli_connect($hostname, $username, $password, $database);

        if (!$mysqli) {
            die("Connessione al database fallita: " . mysqli_connect_error());
        }


        $query_delete = "DELETE FROM testi WHERE id = ?";
        $stmt = $mysqli->prepare($query_delete);
        $stmt->bind_param("i", $id_messaggio);
        $stmt->execute();
    
        if ($stmt->affected_rows > 0) {
            $errorcount = $errorcount;
        } else {
            $errorcount++;
            // echo "Errore nell'inserimento del messaggio: " . $query_insert->error;
        }
    
        $stmt->close();
        mysqli_close($mysqli);
        
        if ($errorcount == 0) {
            header("Location: /simulatore/dashboard/?eliminato=true");
            exit();
        } else {
            header("Location: /simulatore/dashboard/?eliminato=false");
            exit();
        }
        
    } else {
        header("Location: /simulatore/dashboard/");
        exit();
    } 
}
?>