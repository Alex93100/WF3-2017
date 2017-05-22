<?php

    // require_once('inc/init.inc.php');
?>


<form method="post" action="">
    
    <label for="tarif">Tarif</label><br>
    <div class="input-group date" data-provide="datepicker">
        <input type="text" class="form-control">
        <div class="input-group-addon">
            <span class="glyphicon glyphicon-th"></span>
        </div>
    </div>

    <label for="tarif">Tarif</label><br>
    <div class="input-group date" data-provide="datepicker">
        <input type="text" class="form-control">
        <div class="input-group-addon">
            <span class="glyphicon glyphicon-th"></span>
        </div>
    </div>

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