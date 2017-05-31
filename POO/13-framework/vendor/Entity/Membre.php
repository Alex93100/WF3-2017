<?php

//   namespace MYSILEX\Entity; // Nous sommes dans l'espace Entity qui va contenir toutes nos entités.

  Class Membre {

    private $id_membre;
    private $pseudo;
    private $mdp;
    private $nom, $prenom, $email, $civilite, $ville, $code_postal, $adresse, $statut;

    /*
    *
    *  GETTERS
    *
    */

    public function getId_membre () {

      return $this -> id_membre;

    }

    public function getPseudo () {

      return $this -> pseudo;

    }

    public function getMdp () {

      return $this -> mdp;

    }

    public function getNom () {

      return $this -> nom;

    }

    public function getPrenom () {

      return $this -> prenom;

    }

    public function getEmail () {

      return $this -> email;

    }

    public function getCivilite () {

      return $this -> civilite;

    }

    public function getVille () {

      return $this -> ville;

    }

    public function getCode_postal () {

      return $this -> code_postal;

    }

    public function getAdresse() {

      return $this -> adresse;

    }

    public function getStatut () {

      return $this -> statut;

    }

    /*
    *
    *  SETTERS
    *
    */

    public function setId_membre ($id_membre) {

      return $this -> id_membre = $id_membre;

    }

    public function setPseudo ($pseudo) {

      return $this -> pseudo = $pseudo;

    }

    public function setMdp ($mdp) {

      return $this -> mdp = $mdp;

    }

    public function setNom ($nom) {

      return $this -> nom = $nom;

    }

    public function setPrenom ($prenom) {

      return $this -> prenom = $prenom;

    }

    public function setEmail ($email) {

      return $this -> email = $email;

    }

    public function setCivilite ($civilite) {

      return $this -> civilite = $civilite;

    }

    public function setVille ($ville) {

      return $this -> ville = $ville;

    }

    public function setCode_postal ($code_postal) {

      return $this -> code_postal = $code_postal;

    }

    public function setAdresse($adresse) {

      return $this -> adresse = $adresse

    }

    public function setStatut ($statut) {

      return $this -> statut = $statut;

    }


  } // FIN Class Membre

?>
