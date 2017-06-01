<?php

//src/Controller/ProduitController.php

namespace Controller;

use Controller\Controller;

class ProduitController extends Controller{

    public function afficheAll(){

        $produits = $this-> getRepository()-> getAllProduits();
        $categories = $this-> getRepository()-> getAllcategories();

        // $this->render();

        require(__DIR__ .'/../View/Produit/boutique.php');
    }


    public function affiche($id){
        $produits = $this-> getRepository()-> getProduitById($id);
        $suggestions = $this-> getRepository()-> getAllSuggestions($produits['categorie'], $produits['id_produit']);

        // $this->render();
        require(__DIR__ .'/../View/Produit/fiche_produit.php');
        

    }

    public function categorie($categorie){
        $produits = $this-> getRepository()-> getAllProduitsByCategorie($categorie);
        $categories = $this-> getRepository()-> getAllCategories();

        // $this->render();

        require(__DIR__ . '/../View/Produit/categorie.php');
        
        
    }


}