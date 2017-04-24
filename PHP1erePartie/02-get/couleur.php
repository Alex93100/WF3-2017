<?php

    // Exercice:
    /*
    - Dans le fichier listeFruits.php : créer 3 liens banane, kiwi et cerise. Quand on clique sur le sliens, on passe le nom du fruit dans l'URL à la page couelur.php.

    - Dans couleur.php : vous récupérez le nom du fruit et affichez sa coueleur.

    Notez que vous ne passez pas la couleur dans l'URL mais vous la déduisez dans couleur.php.
    */ 

    if(isset($_GET['fruit'])){
        echo  'Fruit :' . $_GET['fruit'] . '<br>';
        if($_GET['fruit'] == 'banane'){
        // Si existent les indices, fruit, couleur et prix on peut les afficher :

            echo  'Couleur : jaune' . '<br>';

        }
        else if($_GET['fruit'] == 'kiwi'){
                echo  'Couleur : marron' . '<br>';
            

        }
        else if($_GET['fruit'] == 'cerise'){

                echo 'Couleur : rouge' . '<br>';

        }
        else{
                echo 'Ce fruit n\'existe pas';
        }
    }
    else{
        echo 'Aucun produit sélectionné';
    }
    

?>