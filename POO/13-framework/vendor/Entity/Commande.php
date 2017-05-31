<?php

//   namespace MYSILEX\Entity; // Nous sommes dans l'espace Entity qui va contenir toutes nos entités.

  class Commande {

    private $id_commande;
    private $id_membre;
    private $montant;
    private $date_enregistrement;
    private $etat;

    /*
    *
    *  GETTERS
    *
    */

    public function getId_commande () {

      return $this -> id_commande;

    }

    public function getId_membre () {

      return $this -> id_membre;

    }

    public function getMontant () {

      return $this -> montant;

    }

    public function getDate_enregistrement () {

      return $this -> date_enregistrement;

    }

    public function getEtat () {

      return $this -> etat;

    }

    /*
    *
    *  SETTERS
    *
    */

    public function setId_commande ($id_commande) {

    $this -> id_commande = $id_commande;

    }

    public function setId_membre ($id_membre) {

    $this -> id_membre = $id_membre;

    }

    public function setMontant ($montant) {

    $this -> montant = $montant;

    }

    public function setDate_enregistrement ($date_enregistrement) {

    $this -> date_enregistrement = $date_enregistrement;

    }

    public function setEtat ($etat) {

    $this -> etat = $etat;

    }


  } // FIN Class Membre

?>
