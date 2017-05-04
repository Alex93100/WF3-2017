<?php
    require_once('inc/init.inc.php');
    //--------------------------- TRAITEMENT --------------------------------

        // 2- Ajouter un produit au panier :

        // echo '<pre>'; print_r($_POST) ;echo'</pre>';
        if(isset($_POST['ajout_panier'])){
            // Si on a cliqué sur "ajouter au panier", alors on sélectionne en base les infos du produit ajouté(en particulier le titre et le prix) :
            $resultat = executeRequete("SELECT id_produit, titre, prix FROM produit WHERE id_produit = :id_produit", array(':id_produit' => $_POST['id_produit']));
            // l'id du produit est donnée par le formulaire d'ajout au panier
            
            $produit = $resultat->fetch(PDO::FETCH_ASSOC);
            //  pas de while car qu'un seul produit (on passe par l'id)

            ajouterProduitDansPanier($produit['titre'], $_POST['id_produit'], $_POST['quantite'], $produit['prix']);
            
            //On redirige vers la fiche produit en indiquant que le produit a bien été ajouté au panier :
            header('location:fiche_produit.php?statut_produit=ajoute&id_produit='.$_POST['id_produit']);
            exit();            
        }


        // 3- vider le panier :
            if(isset($_GET['action'])&& $_GET['action'] == 'vider'){
                // Si il y a l'indice 'action' dans l'URL et qu'il vaut 'vider' :
                unset($_SESSION['panier']); // unset spprime un array ou une variable
            }

        // 4- Supprimer un article du panier :
            if(isset($_GET['action']) && $_GET['action'] == 'supprimer_article' && isset($_GET['articleASupprimer'])){
                retirerProduitDuPanier($_GET['articleASupprimer']); // On passe à la fonction retirerProduitDuPanier l'id du produit à retirer
            }

        // 5- Validation du panier :
        if(isset($_POST['valider'])){
            $id_membre = $_SESSION['membre']['id_membre'];
            $montant_total = montantTotal();

            // Le panier étant validé, on inscrit la commande en BDD
            executeRequete("INSERT INTO commande (id_membre, montant, date_enregistrement) VALUES(:id_membre, :montant, NOW())", array(':id_membre'=> $id_membre, ':montant'=>$montant_total));

            // On récupère l'id_commande de la commande insérée ci-dessus, pour l'utiliser en clé étrangère dans la table details_commande :
            $id_commande = $pdo->lastInsertId();
            
            // Mise à jour de la table details_commande :
            for($i = 0; $i < count($_SESSION['panier']['id_produit']); $i++){
                // On parcout le panier pour enregistrer chaque produit :
                $id_produit = $_SESSION['panier']['id_produit'][$i];
                $quantite = $_SESSION['panier']['quantite'][$i];
                $prix = $_SESSION['panier']['prix'][$i];

                executeRequete("INSERT INTO details_commande(id_commande, id_produit, quantite, prix)VALUES(:id_commande, :id_produit, :quantite, :prix)",array(':id_commande'=> $id_commande, ':id_produit'=>$id_produit, ':quantite'=>$quantite, ':prix'=>$prix));
                
                // Décrémentation du stock du produit :
                executeRequete("UPDATE produit SET stock = stock - :quantite WHERE id_produit = :id_produit", array (':quantite' => $quantite, ':id_produit' => $id_produit));
            }

            unset($_SESSION['panier']); // On supprime le panier validé
            $contenu .= '<div class="bg-success">Merci pour votre commande, le numéro de suivi est le '. $id_commande .'</div>';
        }


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
                            <a href="?action=supprimer_article&articleASupprimer='. $_SESSION['panier']['id_produit'][$i] .'">Supprimer article</a>
                         </td>';
                echo'</tr>';
            }
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
            
        echo '</table>';
    }// fin de else

    require_once('inc/bas.inc.php');
?>