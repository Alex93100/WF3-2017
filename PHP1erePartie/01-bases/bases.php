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
            
            if($vara == $varb){
                echo 'Il y a égalité entre les 2 variables <br>';
            };

            if($vara === $varb){
                echo 'Il y a égalité en valeur ET en type entre les 2 variables <br>';
            }; 
            // Avec la présence du triple =, la comparaison ne fonctionne pas car les variavles ne sont pas du même type : ici on compare un integer avec un string.
            // Avec le double égal, on ne compare que la valeur : ic la comparaison est donc juste.

            /*

            =       signe d'affectation
            ==      comparaison en valeur
            ===     comparaison en valeur et en type
            
            */ 

            // **************************************************************************************************
            // empty() et isset() :
            // empty() : teste si c'est vide (cad 0, '', NULL, false ou non défini)
            // isset() : teste si c'est défini et a une valeur non NULL

            $var1 = 0;
            $var2 = ''; // Chaîne vide sans espace

            if(empty($var1)) echo 'on a 0, vide, ou non définie <br>';
            if(isset($var2)) echo 'var2 existe bien <br>';

            // différence entre empty et isset :  si on met les ligne 252 et 253 en commmentaire (pour les neutraliser).
            // empty reste vrai car $var1 n'est pas définie, alors que isset est faux car $var2 n'est pas définie.
            
            // empty sera utilisé pour vérifier, par exemple, que les champs d'un formulaire sont remplis.
            // isset permettra par exemple de vérifier l'existence d'un indice dans un array avant de l'utiliser. 

            // phpinfo();

            // ********************************************************************************************

            // Entrer une valeur dans une variable sous condition (PHP7) :
            $var1 = isset ($maVar) ? $maVar : 'valeur par défaut'; // dans cette ternaire, on affecte la valeur de $maVar à $var1 si elle existe. Celle-ci n'existant pas, on lui affecte 'valeur par défaut'
            echo $var1 . '<br>'; // Affiche 'valeur par défaut'

            // En version PHP7 :
            $var2 = $maVar ?? 'valeur par défaut'; // On fait exactement la même chose mais en plus court : le "??" signifie "soit l'un soit l'autre", "prend la première valeur qui existe"
            echo $var2 . '<br>';


        //--------------------------------------
        echo '<h2> Condition switch </h2>';
        //--------------------------------------

            // Dans le switch ci-dessous, les "case" représentent les cas différents dans lesquels on peut potentiellement tomber.
            $couleur = 'jaune';

            switch($couleur){
                case 'bleu' : echo 'vous aimez le bleu'; break;
                case 'rouge' : echo 'vous aimez le rouge'; break;
                case 'vert' : echo 'vous aimez le vert'; break;
                default : echo 'Vous n\'aimez ni le bleu, ni le rouge, ni le vert <br>';
            };

            // Le switch compare la valeur de la variable entre parenthèses à chaque case.
            // Lorsqu'une valeur correspond, on exxécute l'instruction en regard du case, puis le break qui indique qu'il faut sortir de la condition.
            // Le default correspond à un else : on l'exécute par défaut quand aucun case ne correspond.

            if ($couleur == 'bleu'){
                echo 'vous aimez le bleu';
            }
            else if ($couleur == 'rouge'){
                echo 'vous aimez le rouge';
            }
            else if ($couleur == 'vert'){
                echo 'vous aimez le vert';
            }
            else{
                echo 'Vous n\'aimez ni le bleu, ni le rouge, ni le vert <br>';
            };


        //--------------------------------------
        echo '<h2> Fonctions prédéfinies </h2>';
        //--------------------------------------
            // Une fonction prédéfinie permet de réaliser un traitement spécifique qui est prévu dans le langage.

            echo '<h2>Traitement des chaînes de caractères (strlen, strpos, substr)</h2>';
            $email1 = 'prenom@site.fr';

            echo strpos($email1, '@') . '<br>'; // strpos() indique la position 6 du caractère "@" dans la chaîne $email1
            echo strpos('Bonjour', '@');
            var_dump(strpos('Bonjour', '@'));
            // Quand j'utilise une fonction prédéfinie, il faut se demander quels sont les argument a lui furnir pour qu'elle s'exécute normalement, et ce qu'elle peut retourner comme résultat.
            // Dans l'exemple de strpos() : succès => integer, échec => bolléen false
            
            // **************************************************************************************************
            
            $phrase = 'Mettez une phrase à cet endroit';
            echo '<br>' . strlen($phrase) . '<br>'; // Affiche la longueur du string : succès => integer, échec => false

            $texte = 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsam odit repellendus molestiae quae suscipit provident, dolor repudiandae, asperiores atque! Voluptatum possimus temporibus vero impedit nostrum aspernatur magnam, illo neque blanditiis.';

            echo substr($texte, 0, 20) . '...<a href="">Lire la suite</a><br>';
            // On découpe une partie du texte et on lui concatène un lien. Succès => string, échec => false.

            // **************************************************************************************************

            echo str_replace('site', 'gamil', $email1) . '<br>'; // Remplace 'site' par 'gmail' dans le string contenu dans $email1           

            // **************************************************************************************************
            
            $message = '             Hello world               ';
            echo strtolower($message) . '<br>'; // passe le string en minuscules
            echo strtoupper($message) . '<br>'; // passe le string en majuscules

            echo strlen($message) . '<br>';
            echo strlen(trim($message)) . '<br>'; // trim() permet de supprimer les esapce au début et à la fin d'un string


        //--------------------------------------
        echo '<h2> PHP Manuel </h2>';
        //--------------------------------------
            // Le manuel PHP en ligne :
            // http://php.net/manual/fr/
        //--------------------------------------
        echo '<h2> Gestion des dates </h2>';
        //--------------------------------------

            echo date('d/m/Y H:i:s') . '<br>'; 
            // Affiche la date et heure de l'instant selon le format indiqué : d = day m = month, Y = year sur 4 chiffres, y = year sur 2 chiffre, H = heures sur 24h, i = minutes, s= seconds
            // On peut choisir les séparateurs

            echo time() . '<br>'; // Retourne le timestamp actuel = nombre de secondes écoulées depuis le 01/01/1970 à 00:00:00 (création théorique de UNIX).

            // La fonction prédéfinie strtotime() :
            $dateJour = strtotime('10-01-2016'); // retourne le timestamp de la date indiquée

            echo $dateJour . '<br>';

            // La fonction strftime() :
            $dateFormat = strftime('%Y-%m-%d', $dateJour); // transforme le timestamp donnée en date selon le format indiqué, ici YYYY-MM-DD
            echo $dateFormat . '<br>'; // Affiche 2016-01-10

            // Exemple de conversion de format de date :
            // Transformer 23-05-2105 en 2015-05-23

            echo strftime ('%Y-%m-%d', strtotime ('23-05-2015'));
            echo '<br>';
            echo strftime ('%d-%m-%Y', strtotime ('2015-05-23')) . '<br>';


            // Cette méthode de transformation est limitée dans le temps (2038)... On peut donc utiliser une aure méthode avec la classe DateTime :
            $date = new DateTime('11-04-2017');
            echo $date->format('Y-m-d');
            
            // DateTime est une classe que l'on peut comparer à un plan ou un modèle qui  sert à construire des objet "date".
            // On construit un objet "date" avec le mot new, en indiquant la date qui nous intéresse entre parenthèses. $date est donc un objet date.
            // Cet objet bénéficie de méthode (= fonction) offertes par la classe : il y a entre autres, la méthode format() qui permet de modifier le format d'une date.
            //  Pour appeler cette méthode sur l'objet $date, on utilise la flèche "->".




?>