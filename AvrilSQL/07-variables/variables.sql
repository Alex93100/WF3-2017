--********************************
-- Les variables en SQL
--********************************
    -- Une varaible est un espace mémoire nommé qui permet de conserver une valeur.

    -- permet d'observer les variables systèmes :
    SHOW VARIABLES;

    SELECT @@version; -- on met deux @ pour accéder à une variable système

    -- Déterminer nos propres variables :
    SET @ecole = 'WF3'; -- déclare une variable ecole et lui affecte la valeur 'WF3'

    SELECT @ecole; -- on peut accéder au contenue de cette variable par son nom