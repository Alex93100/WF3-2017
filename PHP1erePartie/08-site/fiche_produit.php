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
    }
    else{
        // Si l'indicce id_produit n'est pas dans l'URL
        header('location:boutique.php'); // On le redirige vers la boutique
        exit();
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