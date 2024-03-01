<?php
session_start();

if (isset($_SESSION["loggato"])) {
    header("Location: /simulatore/dashboard/");
    exit();
} else {
    session_destroy();

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $hostname = "localhost";
        $username = "USERDB";
        $password = "PASSDB";
        $database = "NAMEDB";

        $mysqli = mysqli_connect($hostname, $username, $password, $database);

        if (!$mysqli) {
            die("Connessione al database fallita: " . mysqli_connect_error());
        }

        $email = htmlspecialchars($_POST["username"], ENT_QUOTES, 'UTF-8');
        $password = htmlspecialchars($_POST["password"], ENT_QUOTES, 'UTF-8');


        $queryEmail = $mysqli->prepare('SELECT * FROM utenti WHERE email = ?');
        $queryEmail->bind_param('s', $email);
        $queryEmail->execute();
        $resultEmail = $queryEmail->get_result();
        $userWithEmail = $resultEmail->fetch_assoc();
        $queryEmail->close();

        mysqli_close($mysqli);

        if ($userWithEmail) {
            $emailFromDatabase = $userWithEmail['email'];

            if (password_verify($password, $userWithEmail['password'])) {
                session_start();
                $_SESSION["loggato"] = true;
                $_SESSION["email"] = $userWithEmail['email'];
                $_SESSION["nome"] = $userWithEmail['nome'];
                $_SESSION["cognome"] = $userWithEmail['cognome'];

                header("Location: /simulatore/dashboard/");
                exit();
            } else {
                header("Location: login.php?login=false");
                exit();
            }
        } else {
            header("Location: login.php?login=false");
            exit();
        }

    } else {
        header("Location: login.php");
        exit();
    }


} // else

?>