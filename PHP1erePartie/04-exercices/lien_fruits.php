<?php

// Exercice :

/*
   - Faire 4 liens HTML avec le nom des fruits.
   - Quand on clique sur un lien, on affiche le prix pour 1000g de ce fruit, dans cette page lien_fruit.php.
*/ 
        include('fonction.inc.php');
        if(isset($_GET['fruit'])){
                echo calcul($_GET['fruit'] , 1000);
        }
        else{
                echo 'Aucun produit sélectionné';

        };


?>



<h1>Nos fruits :</h1>

<a href="lien_fruits.php?fruit=bananes">Banane</a>
<br>
<a href="lien_fruits.php?fruit=pommes">Pomme</a>
<br>
<a href="lien_fruits.php?fruit=cerises">Cerise</a>
<br>
<a href="lien_fruits.php?fruit=peches">Peche</a>
