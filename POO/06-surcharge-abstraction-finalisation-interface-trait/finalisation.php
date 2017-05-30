<?php
// 06-
    // finalisation.php

final class Application{ // Création d'une classe finale : signifiant qu'elle ne pourra pas être héritée

    public function run(){

        return 'L\'application se lance !'
    }
}

// -------------------

// class Extension extends Application{} // IMPOSSIBLE ! Une classe finale ne peut pas être hérité.

// -------------------

$app = new Application; // OK ! Une classe finale peut être instanciée
$app -> run();

class Application2{
    final public function run2(){ // Création d'une classe finale : signifiant qu'elle ne pourra pas être héritée
        return 'L\'application se lance !'
    }
}

class Extension2 extends Application2{ // OK, Application2 n'est pas final donc on peut en hériter
    public function run2(){}// ERREUR ! IMPOSSIBE de redéfinir ni de surcharger une méthode final.
}

/*
Commentaires :

    - Une classe finale ne peut pas être héritée
    - Une classe finale peut être instanciée
    - Une classe finale n'a forcément que des méthodes finales pusique par définition elle ne pourra être héritée, donc ses méthodes ne pourront être surchargées ou redéfinies.

    - Une méthode final peut être présente dans une classe "normale"
    - Une méthode final ne peut pas être surchargée ou redéfinie
*/ 