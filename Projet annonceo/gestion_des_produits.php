<?php

    require_once('inc/init.inc.php');

    //----------------- AFFICHAGE ------------------





?>


<form method="post" action="">
    
    <label for="date_a">Date d'arrivée</label><br>


    <label for="date_d">Date de départ</label><br>
    

    <label for="date_d">Salle</label><br>
    <select name="salle" id="salle"><br>
        <?php 
        foreach ($categorie as $value) {
            echo '<p>'.$value['id_produit'].'</p>';
        } 
        ?>
    </select><br><br>

    <label for="tarif">Tarif</label><br>
    <input type="number" name="tarif" id="tarif" placeholder="prix en euro">

    <input type="submit" value="Enregistrer">

</form>