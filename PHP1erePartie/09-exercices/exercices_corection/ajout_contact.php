<?php

/* 1- Créer une base de données "contacts" avec une table "contact" :
	  id_contact PK AI INT(3)
	  nom VARCHAR(20)
	  prenom VARCHAR(20)
	  telephone INT(10)
	  annee_rencontre (YEAR)
	  email VARCHAR(255)
	  type_contact ENUM('ami', 'famille', 'professionnel', 'autre')

	2- Créer un formulaire HTML (avec doctype...) afin d'ajouter un contact dans la bdd. Le champ année est un menu déroulant de l'année en cours à 100 ans en arrière à rebours, et le type de contact est aussi un menu déroulant.
	
	3- Effectuer les vérifications nécessaires :
	   Les champs nom et prénom contiennent 2 caractères minimum, le téléphone 10 chiffres
	   L'année de rencontre doit être une année valide
	   Le type de contact doit être conforme à la liste des types de contacts
	   L'email doit être valide
	   En cas d'erreur de saisie, afficher des messages d'erreurs au-dessus du formulaire

	4- Ajouter les contacts à la BDD et afficher un message en cas de succès ou en cas d'échec.

*/




$contenu = '';

$type_contact = array('ami', 'famille', 'professionnel', 'autre');

$pdo = new PDO('mysql:host=localhost;dbname=contacts', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));

var_dump($_POST);

if(!empty($_POST)){  

	if (strlen($_POST['nom']) < 2 || strlen($_POST['nom']) > 20){
		$contenu .= '<div>Le nom doit comporter au moins 2 caractères</div>';
	}

	if (strlen($_POST['prenom']) < 2 || strlen($_POST['prenom']) > 20){
		$contenu .= '<div>Le prénom doit comporter au moins 2 caractères</div>';
	}

	if (!preg_match('#^[0-9]{10}$#', $_POST['telephone'])){
		$contenu .= '<div>Le téléphone doit comporter 10 chiffres</div>';
	}
	

	if (!(is_numeric($_POST['annee_rencontre']) && checkdate('01', '01', $_POST['annee_rencontre']))){
		$contenu .= '<div>L\'année de rencontre n\'est pas valide</div>';
	}

	if (!in_array($_POST['type_contact'], $type_contact)){
		$contenu .= '<div>Le type de contact n\'est pas valide</div>';
	}

	if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
		$contenu .= '<div>L\'email n\'est pas valide</div>';
	}


	if (empty($contenu)) {

		foreach($_POST as $indice => $valeur)
		{
			$_POST[$indice] = htmlspecialchars($valeur, ENT_QUOTES);
		}


		$query = $pdo->prepare('INSERT INTO contact (nom, prenom, telephone, annee_rencontre, email, type_contact) VALUES(:nom, :prenom, :telephone, :annee_rencontre, :email, :type_contact)');
		$query->bindParam(':nom', $_POST['nom'], PDO::PARAM_STR);
		$query->bindParam(':prenom', $_POST['prenom'], PDO::PARAM_STR);
		$query->bindParam(':telephone', $_POST['telephone'], PDO::PARAM_INT);
		$query->bindParam(':annee_rencontre', $_POST['annee_rencontre'], PDO::PARAM_STR);
		$query->bindParam(':email', $_POST['email'], PDO::PARAM_STR);
		$query->bindParam(':type_contact', $_POST['type_contact'], PDO::PARAM_STR);

		$succes = $query->execute();

		if ($succes) {
			$contenu .= '<div>Le contact a été enregistré avec succés<div>';
		} else {
			$contenu .= '<div>Erreur lors de l\'enregistrement<div>';
		}

	}

}


?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Ajouter un contact</title>
</head>
<body>

	<h1>Ajouter un contact</h1>

	<?php  echo $contenu; ?>

	<form method="post" action="">
		
		<div class="input-group">
			<label for="nom">Nom</label>
			<input type="text" name="nom" id="nom">
		</div>

		<div class="input-group">
			<label for="prenom ">Prénom</label>
			<input type="text" name="prenom" id="prenom">
		</div>

		<div class="input-group">
			<label for="telephone">Téléphone</label>
			<input type="text" name="telephone" id="telephone">
		</div>

		<div class="input-group">
			<label for="annee_rencontre">Année de rencontre</label>
	
			<select name="annee_rencontre" id="annee_rencontre">
				<?php 
				for($i=date('Y'); $i>=date('Y')-100; $i--) {
					echo "<option value=$i>$i</option>";
				} 
				?>
				
			</select>
		</div>

		<div class="input-group">
			<label for="type_contact">Type de contact</label>
	
			<select name="type_contact" id="type_contact">
				<?php 
				foreach($type_contact as $key => $value){
					echo "<option value=$value>$value</option>";
				} 
				?>
				
			</select>
		</div>

		<div class="input-group">
			<label for="email">Email</label>
			<input type="text" name="email" id="email">
		</div>

		<button type="submit">Envoyer</button>

	</form>


</body>
</html>