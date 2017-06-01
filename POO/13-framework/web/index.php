<?php

session_start();
require_once(__DIR__ . '/../vendor/autoload.php');

// TEST 1 : Entity Produit
// $produit = new Entity\Produit;
// $produit-> setTitre('Mon produit');
// echo $produit-> getTitre();

// TEST 2 : PDOManager
// $pdom = Manager\PDOManager::getInstance();
// $resultat = $pdom->getPdo()->query("SELECT * FROM produit");
// $produits = $resultat->fetchAll(PDO::FETCH_ASSOC);
// echo '<pre>';
// print_r($produits);
// echo '</pre>';


// TEST 3 : EntityRepository;

// $er = new Manager\EntityRepository;

// $resultat = $er->findAll(5);
// $resultat = $er->find(5);
// $resultat = $er->delete(5);

// $produit = array(
//     "id_produit" => NULL,
//     "reference" => "dqsdqsd",
//     "categorie" => "robe",
//     "titre" => "dqsdqsd",
//     "prix" => "25",
//     "taille" => "M",
//     "stock" => "15",
//     "public" => "f",
//     "photo" => "dqsdqsd.jpg",
//     "couleur" => "blanc",
//     "description" => "dqsdqsddqsdqsddqsdqsddqsdqsddqsdqsddqsdqsddqsdqsd",
// );

// $resultat = $er->register($produit);
// echo '<pre>';
// print_r($resultat);
// echo '</pre>';


// TEST 4 : ProduitRepository
$pr = new Repository\ProduitRepository;

// $produits = $pr-> getAllProduits();
// $produits = $pr-> getProduitById(5);
// $produits = $pr-> DeleteProduitById(5);
// $produits = $pr-> getAllProduitsByCategorie('robe');
// $produits = $pr-> getAllCategories();
// $produits = $pr-> getAllSuggestions('pull', 5);

echo '<pre>';
print_r($produits);
echo '</pre>';
