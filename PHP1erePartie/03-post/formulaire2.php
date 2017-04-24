<?php
    // Exercice : créer le formulaire indiqué au tableau, récupérer les données saisies et les afficher dans la même page.


    print_r($_POST);
        echo '<br>';
            if(! empty($_POST)){
                echo 'Ville : ' . $_POST['ville'] . '<br>';
                echo 'Code Postale : ' . $_POST['codepostale'] . '<br>';
                echo 'Adresse : ' . $_POST['adresse'] . '<br>';
            }


?>



<h1>Formulaire</h1>
<form method="post" action="">

    <label for="ville">Ville</label>
    <input type="text" id="ville" name="ville"><br>

    <label for="codepostale">Code postale</label>
    <input type="text" id="codepostale" name="codepostale"><br>

    <label for="adresse">Adresse</label>
    <textarea name="adresse" id="adresse"></textarea><br>

    <input type="submit" name="validation" value="envoyer">

</form>