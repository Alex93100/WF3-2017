<?php

//04-constante-static-self
	//-> Singleton.php

// Design Pattern : Littéralement "Patron de conception", est une réponse donné à un problème que rencontre plusieurs (tous) développeurs
// Le singleton est la réponse à la question : Comment créer une classe qui ne sera instanciable qu'une seul et unqiue fois.

 class Singleton{
    private static $instance = NULL;
    private function __construct(){ // Fonction private donc notre classe n'est plus instanciable.
        
    }
    private function __clone(){ // Fonction private donc la classe n'est pas clonable.

    }

    public static function getInstance(){
        if(!self::$instance){
            self::$instance = new Singleton; // Je mets dans la propriété $instance un objet de la classe self/Singleton
        }
        return self::$instance
    }
 }

//  $singleton = new Singleton; // IMPOSSIBLE d'instancier notre classe.
$objet = Singleton::getInstance(); //$objet est le seul et unique objet de cette classe Singleton !!!