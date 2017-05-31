<?php

namespace Manager;
use PDO;

class EntityRepository{

    private $bd; //contendra la connexion à la BDD (objet PDO, récupéré grâce à PDOManager)

    public function getDb(){
        $this->db = PDOManager::getInstance()->getPdo();
        return $this->db;
    }

    public function getTableName(){
        // Objectif : récupérer le nom de la table à interroger selon l'entré dans laquelle je suis...

        //get_called_class(): me retourne le nom de la classe dans laquelle je suis.
        // exmple: Repository\ProduitRepository

        // return strtolower(str_replace(array('Repository\\', 'Repository'), '', get_called_class()));
        return 'produit';
    }

    public function findAll(){
        $requete = "SELECT * FROM ".$this->getTableName();
        $resultat = $this->getDb()->query($requete);

        $donnees = $resultat->fetchAll(PDO::FETCH_ASSOC);
        
        if(!$donnees){
            return FALSE;
        }
        else{
            return $donnees;
        }
    }

    public function find($id){
        $requete = "SELECT * FROM " . $this->getTableName() . " WHERE id_" . $this->getTableName() ."= :id";

        // SELECT * FORM produit WHERE id_produit = :id;
        // SELECT * FORM produit WHERE id_membre = :id;
        
        $resultat = $this->getDb()->prepare($requete);
        $resultat-> bindParam(':id', $id, PDO::PARAM_INT);
        $resultat->execute();

        $donnee = $resultat -> fetch(PDO::FETCH_ASSOC);

        if(!$donnee){
            return FALSE;
        }
        else{
            return $donnee;
        }
    }

    public function delete($id){
        $requete = "DELETE FROM " . $this->getTableName() . "WHERE id_" . $this->getTableName() ."= :id";

        $resultat = $this->getDb()->prepare($requete);
        $resultat-> bindParam(':id', $id, PDO::PARAM_INT);
        $resultat->execute();

        return $resultat;       
    }

    public function register($infos){
        $requete = 'INSERT INTO ' . $this->getTableName() . ' (' . implode(',',array_keys($infos)) . ') VALUES (' . ":". implode(",:", array_keys($infos)) . ')';

        $resultat = $this->getDb()->prepare($requete);
        $resultat->execute($infos);
        if(!$resultat){
            return FALSE;
        }
        else{
            return $this->getDb()->lastInsertId();
        }
    }







} // FIn EntityRepository