<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Formulaire d'authentification NASA</title>
    </head>
    <body>
        <?php
            if (!isset($_POST['mot_de_passe'])) {
        ?>
                <p>
                    Veuillez entrer le mot de passe pour obtenir les codes d'accès au serveur central de la NASA :
                </p>
                <form action="formulaire.php" method="post">
                    <p>
                        <input type="password" name="mot_de_passe"/>
                        <input type="submit" value="Valider" />
                    </p>
                </form>
                <p>
                    Cette page est réservée au personnel de la  NASA. Si vous ne travaillez pas à la NASA, inutile d'insister, vous ne trouverez jamais le mot de passe ! ;-)
                </p>
        <?php
            }
            elseif (isset($_POST['mot_de_passe']) AND $_POST['mot_de_passe'] == "kangourou") {
        ?>
                <h1>Voici les codes d'accès :</h1>
                <p>
                    CRD5-GTFT-CK65-JOPM-V29N-24G1-LLFV
                </p>
                <p>
                    Cette page est réservée au personnel de la NASA. N'oubliez pas de la visiter régulièrement car les codes d'accès sont changés toutes les semaines.<br />
                    La NASA vous remercie de votre visite.
                </p>
        <?php
            }
            else {
                echo "<p>Mot de passe incorrect !</p>";
            }
        ?>
    </body>
</html>
