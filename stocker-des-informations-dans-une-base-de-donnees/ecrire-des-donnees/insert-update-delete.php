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

    /*
        INSERT

        On insère une nouvelle ligne à la table jeux_video
    */

    // Quelques variables faites à la main en attendant de créer le formulaire
    $nom = 'Battlefield 1942';
    $possesseur = 'Patrick';
    $console = 'PC';
    $prix = 45;
    $nbre_joueurs_max = 50;
    $commentaires = '2nde guerre mondiale';
    // Maintenant, on prépare la requete d'insertion, puis on l'exécute
    $req = $bdd->prepare('INSERT INTO jeux_video(nom, possesseur, console, prix, nbre_joueurs_max, commentaires) VALUES(:nom, :possesseur, :console, :prix, :nbre_joueurs_max, :commentaires)');
    $req->execute(array(
        'nom' => $nom,
        'possesseur' => $possesseur,
        'console' => $console,
        'prix' => $prix,
        'nbre_joueurs_max' => $nbre_joueurs_max,
        'commentaires' => $commentaires
    ));
    echo 'Le jeu ' . $nom . ' a bien été ajouté !'; // Si tout s'est bien passé

    /*
        UPDATE

        On modifie une ligne de la table jeux_video
    */

    // Quelques variables faites à la main en attendant de créer le formulaire
    $nvprix = 50;
    $nv_nb_joueurs = 25;
    $nom_jeu = 'Battlefield 1942';
    // Maintenant, on prépare la requete de modification, puis on l'exécute
    $req = $bdd->prepare('UPDATE jeux_video SET prix = :nvprix, nbre_joueurs_max = :nv_nb_joueurs WHERE nom = :nom_jeu');
    $req->execute(array(
        'nvprix' => $nvprix,
        'nv_nb_joueurs' => $nv_nb_joueurs,
        'nom_jeu' => $nom_jeu
    ));
    echo 'Le jeu ' . $nom_jeu . ' a bien été modifié !'; // Si tout s'est bien passé

    /*
        DELETE

        On supprime une ligne de la table jeux_video
    */

    // Quelques variables faites à la main en attendant de créer le formulaire
    $nom_jeu = 'Battlefield 1942';
    // Maintenant, on prépare la requete de modification, puis on l'exécute
    $req = $bdd->prepare('DELETE FROM jeux_video WHERE nom = :nom_jeu');
    $req->execute(array(
        'nom_jeu' => $nom_jeu
    ));
    echo 'Le jeu ' . $nom_jeu . ' a bien été supprimé !'; // Si tout s'est bien passé

?>
