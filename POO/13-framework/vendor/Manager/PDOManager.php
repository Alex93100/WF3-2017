<?php


namespace Manager;
use PDO;

class PDOManager{

    private static $instance = NULL;
    protected $pdo // Contiendra notre objet PDO(connexion à la BDD)

    private function __construct(){} // La classe n'est plus instanciable
    private function __clone(){} // La casse n'est plus clonable

    public function getInstance(){
        if(!self::$instance){
            self::$instance = new self;
        }
        return self::$instance;
    }

    public function getPdo(){
        include_once(__DIR__ . '/../../app/Config.php');
        $config = new Config;
        $connect = $config -> getPdoarametersConnect();

        try{

        }
        catch(){
            
        }
    }
}