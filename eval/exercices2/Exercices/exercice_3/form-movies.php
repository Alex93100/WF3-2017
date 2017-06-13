<?php

	require_once 'inc/connect.php'; // Récupération de $pdo (Instance de PDO)
	require_once 'inc/functions.php';

	// Récupération de tous les films
	$movies = getAllMovies($pdo);
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Ciné Phil</title>
	<link rel="stylesheet" href="assets/styles.css">
</head>
<body>
	<section id="list-movies">
		<ul>
		<?php foreach($movies as $movie) : ?>
			<li>
				<form action="#" method="POST">
					<button type="submit" name="add-view" value="<?= $movie['id'] ?>">Ajouter une vue</button>
					<?= $movie['title'] ?> (<i><?= $movie['genre_name'] ?></i>)
				</form>
			</li>
		<?php endforeach ?>
		</ul>
	</section>
	<section id="table-movies">
		
		<!-- Tableau de statistiques -->
<?php

	$contenu = '';

	// Connexion a la BDD
	$pdo = new PDO('mysql:host=localhost;dbname=exercice_3final', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));

	// tableau statistique général

	$query = $pdo->prepare('SELECT * FROM movies ORDER BY nb_viewers desc LIMIT 10');
	$query->execute();

	$contenu .= '<h1>Tableau de statistique</h1>
				<table border="1">';
			$contenu .= '<tr>
							<th>Nom du film</th>
							<th>Date de ralisation</th>
							<th>nb de vue</th>
						</tr>';

	while ($film = $query->fetch(PDO::FETCH_ASSOC)){
		$contenu .= '<tr>
						<td>'. $film['title'] .'</td>
						<td>'. $film['release_date'] .'</td>							
						<td>'. $film['nb_viewers'] .'</td>
					</tr>';
	}
	$contenu .= '</table>';


	//Tableau statistique du genre Science-Fiction (Ne fonctione pas)

	$query = $pdo->prepare('SELECT g.name, m.title, m.nb_viewers
    FROM id_genre g INNER JOIN id_genre m
    ON m.id_genre = g.id
    WHERE g.name = "Science-Fiction"
	ORDER BY nb_viewers desc 
	LIMIT 5');
	$query->execute();

	$contenu .= '<h1>Tableau des films du genre Science-Fiction</h1>
				<table border="1">';
			$contenu .= '<tr>
							<th>Nom du film</th>
							<th>Genre</th>
							<th>nb de vue</th>
						</tr>';

	while ($film = $query->fetch(PDO::FETCH_ASSOC)){
		$contenu .= '<tr>
						<td>'. $film['title'] .'</td>
						<td>'. $film['name'] .'</td>							
						<td>'. $film['nb_viewers'] .'</td>
					</tr>';
	}
	$contenu .= '</table>';


	//Tableau statistique du genre Aventure (Ne fonctione pas)

	$query = $pdo->prepare('SELECT g.name, m.title, m.nb_viewers
    FROM id g INNER JOIN id_genre m
    ON m.id_genre = g.id
    WHERE g.name = "Aventure"
	ORDER BY nb_viewers desc 
	LIMIT 5');
	$query->execute();

	$contenu .= '<h1>Tableau des films du genre Aventure</h1>
				<table border="1">';
			$contenu .= '<tr>
							<th>Nom du film</th>
							<th>Genre</th>
							<th>nb de vue</th>
						</tr>';

	while ($film = $query->fetch(PDO::FETCH_ASSOC)){
		$contenu .= '<tr>
						<td>'. $film['title'] .'</td>
						<td>'. $film['name'] .'</td>							
						<td>'. $film['nb_viewers'] .'</td>
					</tr>';
	}
	$contenu .= '</table>';



	//Tableau statistique du genre Action (Ne fonctione pas)

	$query = $pdo->prepare('SELECT g.name, m.title, m.nb_viewers
    FROM id g INNER JOIN id_genre m
    ON m.id_genre = g.id
    WHERE g.name = "Action"
	ORDER BY nb_viewers desc 
	LIMIT 5');
	$query->execute();

	$contenu .= '<h1>Tableau des films du genre Action</h1>
				<table border="1">';
			$contenu .= '<tr>
							<th>Nom du film</th>
							<th>Genre</th>
							<th>nb de vue</th>
						</tr>';

	while ($film = $query->fetch(PDO::FETCH_ASSOC)){
		$contenu .= '<tr>
						<td>'. $film['title'] .'</td>
						<td>'. $film['name'] .'</td>							
						<td>'. $film['nb_viewers'] .'</td>
					</tr>';
	}
	$contenu .= '</table>';
echo $contenu;
?>

	</section>
</body>
</html>