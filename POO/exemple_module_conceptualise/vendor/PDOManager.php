<?php

class PDOManager
{
	private static $instance = NULL; 
	private $pdo; // Connexion BDD
	
	private function __construct(){} 
	private function __clone(){}
	
	public static function getInstance(){
		if(is_null(self::$instance)){
			self::$instance = new self;
		}
		return self::$instance; 
	}
	
	public function getPdo(){
		require('parameters.php');
		
		$this -> pdo = new PDO('mysql:host=' . $parameters['host'] . ';dbname=' . $parameters['dbname'], $parameters['login'], $parameters['password']); 
		return $this -> pdo;
	}
}

