<?php
    /*
        Pour chaque champs du formulaire, on pourrait sécuriser les données envoyées avec la fonction suivante
        Exemple d'utilisation :
            $prenom = securisation($_POST['prenom']);
            $nom = securisation($_POST['nom']);
    */
    function securisation($donnees) {
        $donnees = trim($donnees);
        $donnees = stripslashes($donnees);
        $donnees = strip_tags($donnees);
        return $donnees;
    }
?>