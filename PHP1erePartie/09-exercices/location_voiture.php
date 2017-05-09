<?php
/*
   1- Vous créez un formulaire avec un menu déroulant avec les catégories A,B,C et D de véhicules de location et un champ nombre de jours de location. Lorsque le formulaire est soumis, vous affichez "La location de votre véhicule sera de X euros pour Y jour(s)." sous le formulaire.

   2- Vous validez le formulaire : la catégorie doit être correcte et le nombre de jours un entier positif.

   3- Vous créez une fonction prixLoc qui retourne le prix total de la location en fonction du prix de la catégorie choisie (A : 30€, B : 50€, C : 70€, D : 90€) multiplié par le nombre de jours de location. 

   4- Si le prix de la location est supérieur à 150€, vous consentez une remise de 10%.

*/

?>


<?php
            $message = '';

            function prixLoc($njl, $categorie){
                
                    switch($categorie){
                        case 'A' : $categorie = 30; break;
                        case 'B' : $categorie = 50; break;
                        case 'C' : $categorie = 70; break;
                        case 'D' : $categorie = 90; break;
                        default : echo 'Vous n\'avez pas selectionné de catégorie <br>';
                    }
                
                    $resultat = $njl * $categorie;
                

                    if ($resultat >= 150){
                    return $resultat - ($resultat * 0.1);
                    }
                    else{
                        return $resultat;
                    }
                }

                // Contrôles du formulaire :

                    if(!empty($_POST)){ 

                        if(!(ctype_digit($_POST['njl']))){ 
                            $message .= '<article>Le nbr de jour n\'est pas correcte</article>'; 
                        }
            
                        if($_POST['type_vehicules'] != 'A' && $_POST['type_vehicules'] != 'B' && $_POST['type_vehicules'] != 'C' && $_POST['type_vehicules'] != 'D'){
                            $message .= '<article>La catégorie n\'est pas correcte</article>';
                        } 
                    }

                    if(empty($message)){
                        
                        foreach($_POST as $indice => $valeur){
                            $_POST[$indice] = htmlspecialchars($valeur, ENT_QUOTES); // IMPORTANT !!!
                        }

                        $message .= 'Vous avez choisis la classe '.$_POST['type_vehicules']. ' qui coute' .$_POST['njl'] . 'le prix sera donc de : ' . prixLoc($_POST['njl'], $_POST['type_vehicules']). '€' ;
                    
                    }


?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
    </head>
    <body>
        <?php
            echo $message;
         ?>
        <header></header>
        <main>
        
            <form method="post" action="">
                <p>Catégorie véhicule :</p>
                <select name="type_vehicules" id="type_vehicules">
                    <option value="A">A</option>
                    <option value="B">B</option>
                    <option value="C">C</option>
                    <option value="D">D</option>
                </select><br><br>

                <label for="njl">Nbr Jour de Location :</label><br><br>
                <input type="number" id="njl" name="njl"><br><br>

                <input type="submit" name="inscription" value="Envoi"><br><br>
        
            </form>
        </main>
        <footer></footer>
    </body>
</html>

