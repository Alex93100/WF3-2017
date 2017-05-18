<?php
require_once("inc/init.inc.php");

$tab= array();
$tab['resultat'] = '';

$mode = isset($_POST['mode']) ? $_POST['mode'] : '';
$arg = isset($_POST['arg']) ? $_POST['arg'] : '';

if($mode == 'liste_membre_connecte'){

    // récupérez le contenu du fichier prenom.txt(file())
    // placer dans $tab['resultat'] le contenu de fichier sous la forme '<p>pseudo1</p><p>pseudo2</p>'
    $prenom = file("prenom.txt");
    foreach($prenom as $valeur){
        $tab['resultat'] .= '<p>'. $valeur .'</p>';
    }
}
elseif($mode == 'postMessage'){
    // On test s'il y a bien un message à enregistrer'
    $arg = trim($arg); // On enlève les espace avant et après la chaine ainsi que si le message ne possède que des espaces.
    if(!empty($arg)){ // Si le message n'est pas vide. Alors on lance un insert into
    
        $position = strpos($arg, ">");
        $arg = substr($arg, $position);
        // Alexandre > Bonjour à tous
        // Bonjour à tous

        // enregistrement du message
        $pdo->query("INSERT INTO dialogue(id_membre, message, date) VALUES ($_SESSION[id_membre], '$arg', NOW())");
        $tab['resultat'] = "Message enregistré";
    }
}
elseif($mode == "messsage_tchat"){

    // recupérer tous les message de la table dialogue
    // traitement de l'objet resultat avec un while pour placer la reponse dans $tab['resultat']

}
echo json_encode($tab);