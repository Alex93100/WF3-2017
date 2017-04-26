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

            echo '<h1> Formulaire </h1>';

            $pdo = new PDO('mysql:host=localhost;dbname=entreprise', 'root', '', array(PDO:: ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));

            if (!empty($_POST)) {
                $resultat = $pdo->prepare("INSERT INTO employes(prenom, nom, sexe, service, date_embauche, salaire)VALUES( :prenom, :nom, :sexe, :service, :date_embauche, :salaire)");

                $resultat->bindParam('prenom', $_POST['prenom'], PDO::PARAM_STR);
                $resultat->bindParam('nom', $_POST['nom'], PDO::PARAM_STR);
                $resultat->bindParam('sexe', $_POST['sexe'], PDO::PARAM_STR);
                $resultat->bindParam('service', $_POST['service'], PDO::PARAM_STR);
                $resultat->bindParam('date_embauche', $_POST['date_embauche'], PDO::PARAM_STR);
                $resultat->bindParam('salaire', $_POST['salaire'], PDO::PARAM_STR);
                $resultat->execute();

                echo 'L\'employé a bien été ajouté';
            }



?>


<form method ="post" action="">

    <label for="prenom">Prenom</label>
    <input type="text" id="prenom" name="prenom"><br>

    <label for="nom">Nom</label>
    <input type="text" id="nom" name="nom"><br>

    <label for="sexe">Sexe M:</label>
    <input type="radio" id="sexe" name="sexe" value = 'm'><br>
    <label for="sexe">Sexe F:</label>    
    <input type="radio" id="sexe" name="sexe" value = 'f'><br>
    
    <label for="service">Service</label>
    <input type="text" id="service" name="service"><br>

    <label for="date_embauche">Date d'embauche</label>
    <input type="text" id="date_embauche" name="date_embauche"><br>

    <label for="salaire">Salaire</label>
    <input type="text" id="salaire" name="salaire"><br>

    <input type="submit">

</form>