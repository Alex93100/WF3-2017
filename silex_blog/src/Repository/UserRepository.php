<?php

namespace Repository;

use Entity\User;


class UserRepository extends RepositoryAbstract{
    
    public function insert(User $user){
        $this->db->insert('user',
            ['lastname'=> $user->getLastname(), 'firstname' => $user->getFirstname(),
                'email' => $user->getEmail(), 'password'=> $user->getPassword(),
            ]);
    }
    
    public function findByEmail($email){
        $dbUser = $this->db->fetchAssoc('SELECT * FROM user WHERE email = :email', [':email'=> $email]);
    
        if(!empty($dbUser)){
            $user = new User();
            
            $user
                ->setLastname($dbUser['lastname'])
                ->setFirstname($dbUser['firstname'])
                ->setEmail($dbUser['email'])
                ->setPassword($dbUser['password'])
                ->setRole($dbUser['role']);
                    
            return $user;
        }
     return null;   
    } 
}
