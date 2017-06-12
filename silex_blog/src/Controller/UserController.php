<?php

namespace Controller;

use Entity\User;

class UserController extends ControllerAbstract{
    public function registerAction(){
        
        $user = new User();
        
        if (!empty($_POST)){
            $user
                ->setLastname($_POST['lastname'])
                ->setFirstname($_POST['firstname'])
                ->setEmail($_POST['email'])
                ->setPassword($this->app['user.manager']->encodePassword($_POST['password']));
            $this->app['user.repository']->insert($user);
        }
        
        return $this->render('register.html.twig');
    }
    
    public function loginAction(){
        
        $email = '';
        
        if(!empty($_POST)){
            $email = $_POST['email'];
            
            $user = $this->app['user.repository']->findByEmail($email);
            
            if(!is_null($user)){
                
                if ($this->app['user.manager']->verifyPassword($_POST['password'], $user->getPassword())){
                    $this->app['user.manager']->login($user);
                    
                    return $this->redirectRoute('homepage');
                }
            }
            $this->addFlashMessage('Identification incorrecte', 'error');
        }
        return $this->render('login.html.twig', ['email'=>$email]);
    }
    
    public function logoutAction(){
        $this->app['user.manager']->logout();
        return $this->redirectRoute('homepage');
    }
}
