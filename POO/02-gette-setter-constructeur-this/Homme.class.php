<?php

// 02-gette-setter-constructeur-this
    // -> Homme.class.php

class Homme{
    private $prenom; // Propriété private
    private $nom; // Propriété private

    public function setPrenom($arg){
        if(!empty($arg) && is_string($arg) && strlen($arg) > 3 && strlen($arg) < 20){
            $this->prenom = $arg;
        }
    }

    public function getPrenom(){
        return $this->prenom;
    }

    public function setNom($arg){
        if(!empty($arg) && is_string($arg) && strlen($arg) > 3 && strlen($arg) < 20){
            $this->nom = $arg;
        }
    }

    public function getNom(){
        return $this->nom;
    }

}

// ----------------------------

$homme = new Homme;
// $homme->prenom = 'Alexandre'; // ERREUR : Propriété private donc innaccessible à l'extérieur de la classe
// echo $homme->prenom;

$homme->setPrenom('Alexandre');
echo 'Prénom : '. $homme-> getPrenom() . '<br>';

$homme->setNom('Rodrigues');
echo 'Nom : '. $homme-> getNom();