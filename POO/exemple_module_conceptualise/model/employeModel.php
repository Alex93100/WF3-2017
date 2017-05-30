<?php

require('../vendor/PDOManager.php');

class EmployesModel
{
	private $pdo;
	
	public function getDb(){
		$this -> pdo = PDOManager::getInstance() -> getPdo();
		return $this -> pdo;
	}
	
	public function getAllEmploye(){
		
		$resultat = $this -> getDb() -> query("SELECT * FROM employes");
		$employes = $resultat -> fetchAll(PDO::FETCH_ASSOC);
		
		if($employes){
			return $employes;
		}
		else{
			return FALSE;
		}
	}
}