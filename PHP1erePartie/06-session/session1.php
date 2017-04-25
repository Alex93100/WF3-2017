<?php
    // ***********************************
    // Les session 
    // ***********************************

        /*
            Le terme de SESSIOn désigne la période de temps correspondant à la navigation continue de l'internaute sur un site : continue, car si l'internaute ferme le navigateur, la session s'interrompt.

            Principe : un fichier temporaire appelé session est créé sr le serveur, avec un identifiant unique.
            Cette session est liée à un internaute car, dans le même temps, un cooki est déposé sur le poste de l'internaute avec l'identifiant.
            Ce cookie se détruit lorsqu'on quitte le navigateur.

            On stocke entre autre dans une session, les paniers d'achats ou les informations de connexion.
            Ces informations sont accessibles dans tous les scripts du site grâce à la session_cache_expire.
        
        */ 


        // Création ou ouverture d'une session :

        session_start(); // permet de créer un fichier de session sur le serveur OU de l'ouvrir s'il existe déjà 

        // Remplissage de la session :
        $_SESSION['pseudo'] = 'John';
        $_SESSION['mdp'] = '1234'; // $_SESSION est une superglobale, donc un array

        echo '1- La session après remplissage : ';
        echo '<pre>'; print_r($_SESSION); echo '</pre>';

        // Vider une partie de la session en cours :
        unset($_SESSION['mdp']); // Nous pouvons supprimer une partie de la session avec unset()

        echo '<br> 2- La session après suppression du mdp : ';
        echo '<pre>'; print_r($_SESSION); echo '</pre>';


        // Supprimer entièrement la session :

        // session_destroy(); // Suppression de la session MAIS il faut savoir que le session_destroy est d'abord vu par l'interpréteur qui ne l'exécute qu'a la fin du script.
        echo '<br> 3- La session après suppression totale : ';
        echo '<pre>'; print_r($_SESSION); echo '</pre>'; // En effet, on voit encore le contenue de la session car la suppression n'intervient qu'à la fin du script.
        // Pour s'en convaincre, vérifier que le fichier est suprimé dans le dossier xampp/tmp.
        