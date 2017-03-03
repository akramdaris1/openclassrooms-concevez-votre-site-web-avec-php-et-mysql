<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Serveur central de la NASA</title>
    </head>
    <body>
        <?php
            if (isset($_POST['mot_de_passe']) AND $_POST['mot_de_passe'] == "kangourou") {
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
