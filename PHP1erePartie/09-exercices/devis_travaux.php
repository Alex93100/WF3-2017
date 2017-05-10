<?php
/* 
	1- Vous réalisez un formulaire "Votre devis de travaux" qui permet de saisir le montant des travaux de votre maison en HT et de choisir la date de construction de votre maison (bouton radio) : "plus de 5 ans" ou "5 ans ou moins". Ce formulaire permettra de calculer le montant TTC de vos travaux selon la période de construction de votre maison.

	2- Vous réalisez la validation du formulaire : le montant doit être en nombre positif non nul, et la période de construction conforme aux valeurs que vous aurez choisies.

	3- Vous créez une fonction montantTTC qui calcule le montant TTC à partir du montant HT donné par l'internaute et selon la période de construction : le taux de TVA est de 10% pour plus de 5 ans, et de 20% pour 5 ans ou moins. La fonction retourne le résultat du calcul.
	
	Formule de calcul d'un montant TTC :  montant TTC = montant HT * (1 + taux / 100) où taux est par exemple égale à 20.

	4- Vous affichez le résultat calculé par la fonction au-dessus du formulaire : "Le montant de vos travaux est de X euros avec une TVA à Y% incluse."

	5- Vous diffusez des codes de remises promotionnelles, dont un est 'abc' offrant 10% de remise. Ajoutez un champ au formulaire pour saisir le code de remise. Vous validez ce champ qui ne doit pas excéder 5 caractères. Puis la fonction montantTTC applique la remise (-10%) au montant total des travaux si le code de l'internaute est correcte. Vous affichez dans ce cas "Le montant de vos travaux est de X euros avec une TVA à Y% incluse, et y compris une remise de 10%.". 

*/

			$message = '';

			function prixTtc($montant_travaux, $date, $code){
				$taux = array(10, 20);
				$textRemise = '';


				if($date == 'plus'){
					$tva = $taux[0]; // 10
				}
				else{
					$tva = $taux[1]; // 20				
				}
            }

			$prixTtc = $montant_travaux * (1 + $tva / 100);

				if($code == 'abc'){
					$prixTtc = 0.9 * $prixTtc; // applique 10%de réduction
					$textRemise = ", et y compris une remis de 10%";
				}
				return "Le montant de vos travaux est de $prixTtc euros avec une TVA à $tva% incluse $textRemise.";		
				}



			
			// ----------------------------
			
			
			if(!empty($_POST)){ 
				
				// Contrôles du formulaire :

                if(!ctype_digit($_POST['montant_travaux']) || $_POST['montant_travaux'] <= 0){ // vérifie si une chaîne est un entier
					$message .= '<article>Le montant n\'est pas correcte</article>'; 
				}

				if ($_POST['date'] != 'plus' && $_POST['date'] != 'moins'){
					$message .= '<article>La date de construction n\'est aps correcte</article>';
				}

				if (strlen($_POST['code']) > 5){
					$message .= '<article>Le code remise n\'est aps correcte</article>';
				}

				if(empty($message)){
					
					foreach($_POST as $indice => $valeur){
						$_POST[$indice] = htmlspecialchars($valeur, ENT_QUOTES); // IMPORTANT !!!
					}
					$message .=  prixTtc($_POST['montant_travaux'], $_POST['date'], $_POST['code']);
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
	<?php echo $message?>
	<h1>Votre devis de travaux</h1>

	<form method="post" action="">
		<label for="montant_travaux">Montant travaux :</label><br>
		<input type="number" name="montant_travaux" id="montant_travaux"><br><br>

		<label for="date"> Date construction :</label>
		<input type="radio" id="plus" name="date" value="plus" checked><label for="plus">plus de 5 ans</label>
    	<input type="radio" id="moins" name="date" value="moins"><label for="moins">5 ans ou moins</label><br><br>

		<label for="code">Code promotionel :</label><br>
		<input type="text" name="code" id="code"><br><br>

		<input type="submit" name="envoi" value="Envoi">
	</form>
</body>
</html>