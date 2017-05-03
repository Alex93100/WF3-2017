<?php
    require_once('inc/init.inc.php');
    //--------------------------- TRAITEMENT --------------------------------
    //--------------------------- AFFICHAGE --------------------------------


    require_once('inc/haut.inc.php');
    echo $contenu;
    echo'<h2>Voici votre panier</h2>';
    if(empty($_SESSION['panier']['id_produit'])){
        // Si panier est vide :
        echo '<p>Votre panier est vide</p>';
    }
    else{
        echo '<table class="table">';
            echo'<tr class="info">
                    <th>Titre</th>
                    <th>N° du produit</th>
                    <th>Quantité</th>
                    <th>Prix unitaire</th>
                    <th>Action</th>                    
                </tr>';
            // On parcourt l'array $_SESSION['panier'] pour afficher les produits qui s'y trouvent :
            for($i = 0; $i < count($_SESSION['panier']['id_produit']); $i++){
                echo '<tr>';
                    echo '<td>'. $_SESSION['panier']['titre'][$i] .'</td>';
                    echo '<td>'. $_SESSION['panier']['id_produit'][$i] .'</td>';
                    echo '<td>'. $_SESSION['panier']['quantite'][$i] .'</td>';
                    echo '<td>'. $_SESSION['panier']['prix'][$i] .'</td>';
                    echo '<td>
                            <a href="?action=supprimer_article&articleASupprimer='. $_SESSION['pannier']['id_produit'][$i] .'">Supprimer article</a>
                         </td>';
                echo'</tr>';
                echo'<tr class="info">
                        <th colspan="3">Total</th>
                        <th colspan="2">'. montantTotal() .' €</th>
                    </tr>'; // La fonction utilisateur montantTotal() est déclarée dans fonction.inc.php et retourne le total du panier
                
                // Si le membre est connecté, on affiche le formulaire de validation du panier :
                if(internauteEstConnecte()){
                    echo '<form method="post" action="">
                            <tr class="text-center">
                                <td colspan="5">
                                    <input type="submit" name="valider" value="Valider le panier">
                                </td>
                            </tr>
                        </form>';
                }
                else{
                    // Membre non connecté, on l'invite à s'inscrire ou à ce connecter
                    echo'<tr class="text-center">
                            <td colspan="5">
                                Veuillez vous <a href="inscription.php">inscrire</a> ou vous <a href="connexion.php">connecter</a> afin de pouvoir valider le panier
                            </td>
                        </tr>';
                }
                echo'<tr class="text-center">
                        <td colspan="5">
                            <a href="?action=vider">Vider le panier</a>
                        </td>
                    </tr>';
            }
        echo '</table>';
    }// fin de else

    require_once('inc/bas.inc.php');
?>