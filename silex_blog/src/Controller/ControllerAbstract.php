<?php

namespace Controller;

use Silex\Application;

abstract class ControllerAbstract {

    /*
     * @var Application
     */
    protected $app;

    /*
     * @var \Twig_Environment
     */
    protected $twig;

    public function __construct(Application $app){
        $this->app = $app;
    $this->twig = $app['twig'];
    }
    
    /*
     * @param string $view
     * @param array $ parameters
     * @return string
     */
    public function render($view, $parameters = []){
        return $this->twig->render($view,$parameters);
    }
 
}
