<?php
    session_start();
    if (isset($_SESSION['id']) AND isset($_SESSION['pseudo'])) {
        echo 'Bonjour ' . $_SESSION['pseudo'] . '. Vous êtes connecté !';
    }
    else {
        header('Location: connexion.php?acces=false');
    }
?>