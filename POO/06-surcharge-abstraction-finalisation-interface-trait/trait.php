<?php
// 06-
    // trait.php

// Attention : Les traits ne fonctionnent que depuis PHP 5.4

trait TPanier{
    public $nbProduit = 1;

    public function affichageProduits(){
        return 'Affichage des produits dans le panier';
    }
}

// ------------------

trait TMembre{

    public function affichageMembres(){
        return 'Affichage des membres';
    }
}

// ------------------

class Site{

    use TPanier, TMembre;
    //  Use permets d'importer le code contenu dans un ou plusieurs trraits.
}

// ------------------

$site = new Site;
echo $site->affichageProduits() . '<br>';
echo $site->affichageMembres() . '<br>';


/*
Commentaires :

    - Les traits permettent d'importer du code dans une classe
    - Ils ont été inventés pour repousser l'héritage non multiple
    - Les traits permettent d'importer du code dans une classe
*/ 