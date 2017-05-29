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

// -----------------------------

$panier = new Panier; // Instanciation. $panier représente un objet de la classe Panier.

echo '<pre>'; var_dump($panier);'</pre>';
var_dump(get_class_methods($panier));

$panier->nbProduit = 5;

echo 'Nombre de produit : '. $panier->nbProduit .'<br>';

echo '<pre>'; var_dump($panier); '</pre>';

echo 'Panier : ' . $panier->ajouterProduit() . '<br>';
// echo 'Panier : ' . $panier->retirerProduit() . '<br>'; // ERREUR : Impossible d'accéder à un élément protected à l'extérieur de la classe.

// echo 'Panier : ' . $panier->affichageProduit() . '<br>'; // ERREUR : Impossible d'accéder à un élément private à l'extérieur de la classe.

$panier2 = new Panier;

echo '<pre>';var_dump($panier2);'</pre>';

/*
Commentaires :
    New: Est un mot clé qui permet de créer un objet issu d'une classe (instanciation)

    On peut créer plusieurs objets d'une même classe. 
    Et lorsqu'on affecte une valeur à une propriété d'un objet cela n'a pas d'incidence sur les autres objets de la classe.

    Niveaux de visibilité :
        -public : Accessible de partout !
        -proteced : Accessible depuis la classe où l'élément à été déclaré ainsi que depuis les classes héritières.
        -private : Accessible UNIQUEMENT depuis la classe où l'élément à été déclaré.
*/ 