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


/*
Commentaires :
    Pourquoi faire des getters et des setters ?
        - Le PHP est un langage qui ne type pas ses variables.
          Il faut systélatiquement controler l'intégrité des données renseignées.
        
        - Donc utiliser la visibilité PRIVATE est une très bonne contrainte.
          Tout dev' devra OBLIGATOIREMENT passer par le setter pour affecter une valeur,  et donc par les contrôles !
    
    Setter : Affecter une valeur
    Getter : Récupérer une valeur
    On aura autant de getter et setter que de propriétés private

    $this représente à l'intérieur de la classe l'objet en cours de manipulation.

*/ 