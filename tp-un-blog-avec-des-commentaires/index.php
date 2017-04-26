<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>Blog avec des commentaires</title>
        <meta charset="UTF-8">
        <link href="style.css" rel="stylesheet">
    </head>
    <body>
        <h1>Mon super blog !</h1>
        <p>Derniers billets du blog :</p>
        <?php
            try
            {
                // On se connecte à MySQL
                $bdd = new PDO('mysql:host=localhost;dbname=openclassrooms_concevez_votre_site_web_avec_php_et_mysql;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
            } catch(Exception $e) {
                // En cas d'erreur, on affiche un message et on arrête tout
                die('Erreur : '.$e->getMessage());
            }
            // On récupère tout le contenu de la table billets
            $reponse = $bdd->query('SELECT id, titre, contenu, DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation_fr FROM billets ORDER BY date_creation DESC LIMIT 0, 5');
            // On affiche chaque entrée une à une
            while ($donnees = $reponse->fetch()) {
        ?>
                    <div class="news">
                        <h3><?php echo htmlspecialchars($donnees['titre']) . ' le ' . htmlspecialchars($donnees['date_creation_fr']); ?></h3>
                        <p>
                            <?php echo nl2br(htmlspecialchars($donnees['contenu'])); ?>
                            <br>
                            <em><a href="commentaires.php?billet=<?php echo htmlspecialchars($donnees['id']); ?>">Commentaires</a></em>
                        </p>
                    </div>
        <?php
            }
            $reponse->closeCursor(); // Termine le traitement de la requête
        ?>
    </body>
</html>