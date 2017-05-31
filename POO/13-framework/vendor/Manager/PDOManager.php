<?php


namespace Manager;
use PDO;

class PDOManager{

    private static $instance = NULL;
    protected $pdo; // Contiendra notre objet PDO(connexion à la BDD)

    private function __construct(){} // La classe n'est plus instanciable
    private function __clone(){} // La casse n'est plus clonable

    public static function getInstance(){
        if(!self::$instance){
            self::$instance = new self;
        }
        return self::$instance;
    }

    public function getPdo(){
        include_once(__DIR__ . '/../../app/Config.php');
        $config = new \Config;
        $connect = $config -> getParametersConnect();

        try{
            $this->pdo = new PDO('mysql:host=' . $connect['host']. ';dbname=' . $connect['dbname'], $connect['login'], $connect['password'], array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
        }
        catch(PDOException $e){
            echo '<div style="background: black; color:snow; padding:20px;">';
            echo 'Vous avez une erreur de connexion à la BDD : <br>';
            echo '<b><u>Message</u></b> : ' . $e -> getMessage();
            echo '<b><u>Fichier</u></b> : ' . $e -> getFile();
            echo '<b><u>Ligne</u></b> : ' . $e -> getLine();
            echo '</div>';
            exit;
        }
        return $this->pdo;
    }
}