<?php

    // Exercice :

        // Principe : créer un formulaire qui permet d'enregistrer un nouvel employé dans la base entreprise.
        /*
            Les étapes :
                1- Création du formulaire HTML
                2- Connexion à la BDD
                3- Lorsque le formulaire est posté, insertion des informations du formulaire en BDD.
                Faites-le avec une requête préparée.
                4- Afficher à la fin un message "L'employé a bien été ajouté".
        */ 

            echo '<h1> Enregistrer un employé </h1>';
                
                // 2- Connexion à la BDD
                $message = '';
            $pdo = new PDO('mysql:host=localhost;dbname=entreprise', 'root', '', array(PDO:: ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));

            if (!empty($_POST)) { //si le formulaire est posté, il y a des indices dans $_POST,il n'est donc pas vide

                // Contrôles du formulaire :

                if(strlen($_POST['prenom']) < 3 || strlen($_POST['prenom']) > 20) $message .= '<article>Le prénom doit comporter au moins 3 caractères</article>'; 
                // strlen indique le nombre de caractères

                if(strlen($_POST['nom']) < 3 || strlen($_POST['nom']) > 20) $message .= '<article>Le nom doit comporter au moins 3 caractères</article>';

                if($_POST['sexe'] != 'm' && $_POST['sexe'] != 'f') $message .= '<article>Le sexe n\'est pas correct</article>';

                if(strlen($_POST['service']) < 3 || strlen($_POST['service']) > 20) $message .= '<article>Le service doit comporter au moins 3 caractères</article>';

                $tab_date = explode ('-', $_POST['date_embauche']);// met le jour, le mois et l'année dans une array pour pouvoir les paser )à la fonction checkdate($mois, $jour, $annee)
                if(!(isset($tab_date[0]) && isset($tab_date[1]) && isset($tab_date[2]) && checkdate($tab_date[1], $tab_date[2], $tab_date[0]))) $message .= '<article>La date n\'est pas valide</article>';
                //checkdate($mois, $jour, $annee)

                if(!is_numeric($_POST['salaire']) || $_POST['salaire'] <= 0) $message .= '<article>Le salaire doit être supérieur à 0</article>'; //is_numeric teste si c'est un nombre
                


                if(empty($message)){ // si les messages sont vides, c'est qu'il n'y a pas d'erreur
                    $resultat = $pdo->prepare("INSERT INTO employes(prenom, nom, sexe, service, date_embauche, salaire)VALUES( :prenom, :nom, :sexe, :service, :date_embauche, :salaire)");

                    $resultat->bindParam(':prenom', $_POST['prenom'], PDO::PARAM_STR);
                    $resultat->bindParam(':nom', $_POST['nom'], PDO::PARAM_STR);
                    $resultat->bindParam(':sexe', $_POST['sexe'], PDO::PARAM_STR);
                    $resultat->bindParam(':service', $_POST['service'], PDO::PARAM_STR);
                    $resultat->bindParam(':date_embauche', $_POST['date_embauche'], PDO::PARAM_STR);
                    $resultat->bindParam(':salaire', $_POST['salaire'], PDO::PARAM_INT);
                    $req = $resultat->execute();
                    
                    // 4- Afficher à la fin un message "L'employé a bien été ajouté".
                    if($req){ // execute() ci-dessus renvoie TRUE en cas de succès de la requête, sinon false
                        echo 'L\'employé a bien été ajouté';
                    }
                    else{
                        echo 'Une erreur est survenue lors de l\'enregistrement l\'employé n\'a pas été ajouté';
                    }
                }
            }



?>

<!--1- Création du formulaire HTML-->

<?php echo $message; ?>
<form method ="post" action="">

    <label for="prenom">Prenom :</label>
    <input type="text" id="prenom" name="prenom"><br>

    <label for="nom">Nom :</label>
    <input type="text" id="nom" name="nom"><br>

    <label for="sexe">Sexe:</label><br>
    <label for="sexe"> M:</label>
    <input type="radio" id="sexe" name="sexe" value = 'm' checked>
    <label for="sexe"> F:</label>    
    <input type="radio" id="sexe" name="sexe" value = 'f'><br>
    
    <label for="service">Service :</label>
    <input type="text" id="service" name="service"><br>

    <label for="date_embauche">Date d'embauche :</label>
    <input type="text" id="date_embauche" name="date_embauche" placeholder = "AAAA-MM-JJ"><br>

    <label for="salaire">Salaire :</label>
    <input type="text" id="salaire" name="salaire"><br>

    <input type="submit">

</form>