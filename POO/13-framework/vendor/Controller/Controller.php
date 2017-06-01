<?php 

// vendor/Controller/Controller.php

namespace Controller;
use Repository;

class Controller{

    protected $repository; // Contiendra un objet de ProduitRepository, ou MembreRepository ou CommandeRepository etc... en fonction de l'entité dans laquelle je suis (produitController, ou MembreController ou Commandecontroller...)

    public function getRepository(){
        // exemple : je suis dans Controller\ProduitController, et je veux un Repository\ProduitRepository

        $class = 'Repository\\' . str_replace(array('Controller\\', 'Controller'), '', get_called_class()). 'Repository';
        // Controller\ProduitController
        // Produit
        // Repository\ProduitRepository

        $this->repository = new $class;
        // $this->repository = new Repository\ProduitRepository

        return $this-> repository;
    }

}