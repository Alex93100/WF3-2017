--*************************************
-- Fonctions prédéfinies
--*************************************

    -- Fonctions prédéfinies : prévue par le langage SQL, et exécutée par le développeur.

    -- Dernier Id inséré : 

    INSERT INTO abonne (prenom) VALUES ('test');
    SELECT LAST_INSERT_ID(); -- permet d'afficher le dernier identifiant inséré

    -- Fonctions de dates : 
    
    SELECT *, DATE_FORMAT(date_rendu, '%d-%m-%Y') AS date_rendu_fr FROM emprunt; 
    -- met les dates du champ date_rendu_fr au format francais JJ-MM-AAAA

    SELECT NOW(); -- Afficher la date et l'heure en cours

    SELECT DATE_FORMAT(NOW(), '%d-%m-%Y %H-%i-%s');

    SELECT CURDATE(); -- retourne la date du jour au format YYYY-MM-DD
    SELECT CURTIME(); -- retourne l'heure courante au format hh:mm:ss

    -- Crypter un mot de passe avec l'algorithme AES :
    SELECT PASSWORD('mypass'); -- affiche 'mypass' crypté par l'algorithme AES
    INSERT INTO abonne (prenom) VALUES(PASSWORD('mypass')); --insère le mdp crypté en base

    -- Concaténation :
    SELECT CONCAT('a', 'b', 'c'); --concatène les 3 chaîne de caractères
    SELECT CONCAT_WS(' - ', 'a', 'b', 'c'); -- concat with separator : concaténation avec un séparateur


    -- Fonctions sur les chaînes de caractères : 
    SELECT SUBSTRING('bonjour', 1, 3); -- affiche 'bon' : compte 3 à partir de la position 1
    SELECT TRIM('                   bonjour            '); -- Supprime les espaces avant et apres la chaîne de caractères

    -- sources pour trouver des fonctions SQL : sql.sh