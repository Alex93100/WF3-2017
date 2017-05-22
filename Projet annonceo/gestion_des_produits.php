<?php

    require_once('inc/init.inc.php');
?>


<form method="post" action="">
    
    <label for="tarif">Tarif</label><br>
    <input type="date" name="date_a" id="date_a">

    <label for="tarif">Tarif</label><br>
    <input type="date" name="date_d" id="date_d">

    <select name="salle" id="salle"><br>
        <?php 
        foreach ($categorie as $value) {
            echo '<p>'.$value['id_produit'].'</p>'
        } 
        ?>
    </select><br><br>

    <label for="tarif">Tarif</label><br>
    <input type="number" name="tarif" id="tarif">

    <input type="submit" value="Enregistrer">

</form>