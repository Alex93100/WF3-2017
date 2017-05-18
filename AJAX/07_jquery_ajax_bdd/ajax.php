<?php

$pdo = new PDO('mysql:host=localhost;dbname=entreprise', 'root', '', array(PDO::ATTR_ERRMODE => PDO:: ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
$id_employes = 1;

if(isset($_POST['personne'])){
    $id_employes = $_POST['personne']; // on récupère l'argument fourni via post
}

$employes = $pdo->query("SELECT * FROM employes WHERE id_employes = $id_employes");

$information_employes = $employes->fetch(PDO::FETCH_ASSOC);

$tab = array(); // on prépare le tableau array qui contiendra la réponse.

$tab['resultat'] = '<table border="1"><tr>';
$tab['resultat'] .= '<th>'. implode('</th><th>', array_keys($information_employes)) .'</th></tr>';
$tab['resultat'] .='<tr>';
foreach ($information_employes as $valeur) {
    $tab['resultat'] .='<td>'. $valeur .'</td>';

}

$tab['resultat'] .='</tr>';
$tab['resultat'] .='</table>';

echo json_encode($tab); // la réponse