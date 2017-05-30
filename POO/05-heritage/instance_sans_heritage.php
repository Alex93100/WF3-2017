<?php
// 05-heritage
    // instance_sans_heritage.php

class C{}

class A{

    public function bonjour(){
        return 'Bonjour !';
    }
}

// ----------------------

class B extends C{ // B n'h"rite pas de A !!!

    public $maVar;

    public function __construct(){
        $this->maVar = new A; // Au moment de l'instanciation de B, on met dans $maVar un objet de la classe A.
    }
}

// ----------------------

$b = new B;
echo $b->maVar->bonjour().'<br>';
//  revient à faire :
// $maVar = new A;
// $maVar->bonjour();
// $b->$maVar->bonjour();

/*
Commentaires :

    Nous avons un objet dans un objet, d'où l'utilisation de deux flèches successive. $x->y->methode();

    L'intérêt d'avoir une instance sans héritage (récupérer un objet dans la propriété d'une classe) est de pouvoir hériter d'une classe mère d'un coté,
    tout en ayant la possibilité de récupérer les éléments d'une autre classe en ùême temps.
*/