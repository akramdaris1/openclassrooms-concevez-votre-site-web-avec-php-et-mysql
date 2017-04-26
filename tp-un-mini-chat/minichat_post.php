<?php
    try
    {
        // On se connecte à MySQL
        $bdd = new PDO('mysql:host=localhost;dbname=openclassrooms_concevez_votre_site_web_avec_php_et_mysql;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    } catch(Exception $e) {
        // En cas d'erreur, on affiche un message et on arrête tout
        die('Erreur : '.$e->getMessage());
    }
    // Insertion du message à l'aide d'une requête préparée
    $req = $bdd->prepare('INSERT INTO minichat(pseudo, message) VALUES (?, ?)');
    $req->execute(array($_POST['pseudo'], $_POST['message']));
    // Redirection du visiteur vers la page du minichat
    header('Location: minichat.php');
?>