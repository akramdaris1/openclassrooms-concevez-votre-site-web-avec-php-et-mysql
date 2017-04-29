<?php
    try
    {
        $bdd = new PDO('mysql:host=localhost;dbname=openclassrooms_concevez_votre_site_web_avec_php_et_mysql;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    } catch(Exception $e) {
        die('Erreur : '.$e->getMessage());
    }
    if (isset($_GET['cookie']) && $_GET['cookie'] == true) {
        $pseudo = $_COOKIE['pseudo'];
        $pass = $_COOKIE['pass'];
    }
    else {
        // Sécurisation des informations venues du fomulaire
        $pseudo = htmlspecialchars($_POST['pseudo']);
        $pass = htmlspecialchars($_POST['pass']);
        // Hachage du mot de passe
        $pass = sha1($pass);
    }
    // Vérification des identifiants
    $req = $bdd->prepare('SELECT id FROM espace_membres WHERE pseudo = :pseudo AND pass = :pass');
    $req->execute(array(
        'pseudo' => $pseudo,
        'pass' => $pass
    ));
    $resultat = $req->fetch();
    if ($_POST['connexion_automatique']) {
        $url = '&connexion_automatique=true';
    }
    // Si il n'y a aucun membre correspondant à ces identifiants, erreur
    if (!$resultat) {
        $url = $url . '&erreur_membre=true';
        $url = 'Location: connexion.php?pseudo=' . $pseudo . $url;
        header($url);
    }
    else
    {
        session_start();
        $_SESSION['id'] = $resultat['id'];
        $_SESSION['pseudo'] = $pseudo;
        if (!(!$_POST['connexion_automatique'])) {
            setcookie('pseudo', $resultat['pseudo'], time() + 365*24*3600, null, null, false, true);
            setcookie('pass', $pass, time() + 365*24*3600, null, null, false, true);
        }
        header('Location: index.php');
    }
?>