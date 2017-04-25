<?php

    // Contexte : Souvent sur les sites bancaires, vous êtes déconnecté automatiquement au bout de 10 min d'inactivité.
    session_start(); // On crée une session

    echo '<pre>'; print_r($_SESSION); echo '</pre>';

    if(isset($_SESSION['temps']) && isset($_SESSION['limite'])){
        // On vérifie si les 10 sec d'inactivité sdont écoulées :
        if (time() > ($_SESSION['temps'] + $_SESSION['limite'])){
            session_destroy(); // Si les 10 secondes sont écoulées, on supprime la session
            echo '<hr> Votre session a expiré, vous êtes déconnecté <hr>';
        }
        else{
            $_SESSION['temps'] = time(); // sinon on remet à jour le temps pour relancer les 10 secondes

            echo '<hr>Connexion mise à jour<hr>';
        }



    }
    else{ // On  entre dans ce else la première fois pour remplir la session :
        $_SESSION['temps'] = time(); // On remplit la session avec un indice 'temps' qui contient le timestamp de l'instant présent
        $_SESSION['limite'] = 10; // On fixe la duré limite de session à 10 secondes
        echo '<hr> Vous êtes connecté <hr>';

    }