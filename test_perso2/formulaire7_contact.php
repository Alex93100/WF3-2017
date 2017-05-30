<?php
//-------------------- TRAITEMENT ---------------------- 

	//Traitement du POST :

		if(!empty($_POST)){ // si le formulaire est posté

			// validation du formulaire :
				if(strlen($_POST['name']) < 4 || strlen($_POST['name']) > 40){
					$contenu .= '<div>Le nom doit contenir au moins 4 caractères</div>';
				}

				if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
					$contenu .= '<div>L\'email est invalide</div>';                        
				}
				// filter_var() permet de valider des format de chaines de caractères pour vérifier qu'il s'agit ici d'email (on pourrait valider une URL par exemple).

				if ($_POST['subject'] != 'contacts' && $_POST['subject'] != 'rdv' && $_POST['subject'] != 'devis'){
					$contenu .= '<div class="bg-danger">Le sujet est incorrecte</div>';
				}

				if(strlen($_POST['message']) < 10 || strlen($_POST['message']) > 255){
					$contenu .= '<div>Le message doit contenir au moins 10 caractères</div>';
				}


				// Si aucune erreur sur le formuaire avant envoi sur l'adresse email
				if(empty($contenu)){ // Si $contenu est vide,c'est qu'il n'y a pas d'erreur
				    else{
				        $contenu .= '<div class="bg-danger">Votre message a bien été envoyez.</div>';
				    }

				}

		}

		if($_POST)
		{
			echo $_POST['sujet'];
			echo $_POST['message'];
			echo $_POST['expediteur'];

			$_POST['expediteur'] = "From: $_POST[expediteur]  \n"; 
			$_POST['expediteur'] .= "MIME-Version: 1.0 \r\n";
			$_POST['expediteur'] .= "Content-type: text/html; charset=iso-8859-1 \r\n";
			$_POST['message'] = "Nom : " . $_POST['nom'] . "\nMessage : " . $_POST['message']; // nous mettons toutes les informations dans le message sans oublier le message en question.

			mail("rodrigues.alexandrepro@gmail.com", $_POST['sujet'], $_POST['message'], $_POST['expediteur']); // la fonction mail() reçoit toujours 4 ARGUMENTS et l'ordre à une importance cruciale. Comme dans la plupart des fonctions, il faut respecter le NOMBRE et l'ORDRE des arguments que l'on transmet.
		}
?>
<html>
	<form method="post" action="">
		<label for="nom">Nom</label><br>	<input type="text" name="nom" id="nom" placeholder="nom"><br><br><br>

		<label for="expediteur">Expediteur</label><br>	<input type="text" name="expediteur" id="expediteur" placeholder="expediteur"><br><br><br>

		<label for="sujet">Sujet</label><br>	<input type="text" name="sujet" id="sujet" placeholder="sujet"><br><br><br>

		<label for="message">Message</label><br>	<textarea name="message" rows="15" cols="105" placeholder="message"></textarea><br><br><br>
		 <input type="submit" name="envoi" value="envoi" /> 
	</form>
</html>