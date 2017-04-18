--***********************************
-- Tables virtuelles : vues
--***********************************

    -- Les vues(ou tables virtuelles) sont des objets de la base de données, constitué d'un nom, et d'une requête de sélection.

    -- Une fois une vue definie, on peut l'utiliser comme on le ferait avec une table, laquelle serait constituée des données sélectionnées par la requête définissant la vue.

    USE entreprise;

    -- Création d'une vue :
    CREATE VIEW vue_homme AS SELECT prenom, nom, sexe, service FROM employes WHERE sexe = 'm';

    -- crée une table virtuelle (ou vue) remplie avec kes données du SELECT

    -- Une seconde requête effectuée sur la vue :
    SELECT prenom FROM vue_homme; -- on peut effectuer toutes les opérations habituelles sur cette table virtuelle vue_homme

    -- Si il y a un changement dans la table d'origne, la vue est corrigée dynamiquement car elle enregiste la requete SELECT qui pointe vers la table d'origine. Inversement, si il y a un changement dans la table virtuelle, il s'impacte dans la table d'origine.

    -- Il ya intérêt à faire des vue en termes de gain de ressources, ou quand il y a des requête complexxes à exécuter.

    SHOW TABLES; -- cette vue est visible dans la liste des tables avec cette instruction

    --  Supprimer une vue :

    DROP VIEW vue_homme;


--***********************************
-- Tables temporaires
--***********************************

    -- Créer une table temporaire : 
    CREATE TEMPORARY TABLE temp SELECT * FROM employes WHERE sexe = 'f'; --crée une table temporaire avec les données du SELECT précisé. Cette table s'efface quand on quitte la session, elle n'st pas visible dans la liste des tables avec SHOW TABLES.

    -- Utiliser une table temporaire :
    SELECT prenom FROM temp; --Afficher les prénoms de la table temporaire temp

    -- Contrairement aux tables virtuelles, s'il y a un changement dans la table d'orrigine, il n'est pas impacté dans la table temporaire car celle-ci est une COPIE à un INSTANT T : les données sont dupliquées.