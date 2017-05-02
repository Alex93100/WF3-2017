<?php

    require_once('../inc/init.inc.php');

    //--------------------------- TRAITEMENT ------------------------------

    // 1- Vérification ADMIN
        if(!internauteEstConnecteEtEstAdmin()){
            header('location:../connexion.php'); // Si membre pas ADMIN, alors on le redirige vers la page de connexion qui est à la racine du site (en dehors du dossier admin)
            exit();
        }

    // 4- Enregistrement du produit en BDD

        if($_POST){ // Equivalent à !empty($_POST) car si le $_POST est rempli, il vaut TRUE = formulaire posté

            // ici il faudrait mettre les contrôles sur le formulaire

            $photo_bdd=''; // La photo subit un traitement spécifique en BDD. Cette variable contiendra son chemin d'accès

            // 5- tratement de la photo :
            echo '<pre>'; print_r($_FILES) ; echo '</pre>';
            if(!empty($_FILES['photo']['name'])){ // Si une image a été uploadée, $_FILES est remplie

                // On constitue un nom unique pour le fichier photo :
                $nom_photo = $_POST['reference'] . '_' . $_FILES['photo']['name'];

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
            executeRequete("REPLACE INTO produit (id_produit, reference, categorie, titre, description, couleur, taille, public, photo, prix, stock)VALUES(:id_produit, :reference, :categorie, :titre, :description, :couleur, :taille, :public, :photo_bdd, :prix, :stock)", array('id_produit' => $_POST['id_produit'], 'reference' => $_POST['reference'], 'categorie' => $_POST['categorie'], 'titre' => $_POST['titre'], 'description' => $_POST['description'], 'couleur' => $_POST['couleur'], 'taille' => $_POST['taille'], 'public' => $_POST['public'], ':photo_bdd' => $photo_bdd, 'prix' => $_POST['prix'], 'stock' => $_POST['stock']));

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
?>

<h3>Formulaire d'ajout ou de modification d'un produit</h3>
<form method="post" enctype="multipart/form-data" action=""> <!-- "multipart/form-data" perùet d'uploader un fichier et de générer une superglobale $_FILES -->
    <input type="hidden" id="id_produit" name="id_produit" value="0"> <!-- champ caché qui récetionne l'id_produit nécessaire lors de la modification d'un produit existant -->
    
    <label for="reference">Référence</label><br>
    <input type="text" id="reference" name="reference" value=""><br><br>

    <label for="categorie">Catégorie</label><br>
    <input type="text" id="categorie" name="categorie" value=""><br><br>

    <label for="titre">Titre</label><br>
    <input type="text" id="titre" name="titre" value=""><br><br>

    <label for="description">Description</label><br>
    <textarea id="description" name="description" value=""></textarea><br><br>

    <label for="couleur">Couleur</label><br>
    <input type="text" id="couleur" name="couleur" value=""><br><br>

    <label>Taille</label><br>
    <select name="taille">
        <option value="S">S</option>
        <option value="M">M</option>
        <option value="L">L</option>
        <option value="XL">XL</option>
    </select><br><br>

    <label>Public</label><br>
    <input type="radio" name="public" value="m" checked>Homme
    <input type="radio" name="public" value="f">Femme
    <input type="radio" name="public" value="mixte">Mixte<br><br>

    <label for="photo">Photo</label><br><br>
    <input type="file" id="photo" name="photo"><br><br> <!-- Coupler avec l'attribut enctype="multipart/form-data" de la balise <form>, le type 'file' permet d'uploader un fichier (ici une photo) -->
    

    <label for="prix">Prix</label><br>
    <input type="text" id="prix" name="prix" value=""><br><br>

    <label for="stock">Stock</label><br>
    <input type="text" id="stock" name="stock" value=""><br><br>

    <input type="submit" value="valider" class="btn"><br><br>

</form>
<?php
        endif;



    require_once('../inc/bas.inc.php');


?>