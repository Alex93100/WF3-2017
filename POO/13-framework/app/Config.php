<?php

// app/Config.php

class Config{

    protected $parameters;

    public function __construct(){
        require __DIR__ . '/Config/parameters.php';
        $this->parameters = $parameters;
        // A l'instanciation de Config, on récupère les parameters déclarées dans parameters.php et on les stock dans notre propriété $parameters.
    }

    public function getParametersConnect(){
        return $this->parameters['connect'];
        // Cette méthode va retourner seulement la partie 'connect' de mes parametres
    }
}