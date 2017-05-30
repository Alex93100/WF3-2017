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
*/ 