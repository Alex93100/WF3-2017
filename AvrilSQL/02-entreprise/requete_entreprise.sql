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
        -- Ne donne pas le résultat attendu, car affiche le premier prénom rencontré dans la table (J-P). Il faut pour répondre à cette questuon utiliser ORDER BY et LIMIT comme au-dessus :
        SELECT prenom, salaire FROM employes ORDER BY salaire ASC LIMIT 0,1;

    -- AVG (average)

        SELECT AVG(salaire) FROM employes; -- Affiche le salaire moyen de l'entreprise.

    -- ROUND

        SELECT ROUND(AVG(salaire), 1) FROM employes; -- Affiche le salaire moyen arrondi à 1 chiffre après la virgule