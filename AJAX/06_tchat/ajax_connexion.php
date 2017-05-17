<?php
require_once("inc/init.inc.php");

$tab=array();
$tab['resultat'] = "";
$tab['pseudo'] = "disponible";

$erreur = false; // variable de contrle en fin de script. Si sa valeur est passé à true alors il y a eu une erreur (exemple le pseudo indisponible)



// extract($_POST);

$mode = isset($_POST['mode']) ? $_POST['mode'] : '';

// action = condition ? condition vrai(if) : condition fausse(else)
$pseudo = isset($_POST['pseudo']) ? addslashes($_POST['pseudo']) : '';
$civilite = isset($_POST['civilite']) ? addslashes($_POST['civilite']) : '';
$ville = isset($_POST['ville']) ? addslashes($_POST['ville']) : '';
$date_de_naissance = isset($_POST['date_de_naissance']) ? addslashes($_POST['date_de_naissance']) : '';
// addslashes($string); // cette fonction prédéfinie php rajoute un antislash "\" devant chaque ' ou " dans la chaine


if($mode == "connexion"){
    //  traitement de la connexion/inscription
    // requete pour tester si le pseudo est déjà présent dans la BDD
    $resultat = $pdo->query("SELECT * FROM membre WHERE pseudo = '$pseudo'");
    $membre = $resultat->fetch(PDO::FETCH_ASSOC);
    if($resultat->rowCount() == 0){ // s'il n'y a pas de ligne alors le pseudo est libre car inexistant en BDD
        
        $time = time(); // on récupère le timestamp
        $pdo->query("INSERT INTO membre (pseudo, civilite, ville, date_de_naissance, ip, date_connexion) VALUES ('$pseudo', '$civilite', '$ville', '$date_de_naissance', '$_SERVER[REMOTE_ADDR]', '$time')");

        $tab['resultat'] = "membre enregistré !";

    }

}
echo json_encode($tab);