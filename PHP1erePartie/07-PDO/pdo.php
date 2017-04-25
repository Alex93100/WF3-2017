<?php

    // *********************************
    // PDO
    // *********************************
        
        // L'extension PHP Data Objects (PDO) définit une interface pour accéder à une base de données depuis PHP.

        // ******************************
        // 1. Connexion
        // ******************************

            echo '<h1> 1. Connexion </h1>';

            $pdo = new PDO('mysql:host=localhost;dbname=entreprise', 'root', '', array(PDO:: ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));

            // $pdo est un objet issu de la classe prédéfinie PDO : il représente la connexion à la BDD.

            /* Les arguments passés à PDO :
                - driver + serveur + nom de la base de données
                - pseudo du SGBD
                - mdp du SGBD
                - options : option 1 pour générer l'affichage des erreurs, option 2 = commande à exécuter lors de la connexion au serveur qui défint le jeu de caractères des échanges avec la BDD.
            */

            print_r($pdo);

            echo '<pre>'; print_r(get_class_methods($pdo)); '</pre>'; // permet d'afficher les méthodes disponibles dans l'objet $pdo

        // ******************************
        // 2. exec() avec INSERT, UPDATE et DELETE
        // ******************************
            echo '<h1> 2. exec() avec INSERT, UPDATE et DELETE </h1>';
            // $resultat = $pdo->exec("INSERT INTO employes(prenom, nom, sexe, service, date_embauche, salaire)VALUES('Jean', 'Tartempion', 'm', 'informatique', '2017-04-25', 300)");

            /*
                exec() est utilisé pour formuler des requetes ne retournant pas de jeu de rrésultats : INSERT, UPDATE et DELETE

                Valeur de retour :
                Succès : un integer correspondant au nombre de ligne affetcées
                Echec : false
            
            */ 
            
            // echo "Nombre d'enregistrements affectés par l'INSERT : $resultat <br>";
            echo 'Dernier id généré : ' . $pdo->lastInsertId() . '<br>';
        
            // -----------------

            $resultat = $pdo->exec("UPDATE employes SET salaire = 6000 WHERE id_employes = 350");
            echo "Nombre d'enregistrements affectés par l'UPDATE : $resultat <br>";
            

        // ******************************
        // 3. query() avec SELECT + fetch
        // ******************************

        echo '<h1>3. query() avec SELECT + fetch</h1>'
        $result = $pdo->query("SELECT * FROM employes WHERE prenom = 'daniel'");