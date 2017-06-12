<?php

namespace Controller;

use Entity\User;

class UserController {
    public function registerAction(){
        
        $user = new User();
        
        if (!empty($_POST)){
            $user
                ->setLastname($_POST['lastname'])
                ->setLastname($_POST['firstname'])
                ->setLastname($_POST['email']);
        }
        $this->render('register.html.twig');
    }
}
