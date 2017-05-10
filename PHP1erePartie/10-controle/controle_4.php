<?php
/*
	Exercice 3 : Etape 3
*/

$contenu = '';

$pdo = new PDO('mysql:host=localhost;dbname=exercice_3', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));


$query = $pdo->prepare('SELECT * FROM movies');
$query->execute();
$contenu .= '<h1>Liste des films</h1>
			 <table border="1">';
		$contenu .= '<tr>
						<th>Nom du film</th>
						<th>Réalisateur</th>
						<th>L\'année de production</th>
						<th>Autres infos</th>
					</tr>';

while ($film = $query->fetch(PDO::FETCH_ASSOC)){
		$contenu .= '<tr>
						<td>'. $film['title'] .'</td>
						<td>'. $film['director'] .'</td>
						<td>'. $film['year_of_prod'] .'</td>
						<td>
							<a href="controle_5.php?id_film='. $film['id_film'] .'">Plus d\'infos</a>
						</td>
					</tr>';
	}			
			
$contenu .= '</table>';


//---------------------
if(isset($_GET['id_film'])){
	
	$query = $pdo->prepare('SELECT * FROM movies WHERE id_film = :id_film');
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