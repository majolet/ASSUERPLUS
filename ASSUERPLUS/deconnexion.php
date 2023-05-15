<?php
session_start();

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    session_unset();
    session_destroy();

    echo "Vous avez été déconnecté avec succès.";

    header("refresh:2; url=index.php");
    exit;
} else {

    header("Location: connexion.php");
    exit;
}
?>