<?php

    require_once('../inc/init.inc.php');

    //--------------------------- TRAITEMENT ------------------------------

    // 1- Vérification ADMIN
        if(!internauteEstConnecteEtEstAdmin()){
            header('location:../connexion.php'); // Si membre pas ADMIN, alors on le redirige vers la page de connexion qui est à la racine du site (en dehors du dossier admin)
            exit();
        }

    // 7- Suppression d'un produit
        if(isset($_GET['action']) && $_GET['action'] == 'suppression' && isset($_GET['id_produit'])){
            // On sélectionne en base la photo pour pouvoir supprimer le fichier pjoto correspondant :
            $resultat = executeRequete("SELECT photo FROM produit WHERE id_produit = :id_produit", array(':id_produit' => $_GET['id_produit']));
            $produit_a_supprimer = $resultat->fetch(PDO::FETCH_ASSOC); // pas de while car qu'un seul produit
            $chemin_photo_a_supprimer = $_SERVER['DOCUMENT_ROOT'] . $produit_a_supprimer['photo']; //Chemin du fichier à supprimer
            if(!empty($produit_a_supprimer['photo']) && file_exists($chemin_photo_a_supprimer)){
                // si il y a un chemin de photo en base ET que le fichier existe, on peut le supprimer :
                unlink($chemin_photo_a_supprimer); // supprime le fichier spécifié
            }
            // Puis suppression du produit en BDD :
            executeRequete("DELETE FROM produit WHERE id_produit = :id_produit", array(':id_produit' => $_GET['id_produit']));
            $contenu .= '<div class="bg_success">Le produit a été supprimé !</div>';
            $_GET['action'] = 'affichage'; // Pour lancer l'affichage de sproduit dans le tableau HTML (point 6)
        }

    // 4- Enregistrement du produit en BDD

        if($_POST){ // Equivalent à !empty($_POST) car si le $_POST est rempli, il vaut TRUE = formulaire posté

            // ici il faudrait mettre les contrôles sur le formulaire

            $photo_bdd=''; // La photo subit un traitement spécifique en BDD. Cette variable contiendra son chemin d'accès

            // 9- modification de la photo (suite):

            if(isset($_GET['action'])&& $_GET['action'] == 'modification'){
                // si je suis en modification, je mets en base la photo du champ hidden photo actuelle du formulaire :
                $photo_bdd = $_POST['photo_actuelle'];
                // 

            }


            // 5- tratement de la photo :
            // echo '<pre>'; print_r($_FILES) ; echo '</pre>';
            if(!empty($_FILES['photo']['name'])){ // Si une image a été uploadée, $_FILES est remplie

                // On constitue un nom unique pour le fichier photo :
                $nom_photo = $_POST['id_salle'] . '_' . $_FILES['photo']['name'];

                // On constitue le chemin de la photo enregistré en BDD :
                $photo_bdd = RACINE_SITE . 'photo/' . $nom_photo; // On obtient ici le nom et le chemin de la photo depuis la racine du site

                // On constiute le chemin absolu complet de la photo depuis la racine serveur :
                $photo_dossier = $_SERVER['DOCUMENT_ROOT'] . $photo_bdd;

                // echo '<pre>'; print_r($photo_dossier) ; echo '</pre>';

                // Enregistrement du fichier photo sur le serveur :
                copy($_FILES['photo']['tmp_name'], $photo_dossier);
                // On copie le fichier temporaire de la photo stockée au chemin indiqué par $_FILES['photo']['tmp_name'] dans le chemin $photo_dossier de notre serveur
            }
   
            // 4- Suite de l'enregistrement en BDD :
            executeRequete("REPLACE INTO produit (id_produit, id_salle, date_arrivee, date_depart, prix, etat)VALUES(:id_produit, :id_salle, :date_arrivee, :date_depart, :prix, :etat)", array('id_produit' => $_POST['id_produit'], 'id_salle' => $_POST['id_salle'], 'date_arrivee' => $_POST['date_arrivee'], 'date_depart' => $_POST['date_depart'], 'prix' => $_POST['prix'], 'etat' => $_POST['etat']));

            $contenu .='<div class="bg-success">Le produit a été enregistré</div>';
            $_GET['action'] = 'affichage'; // On met la valeur 'affichage' dans $_GET['action'] pour affcher automatiquement la table HTML des produits plus loin dans le script (point 6)
        } 

    // 2- Les liens "affichage" et "ajout d'un produit" :

        $contenu .='<ul class="nav nav-tabs">
                        <li><a href="?action=affichage">Affichage du produits</a></li>
                        <li><a href="?action=ajout">Ajout d\'un produits</a></li>
                    </ul>';
  
    // 6- Affichage des produits dans le back-office :
        if(isset($_GET['action']) && $_GET['action'] == 'affichage' || !isset($_GET['action'])) {
            // Si $_GET contient affichage ou que l'on arrive sur l apage la 1ere fois ($_GET['action'] n'existe pas)
            $resultat = executeRequete("SELECT * FROM produit"); // On sélectionne tous les produits

            $contenu .= '<h3>Affichage des produits</h3>';
            $contenu .= '<p>Nombre de produit(s) dans la boutique :'. $resultat->rowCount() . '</p>';

            $contenu .= '<table class="table">';
                // La ligne des entêtes
                $contenu .= '<tr>';
                    for($i = 0; $i< $resultat->columnCount(); $i++){
                        $colonne = $resultat->getColumnMeta($i);
                        // echo '<pre>'; print_r($colonne) ; echo '</pre>';
                        $contenu .='<th>' . $colonne['name'] . '</th>'; // getColumnMeta() retourne un array cotenant notamment l'indice name contenant le nom de la colonne' 
                    }
                    $contenu .= '<th>Action</th>'; // On ajoute une colonne "Action"
                $contenu .= '</tr>';

                // Affichage des lignes :
                while($ligne = $resultat->fetch(PDO::FETCH_ASSOC)){
                    $contenu .= '<tr>';
                        // echo '<pre>'; print_r($ligne) ; echo '</pre>';                    
                        foreach($ligne as $index => $data){ // $index réceptionne les indices, $data les valeurs
                            if($index == 'photo'){
                                $contenu .= '<td><img src="' . $data . '" width="70" height="70"alt=""></td>';
                            }
                            else{
                                $contenu .= '<td>' . $data . '</td>';
                            }
                        }
                        $contenu .= '<td>
                                        <a href="?action=modification&id_produit='. $ligne['id_produit'] .'">modifier</a> /
                                        <a href="?action=suppression&id_produit='. $ligne['id_produit'] .'"onclick="return(confirm(\'Etes-vous certain de vouloir supprimer ce produit ?\'));">supprimer</a>
                                    </td>';
                    $contenu .= '</tr>';
                }
            $contenu .= '</table>';
        }
    //--------------------------- AFFICHAGE ------------------------------

    require_once('../inc/haut.inc.php');
    echo $contenu;

    // 3- Formulaire  HTML

        if(isset($_GET['action']) && ($_GET['action'] == 'ajout' || $_GET['action'] == 'modification')) :
        // Si on a demandé l'ajout d'un produit ou sa modification, on affiche le formulaire :

            // 8- Formulaire de modification avec présaisie des infos dans le formulaire :
            if(isset($_GET['id_produit'])){
                // Pour préremplir le formulaire, on requête en BDD les infos du produit passé dans l'URL:
                $resultat = executeRequete("SELECT * FROM produit WHERE id_produit = :id_produit", array(':id_produit' => $_GET['id_produit']));

                $produit_actuel= $resultat->fetch(PDO::FETCH_ASSOC); // pas de while car un seul produit
            }
?>

<h3>Formulaire d'ajout ou de modification d'un produit</h3>
<form method="post" enctype="multipart/form-data" action=""> <!-- "multipart/form-data" perùet d'uploader un fichier et de générer une superglobale $_FILES -->

    <label for="date_a">Date d'arrivée</label><br>


    <label for="date_d">Date de départ</label><br>
    
    <label for="salle">Salle</label><br>
    <select name="salle" id="salle"><br>
        <?php 
        foreach ($categorie as $value) {
            echo '<p>'.$value['id_produit'].'</p>';
        } 
        ?>
    </select><br><br>

    <label for="prix">Prix</label><br>
    <input type="text" id="prix" name="prix" value="<?php echo $produit_actuel['prix']?? 0;?>"><br><br>

    <input type="submit" value="enregistrer" class="btn"><br><br>

</form>

<?php
        endif;

    require_once('../inc/bas.inc.php');
?>