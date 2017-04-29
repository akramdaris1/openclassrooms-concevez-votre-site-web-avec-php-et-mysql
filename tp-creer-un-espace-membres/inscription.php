<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>Inscription</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/style.css" rel="stylesheet">
    </head>
    <body>
        <form action="inscription_post.php" method="post">
            <p>
                <label for="pseudo">Pseudo</label>
                <input type="text" name="pseudo" id="pseudo" <?php if (isset($_GET['pseudo'])) { $pseudo = $_GET['pseudo']; echo "value=\"$pseudo\""; } ?> autofocus required>
            </p>
            <p>
                <label for="pass">Mot de passe</label>
                <input type="password" name="pass" id="pass" required>
            </p>
            <p>
                <label for="new_pass">Retapez votre mot de passe</label>
                <input type="password" name="new_pass" id="new_pass" required>
            </p>
            <p>
                <label for="email">Adresse email</label>
                <input type="text" name="email" id="email" <?php if (isset($_GET['email'])) { $email = $_GET['email']; echo "value=\"$email\""; } ?> required>
            </p>
            <p>
                <input type="submit" name="submit" id="submit" value="S'inscrire">
            </p>
            <?php
                if (isset($_GET['pseudo_existe']) && $_GET['pseudo_existe'] == 'true') {
                    echo '<p class=\'erreur\'><em>Ce pseudo est déjà utilisé, veuillez en saisir un autre.</em></p>';
                }
                if (isset($_GET['email_existe']) && $_GET['email_existe'] == 'true') {
                    echo '<p class=\'erreur\'><em>Cette adresse email est déjà utilisée, veuillez en saisir une autre.</em></p>';
                }
                if (isset($_GET['erreur_email']) && $_GET['erreur_email'] == 'true') {
                    echo '<p class=\'erreur\'><em>Adresse email incorrecte.</em></p>';
                }
                if (isset($_GET['erreur_pass']) && $_GET['erreur_pass'] == 'true') {
                    echo '<p class=\'erreur\'><em>Les deux mots de passe ne sont pas identiques.</em></p>';
                }
            ?> 
        </form>
    </body>
</html>