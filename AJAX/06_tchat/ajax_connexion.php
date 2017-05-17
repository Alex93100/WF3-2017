<?php
require_once("inc/init.inc.php");

$tab=array();
$tab['resultat'] = "";

// extract($_POST);

$mode = isset($_POST['mode']) ? $_POST['mode'] : '';

$pseudo = isset($_POST['pseudo']) ? $_POST['pseudo'] : '';
$mode = isset($_POST['civilite']) ? $_POST['civilite'] : '';
$mode = isset($_POST['vile']) ? $_POST['vile'] : '';
$mode = isset($_POST['date_de_naissance']) ? $_POST['date_de_naissance'] : '';
