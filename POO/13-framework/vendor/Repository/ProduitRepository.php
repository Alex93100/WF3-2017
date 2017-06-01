<?php

// vendor/Repository/ProduitRepository.php
namespace Repository;

use Manager\EntityRepository; // /!\ Très important car l'héritage ne permet pas de charger le fichier.
use PDO;

class ProduitRepository extends EntityRepository{

    // Tout le code de EntityRepository est ici !!!
    public function getAllProduits(){
        return $this->findAll();
    }

    public function getProduitById($id){
        return $this->find($id);
    }

    public function deleteProduitById($id){
        return $this->delete($id);
    }

    public function registerProduit($infos){
        return $this->register($infos);
    }

    //requete spécifiques à cette entité Produit : $

    public function getAllCategories(){
        $requete = "SELECT DISTINCT categorie FROM produit";
        $resultat = $this->getDb()->query($requete);

        $categories = $resultat->fetchAll(PDO::FETCH_ASSOC);

        if(!$categories){
            return FALSE;
        }
        else{
            return $categories;
        }
    }

    public function getAllProduitsByCategorie($categorie){
        $requete = "SELECT * FROM produit WHERE categorie = :categorie" ;
        $resultat = $this->getDb()->prepare($requete);
        $resultat->bindParam(':categorie', $categorie, PDO::PARAM_STR);
        $resultat->execute();

        $Produits = $resultat->fetchAll(PDO::FETCH_ASSOC);

        if(!$Produits){
            return FALSE;
        }
        else{
            return $Produits;
        }
    }


    public function getAllSuggestions($categorie, $id){
        $requete = "SELECT * FROM produit WHERE categorie = '$categorie' AND id_produit != '$id'";       

        $resultat = $this->getDb()->query($requete);

        $suggestions = $resultat->fetchAll(PDO::FETCH_ASSOC);

        if(!$suggestions){
            return FALSE;
        }
        else{
            return $suggestions;
        }
    }
}