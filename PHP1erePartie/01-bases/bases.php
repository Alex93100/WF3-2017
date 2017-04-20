<style>
    h2{
        font-size:1.5rem;
        color: red;
    }
</style>

<?php
    //------------------------------------
    echo '<h2> Les balises PHP </h2>';
    //------------------------------------  
?>

<?php
    // Pour ouvrir un passage en PHP, on utilise la balise précédente
    // Pour fermer un passage en PHP, on utilise la balise suivante :
?>

<strong>Bonjour</strong> <!-- En dehors des balise d'ouverture et de fermeture du PHP, nous pouvons écrire du HTML -->

<?php
        //------------------------------------
        echo '<h2> Ecriture et affichage </h2>';
        //------------------------------------  

        echo 'Bonjour'; // echo est une instruction qui nous permet d'effectuer un affichage. Notez que les instructions se terminent par un ";'

        echo '<br>'; // On peut mettre des balises HTML dans un echo, elle sont interprétées comme telles.

        print 'Nous sommes jeudi'; // print est une autres instruction d'affichage.

        // Pour info, il existe d'autres instructions d'affichage (cf plus loin) :
        // print_r();
        // var_dump();


        //------------------------------------
        echo '<h2> Variable : types / déclaration / affectation </h2>';
        //------------------------------------

        // Définition : une variable est un espace mémoire nommé qui permet de conserver une valeur.
        // En PHP, on déclare une variable avec le signe $

        $a = 127; // Je déclare la variable a, et je lui affecte la valeur 127
        // Le type de la variable a est integer (entier)
        
        $b = 1.5; // Un type double pour nombre à virgule

        $a = 'une chaîne de caractère'; // Type string pour une chaîne de caractères
        $b = '127'; // Il s'agit aussi d'un string car il y a des quotes


        $a = true; // Type boolean qui prend que 2 valeurs possibles : true ou false


        //------------------------------------
        echo '<h2> Concaténation </h2>';
        //------------------------------------

            $x = 'bonjour ';
            $y = 'tout le monde';

            echo $x . $y .'<br>'; // Point de concaténation que l'on peut traduire par 'suivi de'

            echo "$x $y <br>"; // On obtient le même résultat sans concaténation (cf chapitre d'après pour l'explication de l'évaluation des variables dans les guillemets)


            // **************************************************************************************************

            // Concaténation lors de l'affectation :
            
            $prenom1 = 'Bruno'; // Déclaration de la variable $prenom1
            $prenom1 = 'Claire'; // Ici la valeur "Claire" ecrase la valeur précédente "Bruno" qui était contenue dans la variable
            echo $prenom1 . '<br>'; // Affiche Claire

            $prenom2 = 'Bruno';
            $prenom2 .= 'Claire'; // On affecte la valeur "Claire" à la variable $prenom2 en l'ajoutant à la valeur précemment contenue dans la variable grâce à l'opérateur .=
            echo $prenom2 . '<br>'; // Affiche BrunoClaire


        //------------------------------------
        echo '<h2> Guillemets et quotes </h2>';
        //------------------------------------ 

            $message = "auujourd'hui"; // ou bien:
            $message = "auujourd\'hui"; // dans les quotes on échappe les apostrophes avec l'anti-slash

            $txt = 'Bonjour';
            echo "$txt tout le monde <br>"; // Les variables sont évaluées quand elles sont prészentres dans des guillemets, c'est leur contenue qui est affiché

            echo '$txt tout le monde <br>'; // Dans des quotes simples on affiche littéralement le nom des variable : elles ne sont pas évaluées


        //------------------------------------
        echo '<h2> Constantes </h2>';
        //------------------------------------ 

            // Une constante permet de conserver une valeur qui ne peut pas (ou ne doit pas) être modifiée durant la durée du script.
            // Très utile pour garder de manère certaine la connexion )à une BDD ou le chemin du site par exemple.

            define("CAPITALE", "Paris"); // Par convention on écrit toujours le nom des constantes en MAJUSCULES.
            // define() permet de déclarer une constante dont on indique d'abord le nom, puis la valeur

            echo CAPITALE . '<br>'; // Affiche Paris


            // Contantes magique :

            echo __FILE__ . '<br>'; // Affiche le chemin complet du fichier dans leque on est..
            echo __LINE__ . '<br>'; // Affiche la ligne à laquelle on est


        //------------------------------------
        echo '<h2> Opérateurs arithmétiques </h2>';
        //------------------------------------ 


            $a = 10;
            $b = 2;

            
            echo $a + $b; // Affiche 12
            echo $a - $b; // Affiche 8
            echo $a * $b; // Affiche 20
            echo $a / $b; // Affiche 5
            echo $a % $b; // Affiche 0 (= le reste de la division entière)


            // **************************************************************************************************
                
            // Opération et affectation combinées :
            
            $a += $b; // $a vaut 12 car équivaut à $a = $a + $b soit 10 + 2
            $a -= $b; // $a vaut 10 car équivaut à $a = $a - $b soit 12 - 2
            $a *= $b; // $a vaut 20 car équivaut à $a = $a * $b soit 10 * 2
            $a /= $b; // $a vaut 10 car équivaut à $a = $a / $b soit 20 / 2
            $a %= $b; // $a vaut 0 car équivaut à $a = $a % $b soit 10 % 2


            // **************************************************************************************************
            
            // Incrélenter et décrémenter :
            
            $i = 0;
            $i++; // Incrémentation de $i de +1 (vaut 1)
            $i--; // Décrémentation de $i de -1 (vaut 0)

            $k = ++$i; // La variable est incrémentée de 0, puis elle est affectée à $k
            echo $i . '<br>'; // 1
            echo $k . '<br>'; // 1

            $k = $i++; // La variable $i est d'abord affectée à $k puis incrémentée de 1
            echo $i . '<br>'; // 2
            echo $k . '<br>'; // 1


        //----------------------------------------------------------------------------
        echo '<h2> Structures conditionnelles et opérateurs de comparaison </h2>';
        //----------------------------------------------------------------------------

            $a = 10; $b = 5; $c = 2;

            if ($a > $b){ // Si la conditions renvoie true, on exécute les accolades qui suivent :
                echo '$a est bien supérieur à $b <br>';
            }
            else{ // Sinon (si la condition renvoie false) on exécute le else :
                echo 'Non, c\'est $b qui est supérieur à $a <br>';
            };


            // **************************************************************************************************
            

            if ($a > $b && $b > $c){ // && signifie ET
                echo 'Les 2 conditions sont vraies <br>';
            };


            // **************************************************************************************************
            

            if ($a == 9 || $b > $c){ // l'opérateur de comparaison est == et || signifie OU
                echo 'Ok pour une des deux conditions <br>';
            }
            else{
                echo 'Les deux conditions sont fausses';
            };


            // **************************************************************************************************
            

            if ($a == 8){
                echo 'Réponse 1 <br>';
            }
            else if( $a != 10){ // Sinon si $a différent de 10, on exécute les accolades qui suivent :
                echo 'Réponse 2 <br>';
            }
            else{ // Sinon, si les conditions précédetns sont fausse, on exécute les accolades qui suivent :
                echo 'Réponse 3 <br>';
            };

            // **************************************************************************************************
            
            if( $a == 10 XOR $b == 6) {
                echo ' ok pour la condition exclussive <br>'; 
                // si les 2 conditions sont vraies ou les 2 conditions sont fausses en même temps, nous n'entrons pas dans les accolades
            }

            // Pour que la condition s'exécute il faut que l'une soit vraie ou alors que l'autre soit vraie, mais pas les deux en même temps.


            // **************************************************************************************************


            // Conditions ternaires (forme contractée de la condition) :

                echo ($a == 10) ? '$a est égal à 10 <br>' : '$a est différent de 10 <br>';
                // Le ? remplace le if, et le : remplace le else. Si a vaut 10 on fait un echo du premier string, sinon du second.


            // **************************************************************************************************


            // Différence entre == et === :
            $vara = 1; // integer
            $varb = '1'; // string
            
            if($vara == $varb){}
                echo 'Il y a égalité entre les 2 variables';
            }
            if($vara == $varb){
                echo 'Il y a égalité en valeur ET en type entre les 2 variables';
            }



?>