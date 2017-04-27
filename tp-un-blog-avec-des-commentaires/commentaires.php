<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>Blog avec des commentaires</title>
        <meta charset="UTF-8">
        <style>
            form {
                text-align: center;
            }
        </style>
    </head>
    <body>
        <h1>Mon super blog !</h1>
        <p><a href="index.php">Retourner à la liste des billets</a></p>
        <?php
            try
            {
                // On se connecte à MySQL
                $bdd = new PDO('mysql:host=localhost;dbname=openclassrooms_concevez_votre_site_web_avec_php_et_mysql;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
            } catch(Exception $e) {
                // En cas d'erreur, on affiche un message et on arrête tout
                die('Erreur : '.$e->getMessage());
            }
            /*
                On charge d'abord la partie liée aux billets
            */
            // On récupère les informations du billet sélectionné
            $billets = $bdd->prepare('SELECT id, titre, contenu, DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation_fr FROM billets WHERE id = ?');
            $billets->execute(array($_GET['billet']));
            // On récupère aussi les commentaires coorespondants à ces billets
            $commentaires = $bdd->prepare('SELECT auteur, commentaire, DATE_FORMAT(date_commentaire, \'%d/%m/%Y à %Hh%imin%ss\') AS date_commentaire_fr FROM commentaires WHERE id_billet = ? ORDER BY date_commentaire');
            $commentaires->execute(array($_GET['billet']));
// On affiche les informations du billet sélectionné
            $billet = $billets->fetch();
        ?>
                <div class="news">
                    <h3><?php echo htmlspecialchars($billet['titre']) . ' le ' . htmlspecialchars($donnees['date_creation_fr']); ?></h3>
                    <p>
                        <?php echo htmlspecialchars($billet['contenu']); ?>
                    </p>
                </div>
            <h2>Commentaires</h2>
        <?php
            while ($commentaire = $commentaires->fetch()) {
                echo '<p><strong>' . htmlspecialchars($commentaire['auteur']) . '</strong> le ' . htmlspecialchars($commentaire['date_commentaire_fr']) . '</p>';
                echo '<p>' . nl2br(htmlspecialchars($commentaire['commentaire'])) . '</p>';
            }
            $billets->closeCursor(); // Termine le traitement de la requête
            $commentaires->closeCursor(); // Termine le traitement de la requête
        ?>
    </body>
</html>