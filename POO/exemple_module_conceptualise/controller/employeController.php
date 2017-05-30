<?php

require('../model/EmployeModel.php');

class EmployesController
{
	public $model;
	
	public function __construct(){
		$this -> model = new EmployesModel;
	}
	
	public function afficheEmployes(){
		$employes = $this -> model -> getAllEmploye();
		require('../view/employeView.php');
	}
}
//-----------

$app = new EmployesController;
$app -> afficheEmployes();




