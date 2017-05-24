<?php

    require_once('inc/init.inc.php');
    //--------------------------- TRAITEMENT --------------------------------

        // 1- Affichage des catégories de vêtements :
        $categories_des_salles = executeRequete("SELECT DISTINCT categories FROM salle");

        $contenu_gauche .= '<p class="lead">Vêtements</p>';
        $contenu_gauche .= '<div class="list-group">';
            $contenu_gauche .= '<a href="?categories=all" class="list-group-item">Toutes les catégories</a>';

            // Boucle while qui parcourt l'objet $categories_des_salles'
            while($cat = $categories_des_salles->fetch(PDO::FETCH_ASSOC)){
                $contenu_gauche .= '<a href="?categories='. $cat['categories'] .'" class="list-group-item">'. $cat['categories'] .'</a>';
            }
        $contenu_gauche .= '</div>';

        // 2-Affichage des salles selon la catégorie choisie :
        if(isset($_GET['categories']) && $_GET['categories'] != 'all'){
            // Si on choisi une catégorie autre que "all" :
            $donnees = executeRequete("SELECT * FROM salle WHERE categories = :categories",array(':categories' => $_GET['categories']));
        }
        else{
            // Sinon si on a demandé toutes les catégories :
            $donnees = executeRequete("SELECT * FROM salle"); // Pas de clause WHERE car on veut toutes les catégorie
        }

        while($salle = $donnees->fetch(PDO::FETCH_ASSOC)){
                $contenu_droite .= '<div = class="col-sm-4 col-lg-4 col-md-4">';
                    $contenu_droite .= '<div class="thumbnail">';
                        $contenu_droite .= '<a href="fiche_produit.php?id_salle='. $salle['id_salle'] .'"><img src="'. $salle['photo'] .'"width="130" height="100"></a>';

                        $contenu_droite .= '<div class="caption">';
                            $contenu_droite .= '<h4 class="pull-right">'. $salle['prix'] .' €</h4>';
                            $contenu_droite .= '<h4>'. $salle['titre'] .'</h4>';
                            $contenu_droite .= '<p>'. $salle['description'] .'</p>';
                        $contenu_droite .= '</div>';
                    $contenu_droite .= '</div>';                
                $contenu_droite .= '</div>';

            }


    //--------------------------- AFFICHAGE --------------------------------

    require_once('inc/header.inc.php');
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
    
    
    require_once('inc/footer.inc.php');

?>