<?php

// 05-heritage
    // animal.php

class Animal{

    protected function deplacement(){
        return 'Je me déplace';
    }

    public function manger(){
        return 'Je mange';        
    }
}

// -------------------------------
class Elephant extends Animal{

    // Tout le code de Animal est ici ! 

    public function quiSuisJe(){
        return 'Je suis un élephant et '. $this->deplacement();
        // Je peux appeler la méthode deplacement() avec $this car en tant que méthode protected elle est accessible dans la classe où elle est déclarée et dans les classe héritère.
    }

}

// -------------------------------

class Chat extends Animal{



}