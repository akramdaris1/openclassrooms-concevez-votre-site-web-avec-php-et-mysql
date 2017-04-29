<?php
    try
    {
        $bdd = new PDO('mysql:host=localhost;dbname=openclassrooms_concevez_votre_site_web_avec_php_et_mysql;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    } catch(Exception $e) {
        die('Erreur : '.$e->getMessage());
    }
    // Sécurisation des informations venues du fomulaire
    $pseudo = htmlspecialchars($_POST['pseudo']);
    $pass = htmlspecialchars($_POST['pass']);
    $new_pass = htmlspecialchars($_POST['new_pass']);
    $email = htmlspecialchars($_POST['email']);
    // Vérification si le pseudonyme demandé par le visiteur est libre
    $pseudos_bdd = $bdd->query('SELECT id, pseudo, email FROM espace_membres');
    $membre_existant = FALSE;
    $url = '';
    while ($membre = $pseudos_bdd->fetch()) {
        if ($membre['pseudo'] == $pseudo || $membre['email'] == $email) {
            $url = ($membre['pseudo'] == $pseudo) ? '&pseudo_existe=true' : '';
            $url = ($membre['email'] == $email) ? '&email_existe=true' : '';
            break;
        }
    }
    $pseudos_bdd->closeCursor();
    // Vérification si les 2 mots de passe correspondent 
    if ($pass != $new_pass) {
        $url = $url . '&erreur_pass=true';
    }
    // Vérification si l'adresse email est valide
    if (!(preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $email))) {
        $url = $url . '&erreur_email=true';
    }
    // Si il y a une quelconque erreur, on renvoie l'utilisateur à la page d'inscription
    if ($url != '') {
        $url = 'Location: inscription.php?pseudo=' . $pseudo . '&email=' . $email . $url;
        header($url);
    }
    // Sinon, si toutes les informations de l'utilisateur sont correctes, on l'enregistre dans la base de données, puis on le redirige vers la page de connexion
    else {
        $pass = sha1($pass);
        $req = $bdd->prepare('INSERT INTO espace_membres(pseudo, pass, email, date_inscription) VALUES (:pseudo, :pass, :email, CURDATE())');
        $req->execute(array(
            'pseudo' => $pseudo,
            'pass' => $pass,
            'email' => $email
        ));
        header('Location: connexion.php?inscription=true');
    }
?>