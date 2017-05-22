<?php

    require_once('inc/init.inc.php');
        //-------------------- TRAITEMENT ---------------------- 
            // Si visiteur nn connecté, on l'envoie vers connexion.php :
            if(!internauteEstConnecte()){
                header('location:connexion.php'); // Nous l'inviton à se connecter
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
                $contenu .= '<p> Votre pseudo :' . $_SESSION['membre']['pseudo'] . '</p>';
                $contenu .= '<p>' . $_SESSION['membre']['civilite'] . '</p>';
                $contenu .= '<p> Votre nom :' . $_SESSION['membre']['nom'] . '</p>';
                $contenu .= '<p> Votre prenom :' . $_SESSION['membre']['prenom'] . '</p>';
                $contenu .= '<p> Votre email :' . $_SESSION['membre']['email'] . '</p>';
                $contenu .= '<p>Votre adresse :' . $_SESSION['membre']['adresse'] . '</p>';
                $contenu .= '<p>Votre ville :' . $_SESSION['membre']['ville'] . '</p>';
                $contenu .= '<p>Votre code postal :' . $_SESSION['membre']['cp'] . '</p>';
            $contenu .= '</div>';            
            
        // echo '<pre>';print_r($_SESSION);'</pre>';
            $id_membre = $_SESSION['membre']['id_membre'];
            $suivi = executeRequete("SELECT id_commande, id_membre, montant, date_enregistrement, etat FROM commande WHERE id_membre = '$id_membre'", array(':id_membre'=>$id_membre));
                if($suivi->rowCount() != 0){
                    while( $commande = $suivi->fetch(PDO::FETCH_ASSOC)){
                        // On affiche le suivi des commandes :
                        $contenu .= '<div><h3>Voici les details de votre commande :</h3>';            
                                $contenu .= '<p>Votre numéro membre est le N°'. $commande['id_membre'] .'</p>';
                                $contenu .= '<p>Vous avez '. $commande['id_commande'] .' commande</p>';
                                $contenu .= '<p>Résumer commande :'. $commande['id_produit'] .'</p>';
                                $contenu .= '<p>Le montant de votre achat est de '. $commande['montant'] .'€</p>';
                                $contenu .= '<p>Date de la commande : '. $commande['date_enregistrement'] .'</p>';
                        $contenu .= '</div>';            
                        
                    }
                }
                else{
                    $contenu .= '<p>Vous n\'avez pas de commande</p>';                
                }

                    // $id_membre = $_SESSION['membre']['id_membre'];
                    // $suivi = executeRequete("SELECT id_commande, id_membre, montant, date_enregistrement, etat FROM commande WHERE id_membre = '$id_membre'");
                    // // Dans une requête SQL, on met les variable entre quotes. Pour mémoire, si on y met un array, celui-ci perd ses quotes autour de l'indice. 
                    // // A savoir: on ne peut pas le faire avec un array multidimensionnel

                    // // S'il y a des commandes dans $suivi, on les affiche :
                    //     if($suivi->rowCount() != 0){
                    //            $contenu .= '<ul>';
                    //         while( $commande = $suivi->fetch(PDO::FETCH_ASSOC)){
                    //             // On affiche le suivi des commandes :
                    //             $contenu .= '<div><h3>Voici les details de votre commande :</h3>';            
                    //                     $contenu .= '<p>Vous avez '. $commande['id_commande'] .' commande '.
                    //                      'Votre numéro membre est le N°'. $commande['id_membre'] .'
                    //                      Le montant de votre achat est de '. $commande['montant'] .'€
                    //                       La date de la commande est : '. $commande['date_enregistrement'] .'
                    //                       et l\'etat de votre commande est '. $commande['etat'] .'</p>';
                    //             $contenu .= '</div>';            
                    //         }
                    //            $contenu .= '<ul>';                    
                    //     }
                    //     else{
                    //         $contenu .= '<p>Vous n\'avez pas de commande</p>';                
                    //     }


        //-------------------- AFFICHAGE ---------------------- 

    require_once('inc/haut.inc.php');
    echo $contenu;
?>
<?php
    require_once('inc/bas.inc.php');
?>