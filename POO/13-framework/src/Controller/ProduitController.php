<?php

//src/Controller/ProduitController.php

namespace Controller;

use Controller\Controller;

class ProduitController extends Controller{

    public function afficheAll(){

        $produits = $this-> getRepository()-> getAllProduits();
        $categories = $this-> getRepository()-> getAllcategories();

        // $this->render();

    }

    public function affiche($id){
        $produits = $this-> getRepository()-> getProduitById($id);
        $suggestions = $this-> getRepository()-> getAllSuggestions($produits['categorie'], $produits['id_produit']);

        // $this->render();

    }

    public function categorie($categorie){
        $produits = $this-> getRepository()-> getAllProduitsByCategorie($categorie);
        $categories = $this-> getRepository()-> getAllCategories();

        // $this->render();
        
    }


}