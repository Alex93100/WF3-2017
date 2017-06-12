<?php

namespace Controller;

use Entity\User;
use Symfony\Component\Validator\Constraints as Assert;

class UserController extends ControllerAbstract{
    public function registerAction(){
        
        $user = new User();
        $errors = [];
        
        if (!empty($_POST)){
            
            //Validation
            
            if(!$this->validate($_POST['lastname'], new Assert\NotBlank())){
                $errors['lastname'] = 'Le nom est obligatoire';
            }
            
            if(!$this->validate($_POST['firstname'], new Assert\NotBlank())){
                $errors['firstname'] = 'Le prénom est obligatoire';
            }
            
            if(!$this->validate($_POST['email'], new Assert\NotBlank())){
                $errors['email'] = 'L\'email est obligatoire';
            }
            elseif(!$this->validate($_POST['email'], new Assert\Email())){
                $errors['email'] = 'L\'email n\'est pas valide';
            }
            
            if(!$this->validate($_POST['password'], new Assert\NotBlank())){
                $errors['password'] = 'Le mot de passe est obligatoire';
            }
            
            if(empty($errors)){
            
                $user
                    ->setLastname($_POST['lastname'])
                    ->setFirstname($_POST['firstname'])
                    ->setEmail($_POST['email'])
                    ->setPassword($this->app['user.manager']->encodePassword($_POST['password']));

                $this->app['user.repository']->insert($user);
                $this->app['user.manager']->login($user);

                return $this->render('homepage');
            }
            else{
                $msg = '<strong>Le formulaire contient des erreurs</strong>';
                $msg .= '<br>- ' .implode('</br>- ',$errors);
                
                $this->addFlashMessage($msg, 'error');
            }
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
