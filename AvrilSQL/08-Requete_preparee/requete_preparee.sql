--***********************************
-- Requêtes préparées
--***********************************

    -- Les requêtes préparées sont ds requêtes qui dissocient les phases Analyse / Interprétation / Exécution.
    -- La préparation de la requête consiste à réaliser les étapes d'analyse et d'interprétation. Ensuite on effectue l'exécution à part.

    -- La séparation des phase permet de faire des gains de performance quand une requête doit être exécutée une multitude de fois.
    -- En effet, on exécute qu'une seule fois les 2 premières phases, et X fois la dernière.



    -- Requête préparée sans marqueur :

        -- 1° Préparation :
        PREPARE req FROM "SELECT * FROM employes WHERE service = 'commercial'";  -- déclarer une requête préparée

        -- 2° Exécution de la requête :
        EXECUTE req;  -- On peut exécuter la requête plusieur fois sans refaire le cycle analyse / interprétation => gain de performance


    -- Requête préparée avec un marqueur "?" :
        -- 1° Préparation :
        PREPARE req2 FROM "SELECT * FROM employes WHERE prenom = ?";  -- déclarer une requête préparée