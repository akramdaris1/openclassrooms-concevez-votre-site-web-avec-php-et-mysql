<?php
    if (isset($_COOKIE['pseudo']) && isset($_COOKIE['pass'])) {
        header('Location: connexion_post.php?cookie=true');
    }
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>Connexion</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/style.css" rel="stylesheet">
    </head>
    <body>
        <form action="connexion_post.php" method="post">
            <?php
                if (isset($_GET['inscription']) && $_GET['inscription'] == 'true') {
                    echo '<p class=\'succes\'><em>Inscription éffectuée avec succès. Veuillez vous connecter pour continuer.</em></p>';
                }
                if (isset($_GET['acces']) && $_GET['acces'] == 'false') {
                    echo '<p class=\'erreur\'><em>Vous n\'avez pas accès à cette page. Veuillez vous connecter pour continuer.</em></p>';
                }
            ?>
            <p>
                <label for="pseudo">Pseudo</label>
                <input type="text" name="pseudo" id="pseudo" <?php if (isset($_GET['pseudo'])) { $pseudo = $_GET['pseudo']; echo "value=\"$pseudo\""; } ?> autofocus required>
            </p>
            <p>
                <label for="pass">Mot de passe</label>
                <input type="password" name="pass" id="pass" required>
            </p>
            <p>
                <label for="connexion_automatique">Connexion automatique</label>
                <input type="checkbox" name="connexion_automatique" id="connexion_automatique" value="connexion_automatique" <?php if (isset($_GET['connexion_automatique'])) { echo "value=\"checked\""; } ?>>
            </p>
            <p>
                <input type="submit" name="submit" id="submit" value="Se connecter">
            </p>
            <?php
                if (isset($_GET['erreur_membre']) && $_GET['erreur_membre'] == 'true') {
                    echo '<p class=\'erreur\'><em>Mauvais identifiant et/ou mot de passe !</em></p>';
                }
            ?>
        </form>
    </body>
</html>