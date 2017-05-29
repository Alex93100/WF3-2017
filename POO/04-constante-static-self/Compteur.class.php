<?php

//04-constante-static-self
	//-> Compteur.class.php
	
class Compteur
{
	public static $nbInstanceClass = 0; 
	public $nbinstanceObjet = 0; 
	
	public function __construct(){
		self::$nbInstanceClass ++; 
		$this -> nbInstanceObjet ++;
	}	
}
//-----------------------
$c1 = new Compteur; // NbInstanceClass = 1  // nbInstanceObjet = 1
$c2 = new Compteur; // NbInstanceClass = 2  // nbInstanceObjet = 1
$c3 = new Compteur; // NbInstanceClass = 3  // nbInstanceObjet = 1