<?php
/*
	1- Afficher dans une table HTML la liste des restaurants avec les champs nom et téléphone, et un champ supplémentaire "autres infos" avec un lien qui permet d'afficher le détail de chaque contact.

	2- Afficher sous la table HTML le détail d'un contact quand on clique sur le lien "autres infos".
*/

$contenu = '';

$pdo = new PDO('mysql:host=localhost;dbname=restaurants', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));


$query = $pdo->prepare('SELECT * FROM restaurant');
$query->execute();
$contenu .= '<h1>Liste des restaurants</h1>
			 <table border="1">';
		$contenu .= '<tr>
						<th>Nom</th>
						<th>Téléphone</th>
						<th>Autres infos</th>
					</tr>';

while ($restaurants = $query->fetch(PDO::FETCH_ASSOC)){
		$contenu .= '<tr>
						<td>'. $restaurants['nom'] .'</td>
						<td>'. $restaurants['telephone'] .'</td>
						<td>
							<a href="?id_restaurant='. $restaurants['id_restaurant'] .'">Plus d\'infos</a>
						</td>
					</tr>';
	}			
			
$contenu .= '</table>';


//---------------------
if(isset($_GET['id_restaurant'])){
	
	$query = $pdo->prepare('SELECT * FROM restaurant WHERE id_restaurant = :id_restaurant');
	$query->bindParam(':id_restaurant', $_GET['id_restaurant'], PDO::PARAM_INT);
	$query->execute();
	
	
	$restaurant = $query->fetch(PDO::FETCH_ASSOC);

	$contenu .= '<h1>Détail d\'un restaurant</h1>';
	if (!empty($restaurant)) {
		$contenu .= '<p>Nom : '. $restaurant['nom'] .'</p>';
		$contenu .= '<p>Téléphone : '. $restaurant['telephone'] .'</p>';
		$contenu .= '<p>Adresse : '. $restaurant['adresse'] .'</p>';
		$contenu .= '<p>Type : '. $restaurant['type'] .'</p>';
		$contenu .= '<p>Note : '. $restaurant['note'] .'</p>';
		$contenu .= '<p>Avis : '. $restaurant['avis'] .'</p>';


	} else {
		$contenu .= '<div>Ce restaurant n\'existe pas</div>';
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