-- **************************************
-- Création de la BDD
-- **************************************

CREATE DATABASE bibliotheque;

USE bibliotheque;

-- Copier le contenue de dossier bibliotheque


-- **************************************
-- Exercices
-- **************************************

    -- 1. Quel est l'id_abonne de Laura ?

    SELECT id_abonne FROM abonne WHERE prenom = 'Laura';

    -- 2. L'abonné d'id_abonne 2 est venu emprunter un livre à quelle dates ?

    SELECT date_sortie FROM emprunt WHERE id_abonne = 2;

    -- 3. Combien d'emprunts ont été effectués en tout ?

    SELECT COUNT(id_emprunt) FROM emprunt;

    -- 4.Combien de livres sont sortis le 2011-12-19 ?

    SELECT COUNT(date_sortie) FROM emprunt WHERE date_sortie = '2011-12-19';

    -- 5. Une Vie est de quel auteur ?

    SELECT auteur FROM livre WHERE titre = 'Une vie';

    -- 6. De combien de livre d'Alexnadre Dumas dispose-t-on ?

    SELECT COUNT(id_livre) FROM livre WHERE auteur = 'Alexandre Dumas';

    -- 7. Quel id_livre est le plus emprunté ?

    SELECT id_livre, COUNT(id_livre) AS nombre FROM emprunt GROUP BY id_livre ORDER BY nombre DESC LIMIT 0,1;

    -- 8. Quel id_abonne emprunte le plus de livre ?

    SELECT id_abonne, COUNT(id_emprunt) FROM emprunt GROUP BY id_abonne ORDER BY COUNT(id_emprunt) DESC LIMIT 1;


-- **************************************
-- Requêtes imbriquées
-- **************************************
    -- Syntaxe "aide mémoire" de larequête imbriquée :
    -- SELECT a FROM table_de_a WHERE b IN (SELECT b FROM table_de_b WHERE condition);

    -- Afin de réaliser une requête imbriquée il faut obligatoirement un champ en COMMUN entre les deux tables.

    -- Un champ NULL se teste avec IS NULL : 

    SELECT id_livre FROM emprunt WHERE date_rendu IS NULL;  -- Affiche les id_livre non rendus

    -- Afficher les titres de ces livres non rendus :
    SELECT titre FROM livre WHERE id_livre IN (SELECT id_livre FROM emprunt WHERE date_rendu IS NULL);

    -- Afficher le n° de slivres que Chloé a emprunté :
    SELECT id_livre FROM emprunt WHERE id_abonne = (SELECT id_abonne FROM abonne WHERE prenom = 'chloe');