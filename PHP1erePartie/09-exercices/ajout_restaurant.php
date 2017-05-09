<?php

/* 1- Créer une base de données "restaurants" avec une table "restaurant" :
	  id_restaurant PK AI INT(3)
	  nom VARCHAR(100)
	  adresse VARCHAR(255)
	  telephone VARCHAR(10)
	  type ENUM('gastronomique', 'brasserie', 'pizzeria', 'autre')
	  note INT(1)
	  avis TEXT

	2- Créer un formulaire HTML (avec doctype...) afin d'ajouter un restaurant dans la bdd. Les champs type et note sont des menus déroulants que vous créez avec des boucles.
	
	3- Effectuer les vérifications nécessaires :
	   Le champ nom contient 2 caractères minimum
	   Le champ adresse ne doit pas être vide
	   Le téléphone doit contenir 10 chiffres
	   Le type doit être conforme à la liste des types de la bdd
	   La note est un nombre entre 0 et 5
	   L'avis ne doit être vide
	   En cas d'erreur de saisie, afficher des messages d'erreurs au-dessus du formulaire

	4- Ajouter le restaurant à la BDD et afficher un message en cas de succès ou en cas d'échec.

*/


			$message = '';
			$table = array('gastronomique', 'brasserie', 'pizzeria', 'autre');
			$pdo = new PDO('mysql:host=localhost;dbname=restaurants', 'root', '', array(PDO:: ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));

			if(!empty($_POST)){ 
				
				// Contrôles du formulaire :

                if(strlen($_POST['adresse']) < 1 || strlen($_POST['adresse']) > 255){ 
					$message .= '<article>L\'adresse doit comporter au moins 1 caractères</article>'; 
				}
    
                if(strlen($_POST['nom']) < 2 || strlen($_POST['nom']) > 100){
					$message .= '<article>Le nom doit comporter au moins 3 caractères</article>';
				}

                if (!preg_match('#^[0-9]{10}$#', $_POST['telephone'])){
					$message .= '<div>Le téléphone doit comporter 10 chiffres</div>';
				}

                if (!in_array($_POST['type'], $table)){
					$message .= '<div>Le type de restaurant n\'est pas valide</div>';
				}

				if (!(is_numeric($_POST['note']) && $_POST['note'] >= 0 && $_POST['note'] <= 5)){
					$message .= '<div>Note n\'est pas valide</div>';
				}


				if(strlen($_POST['avis']) <= 0){ 
					$message .= '<article>L\'avis ne doit être vide</article>'; 
				}

				if(empty($message)){
					
					foreach($_POST as $indice => $valeur){
						$_POST[$indice] = htmlspecialchars($valeur, ENT_QUOTES); // IMPORTANT !!!
					}

                    $resultat = $pdo->prepare("INSERT INTO restaurant(adresse, nom, type, telephone, note, avis)VALUES( :adresse, :nom, :type, :telephone, :note, :avis)");

                    $resultat->bindParam(':adresse', $_POST['adresse'], PDO::PARAM_STR);
                    $resultat->bindParam(':nom', $_POST['nom'], PDO::PARAM_STR);
                    $resultat->bindParam(':type', $_POST['type'], PDO::PARAM_STR);
                    $resultat->bindParam(':telephone', $_POST['telephone'], PDO::PARAM_STR);
                    $resultat->bindParam(':note', $_POST['note'], PDO::PARAM_INT);
                    $resultat->bindParam(':avis', $_POST['avis'], PDO::PARAM_STR);
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
		<main>
		<?php echo $message  ?>
			<form method="post" action="">
			
				<label for="nom">Nom :</label><br>
				<input type="text" id="nom" name="nom" value=""><br><br>

				<label for="adresse">Adresse :</label><br>
				<input type="text" id="adresse" name="adresse" value=""><br><br>

				<label for="telephone">Telephone :</label><br>
				<input type="text" id="telephone" name="telephone" placeholder="0600000000"></textarea><br><br>

				<label for="type">Type de restaurant :</label><br>
				<select name="type" id="type"><br>
					<?php 
					foreach ($table as $key => $value) {
						echo '<option value="'. $value .'">'. $value .'</option>';
					} 
					
					?>
				</select><br><br>

				<label for="note">Note :</label><br>
				<select name="note" id="note"><br>
					<?php 
					for( $i = 0; $i <= 5; $i++){

					echo "<option value=$i>$i</option>";

					}
					
					?>
				</select><br><br>

				<label for="avis">Avis :</label><br>
				<textarea name="avis" id="avis" placeholder="Votre avis"></textarea><br><br>

				<input type="submit" name="inscription" value="Envoi" class="btn"><br><br>

			</form>
		</main>
	</body>
</html>
