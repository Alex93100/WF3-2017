<?php
/*
   1- Vous créez un formulaire avec un menu déroulant avec les catégories A,B,C et D de véhicules de location et un champ nombre de jours de location. Lorsque le formulaire est soumis, vous affichez "La location de votre véhicule sera de X euros pour Y jour(s)." sous le formulaire.

   2- Vous validez le formulaire : la catégorie doit être correcte et le nombre de jours un entier positif.

   3- Vous créez une fonction prixLoc qui retourne le prix total de la location en fonction du prix de la catégorie choisie (A : 30€, B : 50€, C : 70€, D : 90€) multiplié par le nombre de jours de location. 

   4- Si le prix de la location est supérieur à 150€, vous consentez une remise de 10%.

*/
$categories = array('A', 'B', 'C', 'D');
$message = ''; // variable d'affichage des messages d'erreur
$afficheResultat = ''; // variable d'affichage des résultats 

//var_dump($_POST);

function prixLoc($categorie, $nbJours){
	switch($categorie) {
		case 'A' : $prix = 30; break;
		case 'B' : $prix = 50; break;
		case 'C' : $prix = 70; break;
		case 'D' : $prix = 90; break;
		default : return 'Il y a un problème sur le prix';
	}
	
	$prixLoc = $prix * $nbJours;
	
	if ($prixLoc > 150) {
		$prixLoc = 0.9 * $prixLoc;
	}
	return "La location de votre véhicule sera de $prixLoc euros pour $nbJours jour(s).";
}


if (!empty($_POST)) {  // si le formulaire est soumis
	
	// Contrôles du formulaire :
	$jour = (int)$_POST['nbJours'];  // ici on caste (= tranforme) le contenu $_POST['nbJours'] en integer, puis on vérifie s'il est inférieur ou égal à 0 ligne suivante. Note : si $_POST['nbJours'] est une chaîne, $jours prend la valeur 0
	if ($jour <= 0) $message .= '<div>Erreur sur le nombre de jours</div>';   
	
	
	// On peut aussi utiliser la fonction prédéfinie ctype_digit() qui vérifie si une chaîne est un entier (retourne un booléen true ou false)
	if (!ctype_digit($_POST['nbJours']) || $_POST['nbJours'] <= 0) $message .= '<div>Erreur sur le nombre de jours</div>';   
	
	/* Synthèse des types numériques :
	is_numeric vérifie si c'est un nombre, décimal ou pas
	
	is_int vérifie si c'est un entier (ne marche pas avec les formulaires : dans ce cas caster le type en integer pour le tester : cf ci-dessus)
	
	is_float vérifie si c'est un nombre décimal
	
	ctype_digit vérifie si une chaîne est un entier (utile dans le cas des formulaires)
	*/
	
	
	

	if (! in_array($_POST['categorie'], $categories)) $message .= '<div>Erreur sur la catégorie</div>';   
	
	// Puis on vérifie s'il n'y a pas de messages d'erreur :
	if (empty($message)) {
			// On appelle la fonction prixLoc et on stocke son résultat dans une variable pour pouvoir l'afficher :
			$afficheResultat = prixLoc($_POST['categorie'], $_POST['nbJours']);	
	}
}

//------- AFFICHAGE -----
echo $message;
?>

<form method="post">
	<label>Choisissez une catégorie</label>
	<select name="categorie">
		<?php 
		foreach($categories as $key => $categorie) {
			echo "<option value=$categorie>catégorie $categorie</option>";
		}
		?>
	</select>

	<input type="text" name="nbJours" placeholder="nombre de jours">

	<input type="submit">
</form>
<?php
echo $afficheResultat;


 








