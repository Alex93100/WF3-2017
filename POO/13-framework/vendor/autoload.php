<?php

//vendor/autoload.php

class Autiload{
    public static function className(){



    }
}

// ------------------------------
spl_autoload_register(array('autoload', 'className'));
// ------------------------------

// En POO, spl_autoload_register() a besoin du nom de la classe et de la méthode à) éxécuter. On passe donc un array.

// Attention, notre méthode doit OBLIGATOIREMENT être static !