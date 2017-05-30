<?php
// 05-heritage
    // heritage_sens.php

//  Transitivité : Si une classe B hérite d'une classe A et qu'une classe C hérite de la classe B, alors C hérite de A.

class A{

    public function testA(){
        return 'Test A';
    }
}

// -------------------

class B extends A{

    public function testB(){
        return 'Test B';
    }
}

// -------------------

class C extends B{

    public function testC(){
        return 'Test C';
    }
}

// -------------------

$c = new C;
echo $c->testA().'<br>'; // Méthode de A accessible par C (héritage indirect)
echo $c->testB().'<br>'; // Méthode de B accessible par C (héritage direct)
echo $c->testC().'<br>'; // Méthode de C accessible par C

var_dump(het_class_methods($c)); // Affiche les 3 méthodes, car elles appartiennent toutes à C

/*
Commentaires :

    Transitivité: 
        Si B hérite de A
            Et que C hérite de B ...
                ... alors C hérite de A
        Les méthodes protected de A sont également disponibles dans C, m^éme si l'héritage est indirect.

    L'héritage est :
        - non reflexif: class D extends D : Une classe ne peut pas hériter d'elle-même.
        - non syméttique : Si class F extends E, alors E n'est pas extends de F automatiquement.
        - Sans cycle : Si class F extends E, alors il est impossible que E extends F.
        - non multiple : Class N extends M, P : IMPOSSIBLE en PHP. Pas d'héritage multiplee en PHP !!!

        Une classe parent peut avoir un nombre infini d'héritiers.
*/