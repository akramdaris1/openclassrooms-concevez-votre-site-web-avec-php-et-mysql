/*
    Les fonctions scalaires
*/

/* UPPER : convertir en majuscules */
SELECT UPPER(nom) AS nom_maj FROM jeux_video;

/* LOWER : convertir en minuscules */
SELECT LOWER(nom) AS nom_min FROM jeux_video;

/* LENGTH : compter le nombre de caractères */
SELECT LENGTH(nom) AS longueur_nom FROM jeux_video;

/* ROUND : arrondir un nombre décimal */
SELECT ROUND(prix, 2) AS prix_arrondi FROM jeux_video;

/*
    Les fonctions d'agrégat
*/

/* AVG : calculer la moyenne */
SELECT AVG(prix) AS prix_moyen FROM jeux_video;

/* SUM : additionner les valeurs */
SELECT SUM(prix) AS prix_total FROM jeux_video WHERE possesseur='Patrick';

/* MAX : retourner la valeur maximale */
SELECT MAX(prix) AS prix_max FROM jeux_video;

/* MIN : retourner la valeur minimale */
SELECT MIN(prix) AS prix_min FROM jeux_video;

/* COUNT : compter le nombre d'entrées */
SELECT COUNT(*) AS nbjeux FROM jeux_video;

/*
    GROUP BY et HAVING : le groupement de données
*/

/* GROUP BY : grouper des données */
SELECT AVG(prix) AS prix_moyen, console FROM jeux_video GROUP BY console;

/* HAVING : filtrer les données regroupées */
SELECT AVG(prix) AS prix_moyen, console FROM jeux_video GROUP BY console HAVING prix_moyen <= 10;
