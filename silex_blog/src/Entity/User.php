<?php


namespace Entity;


class User {

    
    /*
     * @var int
     */
    private $id;
    
    /*
     * @var string
     */
    private $firstname;
    
    /*
     * @var string
     */
    private $lastname;
    
    /*
     * @var string
     */
    private $email;
    
    /*
     * @var string
     */
    private $password;
    
    /*
     * @var string
     */
    private $role;
    
    public function getId() {
        return $this->id;
    }

    public function getFirstname() {
        return $this->firstname;
    }

    public function getLastname() {
        return $this->lastname;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getPassword() {
        return $this->password;
    }

    public function getRole() {
        return $this->role;
    }

    public function setId($id) {
        $this->id = $id;
        return $this;
    }

    public function setFirstname($firstname) {
        $this->firstname = $firstname;
        return $this;
    }

    public function setLastname($lastname) {
        $this->lastname = $lastname;
        return $this;
    }

    public function setEmail($email) {
        $this->email = $email;
        return $this;
    }

    public function setPassword($password) {
        $this->password = $password;
        return $this;
    }

    public function setRole($role) {
        $this->role = $role;
        return $this;
    }


}
