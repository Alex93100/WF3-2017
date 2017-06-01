<?php

session_start();
require_once(__DIR__ . '/../vendor/autoload.php');

if(isset($_GET['controller']) && !empty($_GET['controller']) && isset($_GET['action']) && !empty($_GET['action'])){

    $controller = 'Controller\\' . ucfirst($_GET['controller']) . 'Controller';

    if(file_exists(__DIR__ . '/../src/Controller/' . ucfirst($_GET['controller']). 'Controller.php')){

        $a = new $controller;
        $action = strtolower($_GET['action']);

        if(method_exists($a, $action)){

            if(isset($_GET['id'])){
                $id = (int) $_GET['id'];
                $a-> $action($id);
            }
            else{
                $a-> $action();
            }
        }
    }
}
else{
    $a = new Controller\ProduitController;
    $a->afficheAll();
    
}


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
// $pr = new Repository\ProduitRepository;

// // $produits = $pr-> getAllProduits();
// // $produits = $pr-> getProduitById(5);
// // $produits = $pr-> DeleteProduitById(5);
// // $produits = $pr-> getAllProduitsByCategorie('robe');
// // $produits = $pr-> getAllCategories();
// // $produits = $pr-> getAllSuggestions('pull', 5);

// echo '<pre>';
// print_r($produits);
// echo '</pre>';


// TEST 5 : ProduitController
// $pc = new Controller\ProduitController;

// $pc->afficheAll();
// $pc->affiche(5);
// $pc->categorie('robe');
