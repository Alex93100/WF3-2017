<?php
    require_once('inc/init.inc.php');

    //--------------------------- TRAITEMENT --------------------------------

    $aside='';

    // 1- Contrôle de l'existence du produit demandé :

    if (isset($_GET['id_produit'])){ // Si existe l'indicee id-produit dans l'URL
        // On requête en base le produit demandé pour vérifier son existence :
        $resultat = executeRequete("SELECT * FROM produit WHERE id_produit = :id_produit", array(':id_produit'=> $_GET['id_produit']));
        
        if($resultat->rowCount() <= 0){
            header('location:boutique.php'); // Si il n'y a pas de résultat dans la requete, c'est que le produit n'existe pas: on oriente alors vers la boutique
            exit();
        }

        // 2- Affichage du détail du produit:
        $produit = $resultat->fetch(PDO::FETCH_ASSOC); // Pas de while car qu'un seul produit

        $contenu .= '<div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">'. $produit['titre'] .'</h1>
                        </div>
                    </div>';

        $contenu .= '<div class="col-md-8">
                        <img class="img-responsive" src="'. $produit['photo'] .'" alt="">
                    </div>';

        $contenu .= '<div class="col-md-4">
                        <h3>Description</h3>
                        <p>'. $produit['description'] .'</p>

                        <h3>Détails</h3>
                        <ul>
                            <li>Catégorie :'. $produit['categorie'] .' </li>
                            <li>Couleur :'. $produit['couleur'] .' </li>
                            <li>Taille :'. $produit['taille'] .' </li>
                        </ul>

                        <p class="lead">Prix :'. $produit['prix'] .' €</p>
                    </div>';

        // 3- Affichage du formulaire d'ajout au panier si stock > 0 :
        $contenu .= '<div class"col-md-4">';
            if($produit['stock'] > 0){
                // Si il y a du stock, on met le bouton d'ajout au panier
                $contenu .='<form method="post" action="panier.php">
                                <input type="hidden" name="id_produit" value="'. $produit['id_produit'] .'">
                                <select name="quantite" id="quantite" class="form-group-sm form-control-static">';
                                for($i = 1; $i <= $produit['stock'] && $i <= 5; $i++){
                                    $contenu .= "<option>$i</option>";
                                }
                                $contenu .='</select>
                                <input type="submit" name="ajout_panier" value="Ajouter au panier" class="btn">
                            </form>';
            }
            else{
                $contenu .= '<p>Rupture de stock</p>';
            }

            // 4- Lien retour vers la boutique :
            $contenu .= '<p><a href="boutique.php?categorie='. $produit['categorie'] .'">Retour vers votre sélection</a></p>';
        $contenu .= '</div>';
    
    
    
    
    
    }
    else{
        // Si l'indicce id_produit n'est pas dans l'URL
        header('location:boutique.php'); // On le redirige vers la boutique
        exit();
    }

    // ------------------------
    // Exercice
    // ------------------------

    /*
    
    Vous allez créer des suggestions de produits : affichez 2 produits (photo et titre) aléatoirement appartenant à la catégorie  du produit affiché dans la page détail.
    Ces produits doivent être différents du produit affiché. La photo est cliquable et amène à la fiche produit.

    Utilisez la variable $aside pour afficher le contenu.
    
    */

    // $requete = executeRequete("SELECT id_produit, photo, titre FROM produit WHERE id_produit <> :id_produit AND categorie = :categorie ORDER BY RAND() LIMIT 2", array('id_produit' => $produit['id_produit'], 'categorie' => $produit['categorie']));       
    //     while ($prod = $requete->fetch(PDO::FETCH_ASSOC)) {
    //             $aside .= '<p>'. $prod['titre'] .'</p>';
    //             $aside .= '<a href="?id_produit='. $prod['id_produit'].'"><img src="'. $prod['photo'] .'" alt=""></a>';
    //         }

    $suggestion = executeRequete("SELECT id_produit, photo, titre FROM produit WHERE categorie = '$produit[categorie]' AND id_produit != '$_GET[id_produit]' ORDER BY RAND() LIMIT 2");       
        while ($prod = $suggestion->fetch(PDO::FETCH_ASSOC)) {
            $aside .= '<p>'. $prod['titre'] .'</p>';
            $aside .= '<a href="?id_produit='. $prod['id_produit'].'"><img src="'. $prod['photo'] .'" alt=""></a>';
        }



    //--------------------------- AFFICHAGE --------------------------------
    require_once('inc/haut.inc.php');
    echo $contenu_gauche; // recevra le pop up de confirmation d'ajout au panier'
?>

<!-- HTML -->
    <div class="row">
        <?php echo $contenu; // Affiche le détail d'un produit ?>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header">Suggestions de produits</h3>
        </div>
        <?php echo $aside; // Affiche les produits suggérés ?>
    </div>

<?php
    require_once('inc/bas.inc.php');
?>