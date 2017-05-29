<?php

// 01-class-objet-instance-visibilité
    // -> Panier.class.php

class Panier{
    public $nbProduit; // Propriété (variable)

    public function ajouterProduit(){
        // traitement de la méthode
        return 'L\'article a bien été ajouté au panier !';
    }

    protected function retirerProduit(){
        return 'L\'article a été retiré du panier !';
    }

    private function affichageProduit(){
        return 'Voici les produits dans le panier !';
    }

}