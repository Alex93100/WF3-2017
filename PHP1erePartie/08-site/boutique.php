<?php

    require_once('inc/init.inc.php');
    //--------------------------- TRAITEMENT --------------------------------

        // 1- Affichage des catégories de vêtements :
        $categories_des_produits = executeRequete("SELECT DISTINCT categorie FROM produit");

        $contenu_gauche .= '<p class="lead">Vêtements</p>';
        $contenu_gauche .= '<div class="list-group">';
            $contenu_gauche .= '<a href="?categorie=all" class="list-group-item">Toutes les catégories</a>';

            // Boucle while qui parcourt l'objet $categorie_des_produits'
            while($cat = $categories_des_produits->fetch(PDO::FETCH_ASSOC)){
                $contenu_gauche .= '<a href="?categorie='. $cat['categorie'] .'" class="list-group-item">'. $cat['categorie'] .'</a>';
            }
        $contenu_gauche .= '</div>';

        // 2-Affichage des produits selon la catégorie choisie :
        if(isset($_GET['categorie']) && $_GET['categorie'] != 'all'){
            // Si on choisi une catégorie autre que "all" :
            $donnees = executeRequete("SELECT id_produit, reference, titre, photo, description FROM produit WHERE categorie = :categorie",array(':categorie' => $_GET['categorie']));
        }
        else{
            // Sinon si on a demandé toutes les catégories :
            $donnees = executeRequete("SELECT id_produit, reference, titre, photo, description FROM produit"); // Pas de clause WHERE car on veut toutes les catégorie
        }

        while($produit = $donnees->fetch(PDO::FETCH_ASSOC)){
                $contenu_droite .= '<div = class="col-sm-4 col-lg-4 col-md-4">';
                    $contenu_droite .= '<div class="thumbnail">';
                        $contenu_droite .= '<a href="fiche_produit.php?id_produit='. $produit['id_produit'] .'"><img src="'. $produit['photo'] .'"width="130" height="100"></a>';
                    $contenu_droite .= '</div>';                
                $contenu_droite .= '</div>';

            }















    //--------------------------- AFFICHAGE --------------------------------

    require_once('inc/haut.inc.php');
?>
    
    <div class="row">
        <div class="col-md-3">
            <?php echo $contenu_gauche; ?>
        </div>

        <div class="col-md-9">
            <div class="row">
                <?php echo $contenu_droite; ?>
            </div>
        </div>
    </div>
    
    
    
    
    
    
<?php
    
    
    require_once('inc/bas.inc.php');

?>