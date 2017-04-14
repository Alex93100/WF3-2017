--  Ouvrire la console SQL sous XAMPP :
--      cd c:\xampp\mysql\bin
--      mysql.exe -u root --password


-- Ligne de commentaire en SQL débte par --
-- les requête ne sont pas sensible à la casse, mais une convention indique qu'il faut mettre les mots clés des requête en MAJ.




-- ************************************************* 
-- Requêtes générales
-- ************************************************* 

    CREATE DATABASE entreprise;  -- crée une nouvelle base de données appelée "entreprise"

    SHOW DATABASES; --petmet d'afficher les BDD disponibles'

    -- NE PAS SAISIR dans la console :
    DROP DATABASE entreprise;   -- supprimer la BDD entreprise

    DROP table employes;        -- supprimer la table employes

    TRUNCATE employes;          -- vider la table employes de son contenu


    -- On peut collet dans la console :

    USE entreprise;     -- se connecter à la BDD entreprise

    SHOW TABLES;        -- permet de lister les tables de la BDD en cours d'utilisation'

    DESC employes;      -- observer la structure de la table ainsi que les champs (DESC pour describe)


-- ************************************************* 
-- Requêtes de sélection
-- *************************************************

    SELECT nom, prenom FROM employes; 
    -- Affiche (sélectionne) le nom et le prénom de la table employes : SELECT sélectionne les champs indiqués, FROM la ou les tables utilisées.

    SELECT service FROM employes;     -- Affiche les services de l'entreprise

    -- DISTINCT
    -- On a vu dans la requête précédente que les services sont affichés plusieurs fois. Pour éliminer les dounlons,on utilise DISTINCT :

        SELECT DISTINCT service FROM employes;
    
    --ALL ou *
    -- On peut afficher toutes les informations issues 'une table avec une "*" (pour dire ALL) :

        SELECT * FROM employes; -- affiche toute la table employe

    -- clause WHERE

        SELECT prenom, nom FROM employes WHERE service = 'informatique'; 
        -- Affiche le prenom et le nom des employes du service informatique.
        -- Notez que le nom des champs ou des tables ne prennent pas de quotes, alors que les valuers telle que 'Informatique' prennent des quotes ou des guillemets. 
        -- Cependant, s'il s(agit d'un chiffre, on ne lui met pas der quote.


    -- BETWEEN

        SELECT nom, prenom, date_embauche FROM employes WHERE date_embauche BETWEEN '2006-01-01' AND '2010-12-31'; 
        -- Affiche les employes dont la date d'embauche est entre 2006 et 2010'

    -- LIKE

        SELECT prenom FROM employes WHERE prenom LIKE 's%';     
        -- Affiche les prenom des employes commençant pas s. Le signe % est un joker qui rmeplace les autres caractères.

        SELECT prenom FROM employes WHERE prenom LIKE '%-%';    
        -- Affiche les prenom des employes contenant un -. LIKE est utilisé en autre pour les formulaires de recherche sur les sites.

    -- Opérateurs de comparaisons :

        SELECT prenom, nom, service FROM employes WHERE service != 'informatique'; 
        -- Affiche le prenom et le nom des employes n'étant pas du service informatique

        --  =
        --  <
        --  >
        --  <=
        --  >=
        --  != ou encore <> pour différent de

    -- ORDER BY pour faire des tris :

        SELECT nom, prenom, service, salaire FROM employes ORDER BY salaire; 
        -- Affiche les employes par salaire en ordre croissant par défaut.

        SELECT nom, prenom, service, salaire FROM employes ORDER BY salaire ASC, prenom DESC; 
        -- ASC pour un tri ascendant, DESC pour un tri descendant.
        -- Ici on trie les salaire par ordre croissant puis à salaire identique, les prenoms par ordre décroissant.
    
    -- LIMIT

        SELECT nom, prenom, salaire FROM employes ORDER BY salaire DESC LIMIT 0,1; 
        -- Affiche l'employe ayant le salaire le plus élevé. : 
        -- On trie d'abord les salaire par ordre décroissant (pour avoir le plus élevé en premier), puis on limite le résultat au premier enreistrement avec LIMIT 0,1.
        -- Le 0 signifie le point de départ de LIMIT, et le 1 signifie prendre 1 enregistrement. On utilise LIMIT dans la pagination sur les sites.

    -- L'alias avec AS :

        SELECT nom, prenom, salaire * 12 AS salaire_annuel FROM employes; 
        -- Affiche le salaire sur 12 mois des employes. salaire_annuel est un alias qui "stocke" la valeur de ce qui précéde.

    -- SUM

        SELECT SUM(salaire * 12) FROM employes; 
        -- Affiche le salaire total annuel de tous les employes.SUM permet d'additionner des valeur de champs différens.

    -- MIN eet MAX :

        SELECT MIN(salaire) FROM employes; -- Affiche le salaire le plus base.
        SELECT MAX(salaire) FROM employes; -- Affiche le salaire le plus haut.

        SELECT prenom, MIN(salaire) FROM employes; 
        -- Ne donne pas le résultat attendu, car affiche le premier prénom rencontré dans la table (J-P).
        -- Il faut pour répondre à cette questuon utiliser ORDER BY et LIMIT comme au-dessus :
        SELECT prenom, salaire FROM employes ORDER BY salaire ASC LIMIT 0,1;

    -- AVG (average)

        SELECT AVG(salaire) FROM employes; -- Affiche le salaire moyen de l'entreprise.

    -- ROUND

        SELECT ROUND(AVG(salaire), 1) FROM employes; -- Affiche le salaire moyen arrondi à 1 chiffre après la virgule

    -- COUNT

        SELECT COUNT(id_employes) FROM employes WHERE sexe = 'f'; -- Affiche le nombre d'employées feminins

    -- IN

        SELECT prenom, service FROM employes WHERE service IN ('comptabilite', 'informatique'); 
        --Affiche les employes appartenant à la contabilité ou à l'informatique'.
    
    -- NOT IN

        SELECT prenom, service FROM employes WHERE service NOT IN ('comptabilite', 'informatique'); 
        --Affiche les employes n'appartenant pas à la contabilité ou à l'informatique'.
    
    -- AND et OR

        SELECT prenom, service, salaire FROM employes WHERE service = 'commercial' AND salaire <= 2000; 
        -- Affiche le prénom des cemerciaux dont le salaire est inférieur ou égal à 2000.

        SELECT prenom, service, salaire FROM employes WHERE (service = 'production' AND salaire = 1900) OR salaire = 2300;
        -- Affiche les employes du service porduction dont le salaire est de 1900, ou dans les autres services ceux qui gagnent 2300

    -- GROUP BY

        SELECT service, COUNT(id_employes) AS nombre FROM employes GROUP BY service; 
        -- Affiche le nombre d'employes PAR service. GROUP BY distribue les résultats du comptage par les serviceds correspondants.
    
    -- GROUP BY ... HAVING

        SELECT service, COUNT(id_employes) AS nombre FROM employes GROUP BY service HAVING nombre > 1;
        --  Affiche les service ou il y a plus d'un employé. HAVING remplace WHERE dans un GROUP BY.
    


-- ************************************************* 
-- Requêtes de sélection
-- *************************************************

    SELECT * FROM employes; -- on observe la table avant de la moifier

    INSERT INTO employes (id_employes, prenom, nom, sexe, service, date_embauche, salaire) VALUES (8059, 'alexis', 'richy', 'm', 'informatique', '2011-12-28', 1800);
    -- Insertion d'un employe. Notez que l'ordre des champs énoncés entre les 2 paires de parenthèse doit etre le meme pour que les valeur correspondent.

    INSERT INTO employes VALUES (8059, 'test', 'test', 'm', 'test', '2011-12-28', 1800, 'valeur en trop');
    -- Insertion d'un employe sans préciser la liste des champs si et seulement si le nombre et l'ordre des valeurs attendues sont respectés
    -- => ici erreur car il y a une valeur en trop !
    

-- ************************************************* 
-- Requêtes de modification
-- *************************************************

    -- UPDATE
        
        UPDATE employes SET salaire = 1870 WHERE nom = 'cottet'; -- modifie le salaire de l'employe de nom Cottet.
        
        UPDATE employes SET salaire = 1871 WHERE id_employes = 699;
        -- Il est recommandé de faire des modifications de données par les id car ils sont uniques. Cela évite d'updater plusieurs enregistrements à la fois.

        UPDATE employes SET salaire = 1872, service = "autre" WHERE id_employes = 699;
        -- On modifie 2 valeurs dans la meme requête

        -- A ne pas faire (sauf cas contraire) : un UPDATE sans clause WHERE :
        UPDATE employes SET salaire = 1870; -- ici les salaires de TOUS les employés passent à 1870

    -- REPLACE

        REPLACE INTO employes (id_employes, prenom, nom, sexe, service, date_embauche, salaire) value (200, 'test', 'test', 'm', 'marketing', '2010-07-05', 2600);
        -- l'id_employes 2000 n'existant pas, REPLACE se comporte comme un INSERT

        REPLACE INTO employes (id_employes, prenom, nom, sexe, service, date_embauche, salaire) value (200, 'test2', 'test2)', 'm', 'marketing', '2010-07-05', 2601);
        -- comme l'id_employes existe, REPLACE se comporte comme un UPDATE
        

-- ************************************************* 
-- Requêtes de suppression
-- *************************************************

    -- DELETE

        DELETE FROM employes WHERE id_employes = 900; -- Suppression de l'employe dont l'id est 900
        DELETE FROM employes WHERE service = 'informatique' AND id_employes != 802; -- supprime tous les informaticiens sauf 1 (dont l'id est 802)
        DELETE FROM employes WHERE id_employes = 388 OR id_employes = 990; 
        -- supprime 2 employes qui n'ont pas de point commun. il s'agit d'un OR et non pas d'un AND car un employe ne peut pas avoir 2 id_employes différents

        -- A ne pas faire : un DELETE sans clause WHERE :
        DELETE FROM employes; -- revient à faire un TRUNCATE de table qui est irréversible



-- ************************************************* 
-- Exercices
-- *************************************************

    -- 1. Afficher le service de l'employé 547

        SELECT service FROM employes WHERE id_employes = 547;

    -- 2. Afficher la date d'embauche d'Amandine

        SELECT date_embauche FROM employes WHERE prenom = 'Amandine';

    -- 3. Afficher le nombre de commerciaux

        SELECT COUNT(id_employes) FROM employes WHERE service = 'commercial';

    -- 4. Afficher le coût des commerciaux sur 1 annuel

        SELECT SUM(salaire*12) FROM employes WHERE service = 'commercial'; 

    -- 5. Afficher le salaire moyen par service

        SELECT service, AVG(salaire) FROM employes GROUP BY service;

    -- 6. Afficher le nombre de recrutement sur l'année 2010 (3 syntaxes possibles)

        SELECT COUNT(date_embauche) FROM employes WHERE date_embauche BETWEEN '2010-01-01' AND '2010-12-31';

        SELECT COUNT(id_employes) FROM employes WHERE date_embauche BETWEEN '2010-01-01' AND '2010-12-31';

        SELECT COUNT(id_employes) FROM employes WHERE date_embauche >= '2010-01-01' AND date_embauche <= '2010-12-31';

        SELECT COUNT(date_embauche) FROM employes WHERE date_embauche LIKE '2010%';


    -- 7. Augmenter le salaire de chaque employé de 100

        UPDATE employes SET salaire = salaire + 100;

    -- 8. Afficher le nombre de services différents

        SELECT COUNT(DISTINCT service) FROM employes;

    -- 9. Afficher le nombre d'employés par service

        SELECT service, COUNT(id_employes) FROM employes GROUP BY service;

    -- 10. Afficher les infos de l'employé du service commercial ayant le salaire le plus élevé

        SELECT nom, prenom, salaire, id_employes FROM employes WHERE service ='Commercial' ORDER BY salaire DESC LIMIT 1;

    -- 11. Afficher l'employé ayant été embauché en dernier
        SELECT nom, prenom, sexe, salaire, service, id_employes FROM employes ORDER BY date_embauche DESC LIMIT 1;
