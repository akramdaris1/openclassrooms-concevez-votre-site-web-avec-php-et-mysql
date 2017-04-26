<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf8">
        <title>Mini Chat</title>
		<link rel="stylesheet" href="minichat.css">
    </head>
    <body>
        <form action="minichat_post.php" method="post">
            <label for="pseudo">Pseudo : <input type="text" name="pseudo" id="pseudo"></label>
            <br>
            <label for="message">Message : <input type="text" name="message" id="message"></label>
            <br>
            <input type="submit" value="Envoyer">
        </form>
        <br>
        <br>
        <br>
    </body>
</html>
<?php
    try
    {
        // On se connecte à MySQL
        $bdd = new PDO('mysql:host=localhost;dbname=openclassrooms_concevez_votre_site_web_avec_php_et_mysql;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    } catch(Exception $e) {
        // En cas d'erreur, on affiche un message et on arrête tout
        die('Erreur : '.$e->getMessage());
    }
	// On récupère tout le contenu de la table minichat
    $reponse = $bdd->query('SELECT * FROM minichat ORDER BY id DESC LIMIT 0, 10');
	// On affiche chaque entrée une à une
	while ($donnees = $reponse->fetch()) {
        echo '<p><strong>' . htmlspecialchars($donnees['pseudo']) . '</strong> : ' . htmlspecialchars($donnees['message']) . '</p>';
    }
	$reponse->closeCursor(); // Termine le traitement de la requête
?>