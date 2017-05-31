<?php

session_start();
require_once(__DIR__ . '/../vendor/autoload.php');

// TEST 1 : Entity Produit
$produit = new Entity\Produit;
$produit-> setTitre('Mon produit');
echo $produit-> getTitre();