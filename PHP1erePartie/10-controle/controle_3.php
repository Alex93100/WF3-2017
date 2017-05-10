<!--Exercice 3 : Et si on regardait un film ?  -->
<style>
    article{
        color:red;
        font-size:1.2rem;
    }
</style>
<?php
            $message = '';
			$pdo = new PDO('mysql:host=localhost;dbname=exercice_3', 'root', '', array(PDO:: ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));

			if(!empty($_POST)){ 
				
				// Contrôles du formulaire :

                if(strlen($_POST['title']) < 5 || strlen($_POST['title']) > 20){ 
					$message .= '<article>Le titre doit comporter au moins 5 caractères</article>'; 
				}
    
                if(strlen($_POST['actors']) < 5 || strlen($_POST['actors']) > 30){
					$message .= '<article>Le nom de l\'acteur doit comporter au moins 5 caractères</article>';
				}

                if(strlen($_POST['director']) < 5 || strlen($_POST['director']) > 30){
					$message .= '<article>Le nom du directeur doit comporter au moins 5 caractères</article>';
				}

                if(strlen($_POST['producer']) < 5 || strlen($_POST['producer']) > 30){
					$message .= '<article>Le nom du producteur doit comporter au moins 5 caractères</article>';
				}

				if (!(is_numeric($_POST['year_of_prod']) && checkdate('01', '01', $_POST['year_of_prod']))){
					$message .= '<div>L\'année de production n\'est pas valide</div>';
				}

                if(strlen($_POST['language']) < 3 || strlen($_POST['language']) > 30){
					$message .= '<article>La langue doit comporter au moins 3 caractères</article>';
				}

                if($_POST['category'] != 'action' && $_POST['category'] != 'drama'){
					$message .= '<article>Le id de contacter n\'est pas correcte</article>';
				} 

                if(strlen($_POST['storyline']) < 5 || strlen($_POST['storyline']) > 255){
					$message .= '<article>Le synopsis doit comporter au moins 5 caractères</article>';
				}

                if (filter_var($_POST['video'], FILTER_VALIDATE_URL )) {
                    echo 'Cette URL a un format non adapté.';
                } 
				

				if(empty($message)){
					
					foreach($_POST as $indice => $valeur){
						$_POST[$indice] = htmlspecialchars($valeur, ENT_QUOTES); // IMPORTANT !!!
					}

                    $resultat = $pdo->prepare("INSERT INTO movies(title, actors, director, producer, year_of_prod, language, category, storyline, video)VALUES( :title, :actors, :director, :producer, :year_of_prod, :language, :category, :storyline, :video)");

                    $resultat->bindParam(':title', $_POST['title'], PDO::PARAM_STR);
                    $resultat->bindParam(':actors', $_POST['actors'], PDO::PARAM_STR);
                    $resultat->bindParam(':director', $_POST['director'], PDO::PARAM_STR);
                    $resultat->bindParam(':producer', $_POST['producer'], PDO::PARAM_STR);
                    $resultat->bindParam(':year_of_prod', $_POST['year_of_prod'], PDO::PARAM_INT);
                    $resultat->bindParam(':language', $_POST['language'], PDO::PARAM_STR);
                    $resultat->bindParam(':category', $_POST['category'], PDO::PARAM_STR);
                    $resultat->bindParam(':storyline', $_POST['storyline'], PDO::PARAM_STR);
                    $resultat->bindParam(':video', $_POST['video'], PDO::PARAM_STR);
                    $req = $resultat->execute();
                    
                    if($req){
                        echo 'L\'ajout a bien été fais';
                    }
                    else{
                        echo 'Une erreur est survenue lors de l\'enregistrement l\'ajout n\'a pas pu etre effectué';
                    }
                }
            }


?>


<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<title>Document</title>
	</head>

	<body>
		<?php echo $message; ?>
		<form method="post" action="">
			<label for="title">Titre :</label><br>
			<input type="text" id="title" name="title" value=""><br><br>

			<label for="actors">Acteur :</label><br>
			<input type="text" id="actors" name="actors" value=""><br><br>

			<label for="director">Directeur :</label><br>
			<input type="text" id="director" name="director" value=""><br><br>

            <label for="producer">Producteur :</label><br>
			<input type="text" id="producer" name="producer" value=""><br><br>

			<label for="year_of_prod">Année de production :</label><br>
            <select id="year_of_prod" name="year_of_prod"> 
				<?php
					$a = 2017; 
				
					while ($a >= 1800) { 
						echo "<option>$a</option>";
						$a--;
					}
				?>
			</select><br><br>

            <label for="language">Langues :</label><br>
            <select name="language" id="language"><br>
				<option value="francais">Français</option>
				<option value="anglais">Englais</option>
				<option value="espagnol">Espagnol</option>
				<option value="portugais">Portugais</option>
			</select><br><br>

            <label for="category">Category :</label><br>           
			<select name="category" id="category"><br>
				<option value="action">Action</option>
				<option value="drama">Dramatique</option>
			</select><br><br>

            <label for="storyline">Synopsis :</label><br>
            <textarea name="storyline" id="storyline"></textarea><br><br>

            <label for="video">Lien Video :</label><br>
			<input type="text" id="video" name="video" value=""><br><br>

			<input type="submit" name="inscription" value="Envoi" class="btn"><br><br>
		</form>
	</body>
</html>