<?php 

// Exercice :

/*
    1. Réaliser un formulaire permettant de sélectionner un fruit dans un sélecteur, et de saisir un poids quelconque exprimé en grammes.
    2. Faire le traitement du formulaire pour afficher le prix du fruit choisi selon le poids indiqué, en passant par la fonction calcul
    3. faire en sorte de garder le fruit choisi et le poids saisi dans les champs du formulaire après que celui-ci soit validé.
*/ 
    
    
    include('fonction.inc.php');
        if(isset($_POST['fruit'])){
                echo calcul($_POST['fruit'], $_POST['poidsgramme'] );
        }
        else{
                echo 'Aucun produit sélectionné';

        };

    




?>

<h1>Formulaire</h1>
<form method="post" action="formulaire.php">

    <label for="fruit">Fruit</label><br>
    <select name="fruit" id="fruit">
        <option value="NULL">-- Selectionné --</option>    
        <option value="bananes">bananes</option>
        <option value="cerises">cerises</option>
        <option value="peches">peches</option>
        <option value="pommes">pommes</option>
    
    </select>
    <br>
    <label for="poidsgramme">Poids gramme</label><br>
    <input type="number" name="poidsgramme" id="poidsgramme"></textarea><br>

    <input type="submit" name="validation" value="envoyer">

</form>