<?php
    /*
        Le header
    */

    header ("Content-type: image/jpeg");

    /*
        Créer l'image de base
    */

    // À partir d'une image vide : imagecreate
    /*
    $image = imagecreate(200,50);
    */

    // À partir d'une image existante : imagecreatefromjpeg/imagecreatefrompng
    $image = imagecreatefromjpeg("ma_photo.jpg.jpg");

    // Afficher directement l'image : imagejpeg/imagepng
?>