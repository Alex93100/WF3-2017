<?php

// 05-heritage
    // exemple_heritage.php

class Membre{
    public $id_membre;
    public $perso;
    public $email;

    public function inscription(){
        return 'Je m\'inscris !';
    }

    public function connexion(){
        return 'Je me connecte !';
    }
}
// -------------------------------

class Admin extends Membre{ // extends signifie "Hérite de "

    // Tout le code de Membre est ici ! 

    public function accesBackOffice(){
        return 'J\'ai accès au backOffice';
    }
}

// -------------------------------

$admin = new Admin;
echo $admin->inscription() .'<br>';
echo $admin->connexion() .'<br>';
echo $admin->accesBackOffice() .'<br>';


/*
Commentaires :
    Dans notre site, un Admin est avant tout un membre, avec quelques fonctionnalités supplémentaires(acces backOffice, suppression de membre etc.)
    Il est donc naturel que la classse Admin soit héritière (extends) de la classe Membre et qu'on ne ré-écrive pas tout le code.
*/ 