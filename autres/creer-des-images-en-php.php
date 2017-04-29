<?php

    /*
        Créer et afficher une image
            - imagejpeg/imagepng (image)
            - header(type de contenu)

        <?php
            header ("Content-type: image/jpeg");
            $image = imagecreate(200,50);
            imagejpeg($image);
        ?>
    */




    /*
        Charger et afficher une image
            - imagecreatefromjpeg/imagecreatefrompng (cheminEtNonDeLimage)
            - imagejpeg/imagepng (image)

        <?php
            header ("Content-type: image/jpeg");
            $image = imagecreatefromjpeg("./ma_photo.jpg");
            imagejpeg($image);
        ?>
    */





    /*
        Enregistrer l'image sur le disque
            - imagepng (image, chemin)

        $image = imagecreate(200,50);
        imagepng($image, "images/monimage.png");
    */





    /*
        Manipuler les couleurs
            - imagecolorallocate : (r, g, b)

        <?php
            header ("Content-type: image/png");
            $image = imagecreate(200,50);
            $orange = imagecolorallocate($image, 255, 128, 0);
            $bleu = imagecolorallocate($image, 0, 0, 255);
            $bleuclair = imagecolorallocate($image, 156, 227, 254);
            $noir = imagecolorallocate($image, 0, 0, 0);
            $blanc = imagecolorallocate($image, 255, 255, 255);
            imagepng($image);
        ?>
    */





    /*
        Écrire du texte
            - imagestring(image, police, x_abscisse, y_ordonnee, texteAEcrire, couleur)
                - police : taille de la police(entre 1 & 5)

        <?php
            header ("Content-type: image/png");
            $image = imagecreate(200,50);
            $orange = imagecolorallocate($image, 255, 128, 0);
            $bleu = imagecolorallocate($image, 0, 0, 255);
            $bleuclair = imagecolorallocate($image, 156, 227, 254);
            $noir = imagecolorallocate($image, 0, 0, 0);
            $blanc = imagecolorallocate($image, 255, 255, 255);

            imagestring($image, 4, 35, 15, "Salut les Zéros !", $blanc);

            imagepng($image);
        ?>
    */




    /*
        Dessiner une forme

        dessiner un pixel aux coordonnées (x,y)
            - ImageSetPixel(x, y, couleur)
        dessiner une ligne entre deux points de coordonnées (x1,y1)  et (x2,y2)
            - ImageEllipse (image, x, y, largeur, hauteur, couleur);
        dessine une ellipse dont le centre est aux coordonnées (x,y), de largeur$largeuret de hauteur$hauteur
            - ImageEllipse (image, x, y, largeur, hauteur, couleur);
        dessine un rectangle, dont le coin en haut à gauche est de coordonnées $(x_1, y_1)$ et celui en bas à droite $(x_2, y_2)$
            - ImageRectangle (image, x1, y1, x2, y2, couleur);
        dessine un polygone ayant un nombre de points égal à$nombre_de_points(s'il y a trois points, c'est donc un triangle).
            L'array$array_pointscontient les coordonnées de tous les points du polygone dans l'ordre :
            $x_1$, $y_1$, $x_2$, $y_2$, $x_3$, $y_3$, $x_4$, $y_4$…
            - ImagePolygon (image, array_points, nombre_de_points, couleur);

        <?php
            ImageSetPixel ($image, 100, 100, $noir);
            ImageLine ($image, 30, 30, 120, 120, $noir);
            ImageEllipse ($image, 100, 100, 100, 50, $noir);
            ImageRectangle ($image, 30, 30, 160, 120, $noir);
            $points = array(10, 40, 120, 50, 160, 160); ImagePolygon ($image, $points, 3, $noir);
        ?>
    */





    /*
        Des fonctions encore plus puissantes

        Rendre une image transparente (seulement possible pour les images au format png)
            - imagecolortransparent(image, couleur)
        <?php
            imagecolortransparent($image, $orange); // On rend le fond orange transparent
        ?>

        Mélanger deux images
            - imagecopymerge(destination, source, destination_x, destination_y, 0, 0, largeur_source, hauteur_source, 60)
        <?php
            header ("Content-type: image/jpeg"); // L'image que l'on va créer est un jpeg
            // On charge d'abord les images
            $source = imagecreatefrompng("logo.png"); // Le logo est la source
            $destination = imagecreatefromjpeg("couchersoleil.jpg"); // La photo est la destination

            // Les fonctions imagesx et imagesy renvoient la largeur et la hauteur d'une image
            $largeur_source = imagesx($source);
            $hauteur_source = imagesy($source);
            $largeur_destination = imagesx($destination);
            $hauteur_destination = imagesy($destination);
            // On veut placer le logo en bas à droite, on calcule les coordonnées où on doit placer le logo sur la photo
            $destination_x = $largeur_destination - $largeur_source;
            $destination_y =  $hauteur_destination - $hauteur_source;
            // On met le logo (source) dans l'image de destination (la photo)
            imagecopymerge($destination, $source, $destination_x, $destination_y, 0, 0, $largeur_source, $hauteur_source, 60);
            // On affiche l'image de destination qui a été fusionnée avec le logo
            imagejpeg($destination);
        ?>
    */





    /*
        Redimensionner une image

        - imagecopyresampled(destination, source, distance_x, distance_y, source_x, source_y, largeur_destination, hauteur_destination, largeur_source, hauteur_source)

        <?php
            $source = imagecreatefromjpeg("couchersoleil.jpg"); // La photo est la source
            $destination = imagecreatetruecolor(200, 150); // On crée la miniature vide

            // Les fonctions imagesx et imagesy renvoient la largeur et la hauteur d'une image
            $largeur_source = imagesx($source);
            $hauteur_source = imagesy($source);
            $largeur_destination = imagesx($destination);
            $hauteur_destination = imagesy($destination);

            // On crée la miniature
            imagecopyresampled($destination, $source, 0, 0, 0, 0, $largeur_destination, $hauteur_destination, $largeur_source, $hauteur_source);

            // On enregistre la miniature sous le nom "mini_couchersoleil.jpg"
            imagejpeg($destination, "mini_couchersoleil.jpg");
        ?>
    */

?>