<?php
/*
	Exercice 3 : Etape 4


    Ne marche pas.
*/
$contenu = '';

$pdo = new PDO('mysql:host=localhost;dbname=exercice_3', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));



if(isset($_GET['id_film'])){
	
	$query = $pdo->prepare('SELECT * FROM movies');
	$query->bindParam(':id_film', $_GET['id_film'], PDO::PARAM_INT);
	$query->execute();
	
	
	$film = $query->fetch(PDO::FETCH_ASSOC);

	$contenu .= '<h1>Détail du film</h1>';
	if (!empty($film)) {
		$contenu .= '<p>Titre : '. $film['title'] .'</p>';
		$contenu .= '<p>Acteur : '. $film['actors'] .'</p>';
		$contenu .= '<p>Réalisateur : '. $film['director'] .'</p>';
		$contenu .= '<p>Producteur : '. $film['producer'] .'</p>';
		$contenu .= '<p>Année de production : '. $film['year_of_prod'] .'</p>';
		$contenu .= '<p>Langue : '. $film['language'] .'</p>';
		$contenu .= '<p>Category : '. $film['category'] .'</p>';
		$contenu .= '<p>Synopsis : '. $film['storyline'] .'</p>';
		$contenu .= '<p>Lien video : '. $film['video'] .'</p>';


	} else {
		$contenu .= '<div>Ce film n\'existe pas</div>';
	}

}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Liste des restaurants</title>
</head>
<body>
	<?php echo $contenu; ?>
</body>
</html>

