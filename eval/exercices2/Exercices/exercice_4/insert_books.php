<?php
require_once('Book.php');
require_once('BookManager.php');

	//insère 200 livres au hasard en base de données
            
$class = new Book();

foreach($class as $key => $value) {
	print "$key => $value";
}

$resultat = $pdo->prepare("INSERT INTO exo_4(nom, prenom, email, password, type)VALUES(:nom, :prenom, :email, :password, :type)");

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
        