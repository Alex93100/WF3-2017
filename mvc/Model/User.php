<?php
namespace Model;
use App\Cnx;

class User {
    
/**
* @var int
*/
    
    private $id;
    
/**
* @var string
*/

    private $lastname;
    /**...3 line */
    
    private $firstname;
    /**...3 line */

    private $email;
    /**...3 line */
    
    private $address;


    public function __construct(
        $id = null,
        $lastname = null,
        $firstname = null, $email = null, $address = null){
        
        $this->id = $id;
        $this->lastname = $lastname;
        $this->firstname = $firstname;
        $this->email = $email;
        $this->address = $address;
    }
    
/*
 * GET 
*/
    
    public function getId() {
        return $this->id;
    }

    public function getLastname() {
        return $this->lastname;
    }

    public function getFirstname() {
        return $this->firstname;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getAddress() {
        return $this->address;
    }

    
/*
 * SET
*/
    public function setId($id) {
        $this->id = $id;
        return $this;
    }

    public function setLastname($lastname) {
        $this->lastname = $lastname;
        return $this;
    }

    public function setFirstname($firstname) {
        $this->firstname = $firstname;
        return $this;
    }

    public function setEmail($email) {
        $this->email = $email;
        return $this;
    }

    public function setAddress($address) {
        $this->address = $address;
        return $this;
    }
    
    /**
     * Méthode qui retourne tous les utilisateurs enregistrés en bdd
     * @return array Un tableau d'objets User
    */
    
    public static function findAll(){
        $pdo = Cnx::getInstance();
        $query = 'SELECT * FROM user ORDER BY id';
        $stmt = $pdo->query($query);
        $dbUsers = $stmt->fetchAll();
        $users = [];
        
        foreach ($dbUsers as $dbUser) {
            $user = new self(
                $dbUser['id'],
                $dbUser['firstname'],
                $dbUser['lastname'],
                $dbUser['email'],
                $dbUser['address']
            );
            $users[] = $user;
        }
        return $users;
    }
}
