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

SELECT date_sortie FROM emprunt WHERE id_abonne;


-- 4.Combien de livres sont sortis le 2011-12-19 ?

SELECT COUNT(date_sortie) FROM emprunt WHERE date_sortie BETWEEN '2011-12-19' AND '2011-12-19';

-- 5. Une Vie est de quel auteur ?

SELECT auteur FROM livre WHERE titre = 'Une vie';

-- 6. De combien de livre d'Alexnadre Dumas dispose-t-on ?

SELECT COUNT(id_livre) FROM livre WHERE auteur = 'Alexandre Dumas';


-- 7. Quel id_livre est le plus emprunté ?

SELECT id_emprunt FROM emprunt WHERE id_emprunt + id_emprunt;

-- 8. Quel id_abonne emprunte le plus de livre ?

SELECT id_abonne FROM emprunt WHERE id_emprunt;
