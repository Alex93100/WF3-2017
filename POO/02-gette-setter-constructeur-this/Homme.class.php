<?php

// 02-gette-setter-constructeur-this
    // -> Homme.class.php

class Homme{
    private $prenom; // Propriété private
    private $nom; // Propriété private

}

// ----------------------------

$homme = new Homme;
// $homme->prenom = 'Alexandre'; // ERREUR : Propriété private donc innaccessible à l'extérieur de la classe
// echo $homme->prenom;