<?php

    require_once('../inc/init.inc.php');

    //--------------------------- TRAITEMENT ------------------------------

    // 1- Vérification ADMIN
        if(!internauteEstConnecteEtEstAdmin()){
            header('location:../connexion.php'); // Si membre pas ADMIN, alors on le redirige vers la page de connexion qui est à la racine du site (en dehors du dossier admin)
            exit();
        }

    // 2- Les liens "affichage" et "ajout d'un produit" :

        $contenu .='<ul class="nav nav-tabs">
                        <li><a href="?action=affichage">Affichage du produits</a></li>
                        <li><a href="?action=ajout">Ajout d\'un produits</a></li>
                    </ul>';










    //--------------------------- AFFICHAGE ------------------------------

    require_once('../inc/haut.inc.php');
    echo $contenu;

    // 3- Formulaire  HTML

        if(isset($_GET['action']) && ($_GET['action'] == 'ajout' || $_GET['action'] == 'modification')) :
        // Si on a demandé l'ajout d'un produit ou sa modification, on affiche le formulaire :
?>

<h3>Formulaire d'ajout ou de modification d'un rpoduit</h3>
<form method="post" enctype="multipart/form-data" action=""> <!-- "multipart/form-data" perùet d'uploader un fichier et de générer une superglobale $_FILES -->
    <input type="hidden" id="id_produit" name="id_produit" value="0">

</form>
<?php
        endif;



    require_once('../inc/bas.inc.php');


?>