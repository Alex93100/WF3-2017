<?php

    require_once('inc/init.inc.php');

    //--------------------------- TRAITEMENT ------------------------------
    
    // 1- Vérification ADMIN
        if(!internauteEstConnecteEtEstAdmin()){
            header('location:../connexion.php'); // Si membre pas ADMIN, alors on le redirige vers la page de connexion qui est à la racine du site (en dehors du dossier admin)
            exit();
        }

    // 7- Suppression d'un membre
        if(isset($_GET['action']) && $_GET['action'] == 'suppression' && isset($_GET['id_membre'])){
            $membre_a_supprimer = $resultat->fetch(PDO::FETCH_ASSOC); // pas de while car qu'un seul membre

            // Puis suppression du membre en BDD :
            executeRequete("DELETE FROM membre WHERE id_membre = :id_membre", array(':id_membre' => $_GET['id_membre']));
            $contenu .= '<div class="bg_success">Le membre a été supprimé !</div>';
            $_GET['action'] = 'affichage'; // Pour lancer l'affichage des membre dans le tableau HTML (point 6)
        }

    // 4- Enregistrement du produit en BDD

        if($_POST){ // Equivalent à !empty($_POST) car si le $_POST est rempli, il vaut TRUE = formulaire posté
   
            // 4- Suite de l'enregistrement en BDD :
            executeRequete("REPLACE INTO membre (id_membre, pseudo, mdp, prenom, nom, email, civilite)VALUES(:id_membre, :pseudo, :mdp, :prenom, :nom, :email, :civilite)", array('id_membre' => $_POST['id_membre'], 'pseudo' => $_POST['pseudo'], 'mdp' => $_POST['mdp'], 'prenom' => $_POST['prenom'], 'nom' => $_POST['nom'], 'email' => $_POST['email'], 'civilite' => $_POST['civilite']));

            $contenu .='<div class="bg-success">Le membre a été enregistré</div>';
            $_GET['action'] = 'affichage'; // On met la valeur 'affichage' dans $_GET['action'] pour affcher automatiquement la table HTML des produits plus loin dans le script (point 6)
        } 

    // 2- Les liens "affichage" et "ajout d'un produit" :

        $contenu .='<ul class="nav nav-tabs">
                        <li><a href="?action=affichage">Affichage du membres</a></li>
                        <li><a href="?action=ajout">Ajout d\'un membres</a></li>
                    </ul>';
  
    // 6- Affichage des produits dans le back-office :
        if(isset($_GET['action']) && $_GET['action'] == 'affichage' || !isset($_GET['action'])) {
            // Si $_GET contient affichage ou que l'on arrive sur l apage la 1ere fois ($_GET['action'] n'existe pas)
            $resultat = executeRequete("SELECT * FROM membre"); // On sélectionne tous les produits

            $contenu .= '<h3>Affichage des membres</h3>';
            $contenu .= '<p>Nombre de membre(s) inscrit :'. $resultat->rowCount() . '</p>';

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
                                        <a href="?action=modification&id_membre='. $ligne['id_membre'] .'">modifier</a> /
                                        <a href="?action=suppression&id_membre='. $ligne['id_membre'] .'"onclick="return(confirm(\'Etes-vous certain de vouloir supprimer ce membre ?\'));">supprimer</a>
                                    </td>';
                    $contenu .= '</tr>';
                }
            $contenu .= '</table>';
        }
    //--------------------------- AFFICHAGE ------------------------------

    require_once('inc/header.inc.php');
    echo $contenu;

    // 3- Formulaire  HTML

        if(isset($_GET['action']) && ($_GET['action'] == 'ajout' || $_GET['action'] == 'modification' )) :
        // Si on a demandé l'ajout d'un produit ou sa modification, on affiche le formulaire :

            // 8- Formulaire de modification avec présaisie des infos dans le formulaire :
            if(isset($_GET['id_membre'])){
                // Pour préremplir le formulaire, on requête en BDD les infos du membre passé dans l'URL:
                $resultat = executeRequete("SELECT * FROM membre WHERE id_membre = :id_membre", array(':id_membre' => $_GET['id_membre']));

                $membre_actuelle= $resultat->fetch(PDO::FETCH_ASSOC); // pas de while car un seul produit
            }
?>

<h3>Formulaire d'ajout ou de modification d'un membres</h3>
<form method="post" enctype="multipart/form-data" action=""> <!-- "multipart/form-data" permet d'uploader un fichier et de générer une superglobale $_FILES -->
    <input type="hidden" id="id_membre" name="id_membre" value="<?php echo $membre_actuelle['id_membre']?? 0;?>"> <!-- champ caché qui récetionne l'id_produit nécessaire lors de la modification d'un membre existant -->
    
    <label for="pseudo">Pseudo</label><br>
    <input type="text" id="pseudo" name="pseudo" value="<?php echo $membre_actuelle['pseudo']?? '';?>"><br><br>

    <label for="mdp">Mot de passe</label><br>
    <input type="text" id="mdp" name="mdp" value="<?php echo $membre_actuelle['mdp']?? '';?>"><br><br>

    <label for="nom">Nom</label><br>
    <input type="text" id="nom" name="nom" value="<?php echo $membre_actuelle['nom']?? '';?>"><br><br>

    <label for="prenom">Prénom</label><br>
    <input type="text" id="prenom" name="prenom" value="<?php echo $membre_actuelle['prenom']?? '';?>"><br><br>

    <label for="email">Email</label><br>
    <input type="text" id="email" name="email" value="<?php echo $membre_actuelle['email']?? '';?>"><br><br>

    <label>Civilité</label><br>
    <select name="civilite">
        <option value="m" selected>Homme</option>
        <option value="f" <?php if(isset($membre_actuelle['civilite'])&& $membre_actuelle['civilite'] == 'f') echo 'selected'; ?>>Femme</option>
    </select><br><br>

    <input type="submit" value="enregister" class="btn"><br><br>

</form>
<?php
        endif;

    require_once('inc/footer.inc.php');
?>