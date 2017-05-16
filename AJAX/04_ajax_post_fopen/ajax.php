<?php

$email = "";
if(isset($_POST['email'])){
    $email = $_POST['email'];
}

 if(!empty($_POST)){ // si le formulaire est posté

                    if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
                        $contenu .= '<div class="bg-danger">L\'email est invalide</div>';                        
                    }
 }

// création ou ouverture d'un fichier via la fonction fopen
// en mode a php crée le fichier s'il n'existe pas sinon il ne fais que l'ouvrir.
// http://php.net/manual/fr/function.fopen.php

$f = fopen("email.txt", "a");
fwrite($f, $email . "\n"); // \n permet le retour à la ligne dans un fichier. Il doit etre entre "" sinon il ne sera pas interprété.

$tab = array();
$tab['resultat'] = '<h2>Confirmation de l\'inscription</h2>';

$liste = file("email.txt"); // la fonction file() place chaque ligne du fichier précisé en argument dans un tableau array.

$tab['resultat'] .= '<p>Voici la liste de tous les inscrit</p>';

$tab['resultat'] .= '<ul>';
foreach($liste as $valeur){
    $tab['resultat'] .= '<li>' . $valeur . '</li>';
}
$tab['resultat'] .= '</ul>';

echo json_encode($tab);
