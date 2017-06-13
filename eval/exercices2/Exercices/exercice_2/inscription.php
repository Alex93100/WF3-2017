<?php
        $message = '';
        
        // Connexion a la BDD
        $pdo = new PDO('mysql:host=localhost;dbname=exercice_2final', 'root', '', array(PDO:: ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));

    // si le formulaire est posté

    if(!empty($_POST)){ 
        // echo '<pre>';
        // print_r($_POST);
        // echo '</pre>';

        // Contrôles du formulaire :

        if(strlen($_POST['nom']) < 5 || strlen($_POST['nom']) > 20){ 
            $message .= '<article>Le nom doit comporter au moins 5 caractères</article>'; 
        }
    
        if(strlen($_POST['prenom']) < 5 || strlen($_POST['prenom']) > 30){
            $message .= '<article>Le prenom de doit comporter au moins 5 caractères</article>';
        }

        if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
            $message .= '<article>L\'email est invalide</article>';
        }

        if(strlen($_POST['password']) < 5 || strlen($_POST['password']) > 30){
            $message .= '<article>Le mot de passe doit comporter au moins 5 caractères</article>';
        }

        if($_POST['type'] != 'eleve' && $_POST['type'] != 'formateur'){
            $message .= '<article>Le champs eleve ou formateur n\'est pas correcte</article>';
        } 

        if(empty($message)){
            
            foreach($_POST as $indice => $valeur){
                $_POST[$indice] = htmlspecialchars($valeur, ENT_QUOTES); // IMPORTANT !!!
            }

            $resultat = $pdo->prepare("INSERT INTO exo_2(nom, prenom, email, password, type)VALUES(:nom, :prenom, :email, :password, :type)");

            $resultat->bindParam(':nom', $_POST['nom'], PDO::PARAM_STR);
            $resultat->bindParam(':prenom', $_POST['prenom'], PDO::PARAM_STR);
            $resultat->bindParam(':email', $_POST['email'], PDO::PARAM_STR);
            $resultat->bindParam(':password', $_POST['password'], PDO::PARAM_STR);
            $resultat->bindParam(':type', $_POST['type'], PDO::PARAM_STR);
            $req = $resultat->execute();
            
            if($req){
                echo 'L\'ajout a bien été fais';
            }
            else{
                echo 'Une erreur est survenue lors de l\'enregistrement l\'ajout n\'a pas pu etre effectué';
            }
        }
    }

echo $message;

// Redirection selon le type indiqué formateur ou eleve

if($_POST['type'] === 'formateur'){
    header('Location: http://www.wf3.fr/lecole/lequipe­pedagogique');
}
else{
    header('Location: http://wf3.apolearn.com/');
}
?>