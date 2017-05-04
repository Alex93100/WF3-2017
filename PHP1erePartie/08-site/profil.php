<?php

    require_once('inc/init.inc.php');
        //-------------------- TRAITEMENT ---------------------- 
            // Si visiteur nn connecté, on l'envoie vers connexion.php :
            if(!internauteEstConnecte()){
                header('location:connexion.php'); // Nous l'invition à se connecter'
                exit();
            }

            
            // echo '<pre>';print_r($_SESSION); echo '</pre>';
            $contenu .= '<h2>Bonjour ' . $_SESSION['membre']['pseudo']. ' ! </h2>';
            
            // On affiche le statut du membre :
            if($_SESSION['membre']['statut'] == 1){
                $contenu .= '<p>Vous êtes un administrateur</p>';
            }
            else{
                $contenu .= '<p>Vous êtes un membre</p>';                
            }


            $contenu .= '<div><h3>Voici vos information de profil</h3>';            
                $contenu .= '<p> Votre email :' . $_SESSION['membre']['email'] . '</p>';
                $contenu .= '<p>Votre adresse :' . $_SESSION['membre']['adresse'] . '</p>';
                $contenu .= '<p>Votre code postal :' . $_SESSION['membre']['code_postal'] . '</p>';
                $contenu .= '<p>Votre ville :' . $_SESSION['membre']['ville'] . '</p>';
            $contenu .= '</div>';            
            
        // Exercice : 
        /*
            1- Affichez le suivi des commandes du membre(s'il y en a) dans une liste <ul><li> : id_commande, date et état de la commande. S'il n'y en a pas, vous affichez "aucune commande en cours".

            2- ...
        
        
        */ 
        $pdo = new PDO('mysql:host=localhost;dbname=site', 'root', '', array(PDO:: ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
        // echo '<pre>';print_r($_SESSION);'</pre>';
            $id_membre = $_SESSION['membre']['id_membre'];
            $suivi = executeRequete("SELECT id_commande, id_membre, montant, date_enregistrement, etat FROM commande WHERE id_membre = :id_membre", array(':id_membre'=>$id_membre));
                
                while( $commande = $suivi->fetch(PDO::FETCH_ASSOC)){
                    // On affiche le suivi des commandes :
                    $contenu .= '<p>Vous avez '. $commande['id_commande'] .'</p>';
                    $contenu .= '<p>'. $commande['id_membre'] .'</p>';
                    $contenu .= '<p>'. $commande['montant'] .'</p>';
                    $contenu .= '<p>'. $commande['date_enregistrement'] .'</p>';
                    $contenu .= '<p>'. $commande['etat'] .'</p>';
                }
                // $contenu .= '<p>Vous n\'avez aps de commande</p>';                












        //-------------------- AFFICHAGE ---------------------- 








    require_once('inc/haut.inc.php');
    echo $contenu;
?>
<?php
    require_once('inc/bas.inc.php');
?>