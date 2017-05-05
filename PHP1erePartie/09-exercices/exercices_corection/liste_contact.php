<?php
/*
	1- Afficher dans une table HTML la liste des contacts avec les champs nom, prénom, téléphone, et un champ supplémentaire "autres infos" avec un lien qui permet d'afficher le détail de chaque contact.

	2- Afficher sous la table HTML le détail d'un contact quand on clique sur le lien "autres infos".



*/

$contenu = '';

$pdo = new PDO('mysql:host=localhost;dbname=contacts', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));


$query = $pdo->prepare('SELECT * FROM contact');
$query->execute();
$contenu .= '<h1>Liste des contacts</h1>
			 <table border="1">';
		$contenu .= '<tr>
						<th>Nom</th>
						<th>Prénom</th>
						<th>Téléphone</th>
						<th>Autres infos</th>
					</tr>';

while ($contacts = $query->fetch(PDO::FETCH_ASSOC)){
		$contenu .= '<tr>
						<td>'. $contacts['nom'] .'</td>
						<td>'. $contacts['prenom'] .'</td>
						<td>'. $contacts['telephone'] .'</td>
						<td>
							<a href="?id_contact='. $contacts['id_contact'] .'">Plus d\'infos</a>
						</td>
					</tr>';
	}			
			
$contenu .= '</table>';



if(isset($_GET['id_contact'])){
	
	$query = $pdo->prepare('SELECT * FROM contact WHERE id_contact = :id_contact');
	$query->bindParam(':id_contact', $_GET['id_contact'], PDO::PARAM_INT);
	$query->execute();
	$contact = $query->fetch(PDO::FETCH_ASSOC);

	$contenu .= '<h1>Détail d\'un contact</h1>';
	if (!empty($contact)) {
		$contenu .= '<p>Nom : '. $contact['nom'] .'</p>';
		$contenu .= '<p>Prénom : '. $contact['prenom'] .'</p>';
		$contenu .= '<p>Téléphone : '. $contact['telephone'] .'</p>';
		$contenu .= '<p>Email : '. $contact['email'] .'</p>';
		$contenu .= '<p>Année de rencontre : '. $contact['annee_rencontre'] .'</p>';
		$contenu .= '<p>Type de contact : '. $contact['type_contact'] .'</p>';


	} else {
		$contenu .= '<div>Ce contact n\'existe pas</div>';
	}

}





?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Liste des contacts</title>
</head>
<body>
	<?php echo $contenu; ?>
</body>
</html>