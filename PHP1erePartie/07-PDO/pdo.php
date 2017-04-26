<?php

    // *********************************
    // PDO
    // *********************************
        
        // L'extension PHP Data Objects (PDO) définit une interface pour accéder à une base de données depuis PHP.

        // ******************************
        // 1. Connexion
        // ******************************

            echo '<h1> 1. Connexion </h1>';

            $pdo = new PDO('mysql:host=localhost;dbname=entreprise', 'root', '', array(PDO:: ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));

            // $pdo est un objet issu de la classe prédéfinie PDO : il représente la connexion à la BDD.

            /* Les arguments passés à PDO :
                - driver + serveur + nom de la base de données
                - pseudo du SGBD
                - mdp du SGBD
                - options : option 1 pour générer l'affichage des erreurs, option 2 = commande à exécuter lors de la connexion au serveur qui défint le jeu de caractères des échanges avec la BDD.
            */

            print_r($pdo);

            echo '<pre>'; print_r(get_class_methods($pdo)); '</pre>'; // permet d'afficher les méthodes disponibles dans l'objet $pdo

        // ******************************
        // 2. exec() avec INSERT, UPDATE et DELETE
        // ******************************
            echo '<h1> 2. exec() avec INSERT, UPDATE et DELETE </h1>';
            // $resultat = $pdo->exec("INSERT INTO employes(prenom, nom, sexe, service, date_embauche, salaire)VALUES('Jean', 'Tartempion', 'm', 'informatique', '2017-04-25', 300)");

            /*
                exec() est utilisé pour formuler des requetes ne retournant pas de jeu de rrésultats : INSERT, UPDATE et DELETE

                Valeur de retour :
                Succès : un integer correspondant au nombre de ligne affetcées
                Echec : false
            
            */ 
            
            // echo "Nombre d'enregistrements affectés par l'INSERT : $resultat <br>";
            echo 'Dernier id généré : ' . $pdo->lastInsertId() . '<br>';
        
            // -----------------

            $resultat = $pdo->exec("UPDATE employes SET salaire = 6000 WHERE id_employes = 350");
            echo "Nombre d'enregistrements affectés par l'UPDATE : $resultat <br>";
            

        // ******************************
        // 3. query() avec SELECT + fetch
        // ******************************

            echo '<h1>3. query() avec SELECT + fetch</h1>';

            $result = $pdo->query("SELECT * FROM employes WHERE prenom = 'daniel'");
            //  avec query : $resultest un objet issu de la classe prédéfinie PDOStatement

            /*
                Au contraire d'exec(), query() est utilisé pour la formulation de requêtes retourant un ou plusieurs résultats : SELECT.

                Valeur de retour : 
                    Succès : Objet PDOStatement
                    Echec : false

                Notez qu'avec query, on peut aussi utiliser INSERT, DELETE et UPDATE.

            */ 

            echo '<pre>'; print_r($result); '</pre>'; 
            echo '<pre>'; print_r(get_class_methods($result)); '</pre>'; // On voit les nouvelle méthodes de la classe PDOStatement

            // $result constitue le résultat de la requête sous forme inexploitable directement : il faut donc le transformer par la methode fetch() :

            $employe = $result->fetch(PDO::FETCH_ASSOC); 
            // La méthode fetch() avec le paramètre PDO::FETCH)_ASSOC permetde transformer l'objet $result en un ARRAY associatif exploitable indexéé avec le nom ces champs de la requête.

            echo '<pre>'; print_r($employe);echo '</pre>';
            echo "Bonjour, je suis $employe[prenom] $employe[nom] du service $employe[service] <br>";

            // Ou encore faire un fetch selon l'une des méthodes suivantes :

            $result = $pdo->query("SELECT * FROM employes WHERE prenom = 'daniel'");
            $employe = $result->fetch(PDO::FETCH_NUM); // Pour obtenir un array indexé numériquement
            echo '<pre>'; print_r($employe); '</pre>'; 
            echo $employe[1]; // On accède au prénom par l'indice 1 de l'array $employe.


            // -------------------

            $result = $pdo->query("SELECT * FROM employes WHERE prenom = 'daniel'");
            $employe = $result->fetch(); // Pour un mélange de fetch_assoc et fetch_num
            echo '<pre>'; print_r($employe); '</pre>'; 

            // -------------------

            $result = $pdo->query("SELECT * FROM employes WHERE prenom = 'daniel'");
            $employe = $result->fetch(PDO::FETCH_OBJ); // Retourne un nouvel objet avec le nom de champs comme propriété (= attribut) public.
            echo '<pre>'; print_r($employe); '</pre>'; 
            echo $employe->prenom; // Affiche la valeur de la propritété prenom de l'objet $employe

            // Attention : il faut choisir l'un des fetch que vous voulez exécuter sur un jeu de resultat, vous ne pouvez pas faire plusieur fetch sur le meme resultat n'en contenant qu'une seule.
            // En effet cette méthode déplace un curseur de lecture sur le resultat suivant contenu dans le jeu résultats : ainsi quand il n'y en a qu'un seul, on sort du jeu du jeu.
            
            // Exercice : afficher le service de l'employé Laura selon 2 méthode différentes de votre choix



            $result = $pdo->query("SELECT service FROM employes WHERE prenom = 'laura'");
            $employe = $result->fetch(PDO::FETCH_NUM); // Pour obtenir un array indexé numériquement
            echo '<pre>'; print_r($employe); '</pre>'; 
            echo $employe[0]; // On accède au service par l'indice 4 de l'array $employe.


            $result = $pdo->query("SELECT service FROM employes WHERE prenom = 'laura'");
            $employe = $result->fetch(PDO::FETCH_OBJ); // Retourne un nouvel objet avec le nom de champs comme propriété (= attribut) public.
            echo '<pre>'; print_r($employe); '</pre>'; 
            echo $employe->service;
            echo '<br>';
            echo '------------<br>';
            
        
        // ******************************
        // 4. While et fetch_assoc
        // ******************************

            $resultat = $pdo->query("SELECT * FROM employes");

            echo 'Nombre d\'employés : ' . $resultat->rowCount() . '<br>'; // Permet de compter le nombre de lignes retournées par la requête

            while ($contenu = $resultat->fetch(PDO::FETCH_ASSOC)){
                /* 
                fetch retourne la ligne suivante du jeu de résultats en array associatif. 
                La boucle while permet de faire avancer le curseur dans le jeu de résultats, et s'arrete quand il est à lafin des résultat.
                */ 

                // echo '<pre>';print_r($contenu);'</pre>';
                // On voit que $contenu est array associatif qui contient les données de chaque ligne du jeu de résultats . Le nom des indices correspondent aux noms des champs

                echo $contenu['id_employes']. '<br>';
                echo $contenu['prenom']. '<br>';
                echo $contenu['nom']. '<br>';
                echo $contenu['sexe']. '<br>';
                echo $contenu['service']. '<br>';
                echo $contenu['date_embauche']. '<br>';
                echo $contenu['salaire']. '<br>';
                echo '------------<br>';
            }

            // Quand vous faites une requête qui ne sort qu'un seul résultat : pas de boucle while, mais un fetch seul.
            // Quand vous avez plusieurs résultats dans la requête : on fait une boucle while pour parcourir tous les résultats.

        // ******************************
        // 5. fetchAll
        // ******************************
            echo '<h1>5. fetchAll</h1>';

            $resultat = $pdo->query("SELECT * FROM employes");
            $donnees = $resultat->fetchAll(PDO::FETCH_ASSOC);
            // Retourne toutes le slignes de résultats dans un tableau multidimensionnel sans faire de boucle : vous avez un array associatif à chaque indice numérique.
            // Marche aussi avec FETCH_NUM.
            // echo '<pre>';print_r($donnees);'</pre>';

            // Pour lire le contenu d'un array multidimentionnel, nous faisons des boucles foreach imbriquées :

            echo '<strong>Double boucle foreach</strong>';
            
            foreach ($donnees as $contenu) { // $contenu est un sous array associatif
                foreach ($contenu as $indice => $value) { // On parcourt donc chaque sous array
                    echo $indice . ' correspond à ' . $value . '<br>';
                }
                echo '------------------<br>';
            }

        // ******************************
        // 6. Exercice
        // ******************************
            echo '<h1>6. Exercice</h1>';

            // Afficher la liste des bases de données présentent sur votre SGBD dans une liste <ul><li>.
            // Pour mémoire, la requête SQL est SHOW DATABASES.

                echo '<ul>';
                        $resultat = $pdo->query("SHOW DATABASES");
                        $donnees = $resultat->fetchAll(PDO::FETCH_ASSOC);

                        foreach ($donnees as $contenu) { 
                            foreach ($contenu as $indice => $value) { 
                                echo '<li>' . $indice . ' correspond à ' . $value . '</li>' . '<br>';
                            }
                        }
                echo '</ul>';

                //---------------- autre version de l'exercice ----------------

                $resultat = $pdo->query("SHOW DATABASES");
                    // echo '<pre>';print_r($donnees);'</pre>';
                
                echo '<ul>';
                    while ($donnees = $resultat->fetch(PDO::FETCH_ASSOC)){
                        echo '<li>' . $donnees['Database'] . '</li>' . '<br>';  
                    }
                echo '</ul>';

        // ******************************
        // 7. Table HTML
        // ******************************

            echo '<h1>7. Table HTML</h1>';
            $resultat = $pdo->query("SELECT * FROM employes");

            echo '<table border = "1">';
                // Affichage de la ligne d'entêtes :
                echo '<tr>';
                    for($i = 0; $i < $resultat->columnCount(); $i++){
                        echo '<pre>'; print_r($resultat->getColumnMeta($i)); echo '</pre>';
                        //Pour voir ce que retourne la méthode getColumnMeta() : un array avec notamment l'indice name qui contient le nom du champ

                        $colonne = $resultat->getColumnMeta($i); // $colonne est un array qui contient l'indice name

                        echo '<th>' . $colonne['name'] . '</th>'; // l'indice name contient le nom du champ
                    }
                echo '</tr>';

                // Affichage des autres lignes :
                while($ligne = $resultat->fetch(PDO::FETCH_ASSOC)){
                    echo '<tr>';
                        foreach($ligne as $information){
                            // echo '<pre>'; print_r($information); '</pre>';
                            echo '<td>' . $information . '</td>';
                        }
                    echo '</tr>';
                }
            echo '</table>';

        // ******************************
        // 8. Requête préparée : prepare() + bindParam() + execute()
        // ******************************

            echo '<h1>8. Requête préparée : prepare() + bindParam() + execute() </h1>';

            $nom = 'sennard';

            // Préparation de la requête :
            $resultat = $pdo->prepare("SELECT * FROM employes WHERE nom = :nom "); // On prépare la requête sans l'exécuter, avec un marqueur nominatif écrit :nom

            // On donne une valeur au marqueur :nom
            $resultat->bindParam(':nom', $nom, PDO::PARAM_STR);
            // je lie le marqueur :nom à la variable $nom.Si on change le contenu de la vriable, la valeur du marqueur changera automatiquement si on fait plusieurs execute

            // On exécute la requête :
            $resultat->execute();

            $donnees = $resultat->fetch(PDO::FETCH_ASSOC); // $donnees est un array associatif
            echo implode($donnees, ' - '); // implode transforme l'array en string

            /*
                prepare() renvoie toujours un objet PDOStatement
                execute() renvoie :
                    Succès : un objet PDOStatement
                    Echec : false
                
                les reuquêtes préparées sont à préconser si vouis exécutez plusieur fois la même requête
                (par exemple dans une boucle), et ainsi éviter le cycle complet analyse / interpretation / execution de la requête.

                Par ailleurs, les requêtes préparées sont souvent utilisées pour assainir les données en forçant le type des valeurs communiquées aux marqueurs
            */ 
        // ******************************
        // 9. Requête préparée : prepare() + bindValue() + execute()
        // ******************************
            echo '<h1>9. Requête préparée : prepare() + bindValue() + execute() </h1>';
            
            $nom = 'Thoyer';

            // On prépare la requête :
            $resultat = $pdo->prepare("SELECT * FROM employes WHERE nom = :nom ");

            // On lie le marqueur à une valeur
            $resultat->bindValue(':nom', $nom, PDO::PARAM_STR); // bindValue recoit une variable ou un string. 
            // Le marqueur pointe uniquement vers la valeur : si celle-ci change, il faudra refaire un bindValue pour prendre en compte cette nouvelle valeur lors d'un prochain execute().

            // On exécute la requête :
            $resultat->execute();

            $donnees = $resultat->fetch(PDO::FETCH_ASSOC);// $donnees est un array associatif
            echo implode($donnees, ' - ');

            // Si on change la valeur de la variable $nom, sans faire un nouveau bindValue, le marqueur de la requete pointe toujours vers 'Thoyer' :
            $nom = 'Durand';
            $resultat->execute();
            $donnees = $resultat->fetch(PDO::FETCH_ASSOC);
            echo implode($donnees, ' - '); // en effet, on obtient encore les informations de Thoyer et non pas de Durand.
        
        // ******************************
        // 10. Exercice
        // ******************************

            echo '<h1>Exercice</h1>';
            // Après avoir importé la BDD "bibliothèque", affichez dans une liste <ul><li> les livres empruntés par Chloé (il y en a plusieurs...), en utilisant une requête préparé

            // 1- Connexion :
            $pdo = new PDO('mysql:host=localhost;dbname=bibliotheque', 'root', '', array(PDO:: ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));


                // 2- Requête :
                $resultat = $pdo->prepare("SELECT titre from livre WHERE id_livre IN (SELECT id_livre FROM emprunt WHERE id_abonne IN (SELECT id_abonne FROM abonne WHERE prenom = :prenom))");

                $prenom = 'Chloe';
                
                $resultat->bindParam(':prenom', $prenom, PDO::PARAM_STR); // on peut aussi avoir PDO::PARAM_INT ou PDO::PARAM_BOOL

                // 3- On exécute la requête :
                $resultat->execute(); // On obtient un bjet issu de la classe prédéfinie PDOStatement (= 1 résultat de requête)
                
                // 3- le fetch :

                echo '<ul>';
                    while ($livre = $resultat->fetch(PDO::FETCH_ASSOC)){
                        echo '<li>' . $livre["titre"] . '</li>' . '<br>';  
                    }
                echo '</ul>';

                echo '<br>';
            
            // ----------------- Correction prof -------------------

                // Requête :
                $resultat = $pdo->prepare(
                    "SELECT titre from livre l
                    INNER JOIN emprunt e ON e.id_livre = l.id_livre 
                    INNER JOIN abonne a ON a.id_abonne = e.id_abonne 
                    WHERE a.prenom = :prenom"
                );
                
        // ******************************
        // 11. FETCH_CLASS
        // ******************************

            echo '<h1>11. FETCH_CLASS</h1>';

            // On se reconnecte à la BDD entreprise : 
            $pdo = new PDO('mysql:host=localhost;dbname=entreprise', 'root', '', array(PDO:: ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
        
            class Employes{
                public $id_employes;
                public $prenom;
                public $nom;
                public $sexe;
                public $service;
                public $date_embauche;
                public $salaire; // On déclare autant de propriétés qu'il y a de champs dans la table employes. L'orthographe des propriétés DOIT être identique à celle des champs.
            }

            $result = $pdo->query("SELECT * FROM employes");

            $donnees = $result->fetchAll(PDO::FETCH_CLASS, 'Employes'); // On obtient un array multidimensionnel indicé numériquement, qui contient à chaque indice un objet issu de la classe Employes

            echo '<pre>';print_r($donnees);echo '</pre>';

            // On affiche le contenu de $donnees avec une boucle foreach :

            foreach($donnees as $employe){
                echo $employe->prenom . '<br>';
            }
        // ******************************
        // 12. Points complémentaires
        // ******************************
            echo '<h1>12. Points complémentaires</h1>';

            // -----------------------------

            echo '<strong>Le marqueur "?" </strong><br>';

            $resultat = $pdo->prepare("SELECT * FROM employes WHERE nom = ? AND prenom = ?");
            // On prépare dans un premier temps, la requête sans sa partie variable, que l'on représenté avec des marqueurs sous forme de "?".

            $resultat->execute(array('durand', 'damien')); // durand va remplacer le premier "?" et damien le second

            $donnees = $resultat->fetch(PDO::FETCH_ASSOC); // pas de boucle while car on sait qu'il n'y a qu'un seul résultat dans cette requête.

            echo implode($donnees, ' - '); // Notez que nous faisons implode ici pour aller plus vite et éviter de faire un affichage dans une boucle...

            // -----------------------------

            echo '<br><strong>On peut faire un execute() sans bindParam</strong><br>';
            $resultat = $pdo->prepare("SELECT * FROM employes WHERE nom = :nom AND prenom = :prenom");
            $resultat->execute(array('nom' => 'durand','prenom' => 'damien')); // Notez que nous ne sommmes pas obligés de mettre les ";" devant les marqueurs

            $donnees = $resultat->fetch(PDO::FETCH_ASSOC);
            echo implode($donnees, ' - ');

            // -----------------------------

            echo '<br><strong>Afficher une erreur de requête SQL</strong><br>';
            $resultat = $pdo->prepare("SELECT $ FROM azerty WHERE nom = 'durand'");
            $resultat->execute();
            
            echo '<pre>'; print_r($resultat->errorInfo()); echo '</pre>'; 
            // errorInfo() est une méthode qui appartient à la classe PDOStatment et qui fournit des infos sur l'erreur SQL éventuellement produite.
            // On trouve le message de l'erreur à l'indice [2] de l'array retourné par cette méthode.


        // ******************************
        // 13. Mysqli
        // ******************************
            echo '<h1>13. Mysqli</h1>';

            // Il existe une autre manière de se connecter à une base de données e d'effectuer des requêtes sur celle-ci : l'extension Mysqli.

            // Connexion à la BDD : 
            $mysqli = new Mysqli('localhost', 'root', '', 'entreprise');

            // Un exemple de requête :
            $requete = $mysqli->query("SELECT * FROM employes");

            // Notez que les objets $mysqli(issu de la classe prédéfinie Mysqli) et $requete( issu de la classe Mysqli_result) ont des propriétés et des méthodes différentes de PDO. 
            // Nous ne pouvons donc pas mélanger les uns avec les autres. 


            // *********************************************************************************