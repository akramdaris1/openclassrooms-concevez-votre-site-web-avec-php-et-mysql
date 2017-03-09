<?php
    try
    {
        // On se connecte à MySQL
        $bdd = new PDO('mysql:host=localhost;dbname=openclassrooms_concevez_votre_site_web_avec_php_et_mysql;charset=utf8', 'phpmyadmin', 'phpmyadmin', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    } catch(Exception $e) {
        // En cas d'erreur, on affiche un message et on arrête tout
        die('Erreur : '.$e->getMessage());
    }

    // Si tout va bien, on peut continuer

    // Quelques variables faites à la main en attendant de créer le formulaire
    $_POST['possesseur'] = 'Patrick';
    $_POST['prix_max'] = 50;

    // On récupère tout le contenu de la table jeux_video
    $requete = $bdd->prepare('SELECT nom, prix FROM jeux_video WHERE possesseur = ? AND prix <= ?');
    $requete->execute(array($_POST['possesseur'], $_POST['prix_max']));

    /*
        Ou bien, si on utilise les marqueurs nominatifs

        $requete = $bdd->prepare('SELECT nom, prix FROM jeux_video WHERE possesseur = :possesseur AND prix <= :prix_max');
        $requete->execute(array('possesseur' => $_POST['possesseur'], 'prix_max' => $_POST['prix_max']));
    */

    // On affiche chaque entrée une à une
    echo '<ul>';
    while ($donnees = $requete->fetch()) {
        echo '<li>' . $donnees['nom'] . ' (' . $donnees['prix'] . ' EUR)</li>';
    }
    echo '</ul>';

    $requete->closeCursor(); // Termine le traitement de la requête
?>
