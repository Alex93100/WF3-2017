<?php
    $mysqli = new mysqli("localhost", "root", "", "repertoire");

    if(isset($_POST['inscription'])){
        echo '<pre>'; print_r($_POST); echo '</pre>';
        // echo '<pre>'; var_dump($_POST); echo '</pre>';
        foreach ($_POST as $indice => $value) {
            echo "$indice - $value<br>";
        }
        $date_de_naissance = $_POST['annee'] . " - " . $_POST['mois'] . " - " . $_POST['jour'];
    }

    echo '<br>';
?>

<!DOCTYPE html>
<html lang="en">
    <style>
        /*body{text-align:center;}*/
        label, select{width: 100px;}
        fieldset{width:220px;}
        .submit{clear:both;}
        .erreur{background: red;}
        .succes{background: green;}
    </style>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
    </head>

    <body>
        <form method="post" action="">
            <fieldset>
                <legend>Informations</legend>

                <label for="nom">Nom</label><br>
                <input type="text" id="nom" name="nom"><br>

                <label for="prenom">Prénom</label><br>
                <input type="text" id="prenom" name="prenom"><br>

                <label for="tel">Téléphone</label><br>
                <input type="number" id="tel" name="tel"><br>

                <label for="profession">Profession</label><br>
                <input type="number" id="profession" name="profession"><br>

                <label for="ville">Ville</label><br>
                <input type="text" id="ville" name="ville"><br>

                <label for="cp">Code postal</label><br>
                <input type="text" id="cp" name="cp"><br>

                <label for="adresse">Adresse</label><br>
                <textarea name="adresse" id="adresse"></textarea><br><br>

                <legend>Informations supplémentaires :</legend><br>

                <label>Date de naissance</label><br><br>
                <label for="jour">Jour</label>
                <select name="jour" id="jour">
                    <?php 
                        for($i = 1; $i <= 31; $i++){
                            if($i <= 9){
                                echo "<option>0$i</option>";
                            }
                            else{
                                echo "<option>$i</option>";                            
                            }
                        }
                    ?>
                </select><br>

                <label for="mois">Mois</label>
                <select name="mois" id="mois">
                   <option value="01">Janvier</option>
                   <option value="02">Fécrier</option>
                   <option value="03">Mars</option>
                   <option value="04">Avril</option>
                   <option value="05">Mai</option>
                   <option value="06">Juin</option>
                   <option value="07">Juillet</option>
                   <option value="08">Aout</option>
                   <option value="09">Septembre</option>
                   <option value="10">Octobre</option>
                   <option value="11">Novembre</option>
                   <option value="12">Décembre</option>
                </select><br>

                <label for="annee">Année</label>
                <select name="annee" id="annee">
                    <?php 
                        for($i = date("Y"); $i >= 1900; $i--){
                            echo "<option>$i</option>";
                        }
                    ?>
                </select><br>

                <label for="sexe">Sexe</label><br>
                <label for="sexe"> M:</label>
                <input type="radio" id="sexe" name="sexe" value = 'm' checked><br>
                <label for="sexe"> F:</label>
                <input type="radio" id="sexe" name="sexe" value = 'f'><br>

                <label for="description">Description</label><br>
                <textarea name="description" id="description"></textarea><br>

                <input type="submit" name="inscription" value="inscription">
            </fieldset>            
        </form>
    </body>
</html>