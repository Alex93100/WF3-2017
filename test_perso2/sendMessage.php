<?php
$contenu = '';
//-------------------- TRAITEMENT ---------------------- ;

	//Traitement du POST :;

		if(!empty($_POST)){ // si le formulaire est posté;

			// validation du formulaire :;
				if(strlen($_POST['name']) < 4 || strlen($_POST['name']) > 40){
					$contenu .= '<div>Le nom doit contenir au moins 4 caractères</div>';
				}
				else{
					true;
				}

				if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
					$contenu .= '<div>L\'email est invalide</div>';                        
				}
				else{
					true;
				}

				if ($_POST['subject'] != 'contacts' && $_POST['subject'] != 'rdv'){
					$contenu .= '<div class="bg-danger">Le sujet est incorrecte</div>';
				}
				else{
					true;
				}

				if(strlen($_POST['message']) < 10 || strlen($_POST['message']) > 255){
					$contenu .= '<div>Le message doit contenir au moins 10 caractères</div>';
				}
				else{
					true;
				}
				
				// Si aucune erreur sur le formuaire avant envoi sur l'adresse email;
				if(empty($contenu)){ // Si $contenu est vide,c'est qu'il n'y a pas d'erreur;
					if($_POST){

						echo $_POST['subject'];
						echo $_POST['message'];
						echo $_POST['email'];

						$_POST['email'] = "From: $_POST[email]  \n"; 
						$_POST['email'] .= "MIME-Version: 1.0 \r\n";
						$_POST['email'] .= "Content-type: text/html; charset=iso-8859-1 \r\n";
						$_POST['message'] = "Nom : " . $_POST['name'] . "\nMessage : " . $_POST['message']; // nous mettons toutes les informations dans le message sans oublier le message en question.;

						mail("rodrigues.alexandrepro@gmail.com", $_POST['subject'], $_POST['message'], $_POST['email']); // la fonction mail() reçoit toujours 4 ARGUMENTS et l'ordre à une importance cruciale. Comme dans la plupart des fonctions, il faut respecter le NOMBRE et l'ORDRE des arguments que l'on transmet.;
					}
				}
		}
?>