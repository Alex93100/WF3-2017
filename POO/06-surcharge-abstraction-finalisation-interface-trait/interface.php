<?php
// 06-
    // finalisation.php

interface Mouvement{

    public function start(); // Dans une interface les méthode n'ont pas de contenu
    public function turnRight();
    public function turnLeft();

}

class Bateau implements Mouvement{  // On n'utilise pas extends, mais implements dans le cadre des interface 

    public function start(){ // OBLIGATION de définir toutes les méthodes récupérées via l'implémentation de l'interface
    }
    public function turnRight(){

    }
    public function turnLeft(){

    }
}

class Avion implements Mouvement{
    public function start(){

    }
    public function turnRight(){

    }
    public function turnLeft(){

    }
}

/*
Commentaires :

    - Une interface est une liste de méthodes (sans contenu) qui permets de garantir que toites les classes qui vont implémenter l'interface
    contiendront les mêmes méthodes, et ces méthodes auront le même nom.

    C'est une sorte de contrat passé entre le dev' maître et les autres dev'.
    Plan de fabrication d'une classe.

    - Une interface n'est pas instanciable.
    - Une classe peut implémenter plusieurs interfaces
    - Une classe peut à la fois extends une autre classe et implémenter une ou plusieurs interface(s).
    - Les méthodes d'une interface doivent forcément être public sinon elles ne peuvent pas être définies.
*/
