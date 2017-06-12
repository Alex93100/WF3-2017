<?php

namespace Controller;

use Silex\Application;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\Validator\RecursiveValidator;
use Twig_Environment;

abstract class ControllerAbstract { // classe qui ne sert qu'à être héritée
    /**
     *
     * @var Application2
     */
    protected $app;
    
    /**
     *
     * @var Twig_Environment
     */
    
    protected $twig;
    
    
    /**
     *
     * @var Session
     */
    protected $session;
    
    /**
     * 
     * @var RecursiveValidator
     */
    protected $validator;
    /**
     * 
     * @param Application2 $app
     */

    public function __construct(Application $app){
       
        $this->app = $app;
        $this->twig = $app['twig'];
        $this->session =$app['session'];
        $this->validator = $app['validator'];
       
       
    }
    
    /**
     * 
     * @param string $view
     * @param array $parameters
     * @return string
     */
    
    public function render($view, $parameters =[]){
        return $this->twig->render($view, $parameters);
        
    }
    
    /**
     * Redirige vers une autre page en lui passant le nom de la route
     * 
     * @param type $routeName
     * @param array $parameters
     * @return Response
     */
    
    public function redirectRoute($routeName, array $parameters = []){
        return $this->app->redirect(
            $this->app['url_generator']->generate($routeName, $parameters)
        ); 

    }
    
    public function addFlashMessage($message, $type = 'success'){
        $this->session->getFlashBag()->add($type, $message); 
    }
    
    
    /**
     * 
     * @param mixed $value
     * @param Constraint $constraint
     * @return bool
     */
    public function validate($value, Constraint $constraint){
        
        // retourne un tableau contenant les erreurs
        $errors = $this->validator->validate($value, $constraint);
       
        //s'il est vide, c'est que la valeur est valide
        return $errors->count() == 0;
    }
}