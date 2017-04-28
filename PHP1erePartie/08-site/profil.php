<?php

    require_once('inc/init.inc.php');
        //-------------------- TRAITEMENT ---------------------- 
            // Si visiteur nn connecté, on l'envoie vers connexion.php :
            if(!internauteEstConnecte()){
                header('location:connexion.php'); // Nous l'invition à se connecter'
                exit();

            }














        //-------------------- AFFICHAGE ---------------------- 








    require_once('inc/haut.inc.php');
    echo $contenu;
?>
<?php
    require_once('inc/bas.inc.php');
?>