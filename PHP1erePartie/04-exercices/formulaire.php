<?php 

// Exercice :

/*
    1. Réaliser un formulaire permettant de sélectionner un fruit dans un sélecteur, et de saisir un poids quelconque exprimé en grammes.
    2. Faire le traitement du formulaire pour afficher le prix du fruit choisi selon le poids indiqué, en passant par la fonction calcul
    3. faire en sorte de garder le fruit choisi et le poids saisi dans les champs du formulaire après que celui-ci soit validé.
*/ 
    
    
    include('fonction.inc.php');
        if(isset($_POST['fruit'])){
                echo calcul($_POST['fruit'], $_POST['poids']) . '';
        }
        else{
                echo 'Aucun produit sélectionné';

        };

    




?>

<h1>Formulaire</h1>
<form method="post" action="formulaire.php">

    <label for="fruit">Fruit</label><br>
    <select name="fruit" id="fruit">

         <option value="NULL"<?php if (isset($_POST['fruit']) && $_POST['fruit'] == 'NULL') echo 'selected'; ?>> -- Selectionné -- </option>    

        <option value="bananes"<?php if (isset($_POST['fruit']) && $_POST['fruit'] == 'bananes') echo 'selected'; ?>>bananes</option>

        <option value="cerises"<?php if (isset($_POST['fruit']) && $_POST['fruit'] == 'cerises') echo 'selected'; ?>>cerises</option>

        <option value="peches"<?php if (isset($_POST['fruit']) && $_POST['fruit'] == 'peches') echo 'selected'; ?>>peches</option>

        <option value="pommes"<?php if (isset($_POST['fruit']) && $_POST['fruit'] == 'pommes') echo 'selected'; ?>>pommes</option>
    
    </select>

    <br>

    <label for="poidsgramme">Poids gramme</label><br>

    <input type="text" name="poids" placeholder="poids en grammes" value="<?php  echo $_POST['poids'] ?? ''; ?>"><br>

    <input type="submit" name="validation" value="envoyer">

</form>