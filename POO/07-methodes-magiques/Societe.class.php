<?php

// 07-methodes-magiques
    // -> societe.class.php

class Societe{

    public $adresse;
    public $ville;
    public $cp;

    public function __construct(){}

    public function __set($nom, $valeur){ // s'éxécute au moment où on essaie d'affecter une valeur à une propriété qui n'existe pas.
        echo '<p>Désolé, mais la propriété ' . $nom . ' n\'existe pas dans cette classe ! Donc la valeur ' . $valeur . ' n\'a pas pu être affectée !</p>';
    }

    public function __get($nom){
        echo '<p>Désolé, mais la propriété ' . $nom . ' n\'existe pas dans cette classe !</p>';
    }

    /*
        __call() = quand j'appelle une méthode qui n'existe pas.
        __callstatic() = quand j'appelle une méthode qui n'existe pas et qui est static.
        __isset() = quand on fait une condition isset ou empty sur une propriété de mon objet
        __destruct() = s'éxécute quand le script est terminé (pratique pour ferme une connexion à la BDD) 
        __toString() = se lance quand on essaie de faire n echo sur un objet
        __wakeup(), __sleep(), __invoke(), __clone()...
    */ 
}

// ----------------------------

$societe = new Societe;

// $societe-> pays = 'France';
echo $societe-> titre;