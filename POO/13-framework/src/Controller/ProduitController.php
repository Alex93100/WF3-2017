<?php

//src/Controller/ProduitController.php

namespace Controller;

use Controller\Controller;

class ProduitController extends Controller{

    public function afficheAll(){

        $produits = $this-> getRepository()-> getAllProduits();
        $categories = $this-> getRepository()-> getAllcategories();

        // $this->render();

        $params = array(
            'produits' => $produits,
            'categories' => $categories,
            'title' => 'Bontique de mon site'
        );

        return $this->render('layout.html', 'boutique.html', $params);
    }


    public function affiche($id){
        $produits = $this-> getRepository()-> getProduitById($id);
        $suggestions = $this-> getRepository()-> getAllSuggestions($produits['categorie'], $produits['id_produit']);

        // $this->render();

        $params = array(
            'produits' => $produits,
            'suggestions' => $suggestions,
            'title' => 'Fiche produit -'. $produit['title']
        );
        return $this->render('layout.html', 'fiche_produit.html', $params);        

    }

    public function categorie($categorie){
        $produits = $this-> getRepository()-> getAllProduitsByCategorie($categorie);
        $categories = $this-> getRepository()-> getAllCategories();

        // $this->render();

        $params = array(
            'produits' => $produits,
            'categories' => $categories,
            'title' => 'Catégorie -'. $categorie
        );

        return $this->render('layout.html', 'categorie.html', $params);
        
        
    }


}