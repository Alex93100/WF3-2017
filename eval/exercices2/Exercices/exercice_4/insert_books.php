<?php
require_once('Book.php');
require_once('BookManager.php');

	//insère 200 livres au hasard en base de données
            
$class = new Book();

foreach($class as $key => $value) {
	print "$key => $value";
}

// Insertion dans la bse de donnée (Ne fonctionne pas)
$resultat = $pdo->prepare("INSERT INTO exo_4(author, title, year, datecreated)VALUES(:author, :title, :year, :datecreated)");

$resultat->bindParam(':author', $_POST['author'], PDO::PARAM_STR);
$resultat->bindParam(':title', $_POST['title'], PDO::PARAM_STR);
$resultat->bindParam(':year', $_POST['year'], PDO::PARAM_INT);
$resultat->bindParam(':datecreated', $_POST['datecreated'], PDO::PARAM_INT);
$req = $resultat->execute();

if($req){
	echo 'L\'ajout a bien été fais';
}
else{
	echo 'Une erreur est survenue lors de l\'ajout les livre n\'ont pas pu etre effectué';
}
        