<?php

//vendor/autoload.php

class Autiload{
    public static function className($nom_de_la_classe){
        // $pc = new Controller\ProduitController;
        // require 'Controller\ProduitController.php';

        $tab = explode('\\', $nom_de_la_classe);

        if($tab[0] == 'Controller'){
            $path = __DIR__ . '/../src/' . implode ('/', $tab) . '.php';
        }
        else{
            $path = __DIR__ . '/' . implode ('/', $tab) . '.php';
        }
        require $path;

        echo '<pre>Autoload : ' . $nom_de_la_classe . '<br>';
        echo '=> ' . $path . '</pre><hr>';
    }
}

// ------------------------------
spl_autoload_register(array('autoload', 'className'));
// ------------------------------

// En POO, spl_autoload_register() a besoin du nom de la classe et de la méthode à) éxécuter. On passe donc un array.

// Attention, notre méthode doit OBLIGATOIREMENT être static !