<?php
require_once("inc/init.inc.php");


$tab= array();
$tab['resultat'] = '';

$mode = isset($_POST['mode']) ? $_POST['mode'] : '';
$arg = isset($_POST['arg']) ? $_POST['arg'] : '';

if($mode == 'liste_membre_connecte' && empty($arg)){

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
    
        // $position = strpos($arg, ":");
        // $arg = substr($arg, $position);
        // Alexandre > Bonjour à tous
        // Bonjour à tous

        $arg = addslashes($arg); // met un \ devant les ' et les "

        // enregistrement du message
        $pdo->query("INSERT INTO dialogue(id_membre, message, date) VALUES ($_SESSION[id_membre], '$arg', NOW())");
        $tab['resultat'] .= "Message enregistré";
    }
}
elseif($mode == "message_tchat"){

    // recupérer tous les message de la table dialogue
    $messages = $pdo->query("SELECT membre.pseudo, membre.civilite, dialogue.message FROM dialogue, membre WHERE membre.id_membre = dialogue.id_membre ORDER by dialogue.date");
    
    // traitement de l'objet resultat avec un while pour placer la reponse dans $tab['resultat']
    while($message = $messages->fetch(PDO::FETCH_ASSOC)){
        if($message['civilite'] == 'm'){

            $tab['resultat'] .= '<p class="bleu">'.ucfirst($message['pseudo']).' : '.$message['message'].'</p>';
        }
        else{
            $tab['resultat'] .= '<p class="rose">'.ucfirst($message['pseudo']).' : ' .$message['message'].'</p>';
        }
    }
    //$tab['resultat'] .= '<p>Alexandre> Premier message </p>'
    //$tab['resultat'] .= '<p>Alexandre> Deuxième message </p>'
}

elseif($mode == 'liste_membre_connecte' && !empty($arg)){
    // Si $arg n'ets pas vide alors on a un pseudo et nous devons le retirer du fichier prenom.txt
    $contenu = file_get_contents('prenom.txt'); // On récupère le contenu du ficher prenom.txt dans la variable $contenu
    $contenu = str_replace($arg, "", $contenu); // On remplace le pseudo par rien

    file_put_contents('prenom.txt',$contenu); //On écrase l'ancien contenu par le nouveau ou l'on a supprimé le pseudo concerné

}
echo json_encode($tab);