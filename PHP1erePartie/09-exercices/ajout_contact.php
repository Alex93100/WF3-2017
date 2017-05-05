<?php

/* 1- Créer une base de données "contacts" avec une table "contact" : *************OK
	  id_contact PK AI INT(3)
	  nom VARCHAR(20)
	  prenom VARCHAR(20)
	  telephone INT(10)
	  annee_rencontre (YEAR)
	  email VARCHAR(255)
	  type_contact ENUM('ami', 'famille', 'professionnel', 'autre')

	2- Créer un formulaire HTML (avec doctype...) afin d'ajouter un contact dans la bdd. Le champ année est un menu déroulant de l'année en cours à 100 ans en arrière à rebours, et le type de contact est aussi un menu déroulant.
	
	3- Effectuer les vérifications nécessaires :
	   Les champs nom et prénom contiennent 2 caractères minimum, le téléphone 10 chiffres **********OK
	   L'année de rencontre doit être une année valide
	   Le type de contact doit être conforme à la liste des types de contacts ***************OK
	   L'email doit être valide *****************OK
	   En cas d'erreur de saisie, afficher des messages d'erreurs au-dessus du formulaire ****************OK

	3- Ajouter les contacts à la BDD et afficher un message en cas de succès ou en cas d'échec. **************OK

*/
?>

<?php
			$message = '';
			$pdo = new PDO('mysql:host=localhost;dbname=contacts', 'root', '', array(PDO:: ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));

			if(!empty($_POST)){ 
				
				// Contrôles du formulaire :

                if(strlen($_POST['prenom']) < 2 || strlen($_POST['prenom']) > 20){ 
					$message .= '<article>Le prénom doit comporter au moins 3 caractères</article>'; 
				}
    
                if(strlen($_POST['nom']) < 2 || strlen($_POST['nom']) > 20) $message .= '<article>Le nom doit comporter au moins 3 caractères</article>';

                if (!preg_match('#^[0-9]{10}$#', $_POST['telephone'])){
					$message .= '<div>Le téléphone doit comporter 10 chiffres</div>';
				}

                if($_POST['type_contact'] != 'ami' && $_POST['type_contact'] != 'famille' && $_POST['type_contact'] != 'professionnel' && $_POST['type_contact'] != 'autre') $message .= '<article>Le id de contacter n\'est pas correcte</article>';
				 
				if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
                    $message .= '<article>L\'email est invalide</article>';                        
                }

				if(empty($message)){ // si les messages sont vides, c'est qu'il n'y a pas d'erreur
                    $resultat = $pdo->prepare("INSERT INTO contact(prenom, nom, type_contact, telephone, annee_rencontre, email)VALUES( :prenom, :nom, :type_contact, :telephone, :annee_rencontre, :email)");

                    $resultat->bindParam(':prenom', $_POST['prenom'], PDO::PARAM_STR);
                    $resultat->bindParam(':nom', $_POST['nom'], PDO::PARAM_STR);
                    $resultat->bindParam(':type_contact', $_POST['type_contact'], PDO::PARAM_STR);
                    $resultat->bindParam(':telephone', $_POST['telephone'], PDO::PARAM_STR);
                    $resultat->bindParam(':annee_rencontre', $_POST['annee_rencontre'], PDO::PARAM_STR);
                    $resultat->bindParam(':email', $_POST['email'], PDO::PARAM_INT);
                    $req = $resultat->execute();
                    
                    // 4- Afficher à la fin un message "L'employé a bien été ajouté".
                    if($req){ // execute() ci-dessus renvoie TRUE en cas de succès de la requête, sinon false
                        echo 'L\'ajout a bien été fais';
                    }
                    else{
                        echo 'Une erreur est survenue lors de l\'enregistrement l\'ajout n\'a pas pu etre effectué';
                    }
                }
            }

?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<title>Document</title>
	</head>

	<body>
		<?php echo $message; ?>
		<form method="post" action="">
			<label for="nom">Nom :</label><br>
			<input type="text" id="nom" name="nom" value=""><br><br>

			<label for="prenom">Prénom :</label><br>
			<input type="text" id="prenom" name="prenom" value=""><br><br>

			<label for="email">Email :</label><br>
			<input type="text" id="email" name="email" value=""><br><br>

			<label for="telephone">Telephone :</label><br>
			<input type="text" id="telephone" name="telephone" placeholder="0600000000"></textarea><br><br>

			<label for="annee_rencontre">Année de rencontre :</label><br><br>
            <select id="annee_rencontre" name="annee_rencontre"> 
				<?php
					$a = 2017; 
				
					while ($a >= 1917) { 
						echo "<option>$a</option>";
						$a--;
					}
				?>
			</select>

			<select name="type_contact" id="type_contact">Type contact :<br>
				<option value="ami">Ami</option>
				<option value="famille">Famille</option>
				<option value="professionnel">Professionnel</option>
				<option value="autre">Autre</option><br><br>
			</select>

			<input type="submit" name="inscription" value="Envoi" class="btn"><br><br>
		</form>
	</body>
</html>
