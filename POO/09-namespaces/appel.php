<?php
// 09-namespaces
    // appel.php

namespace General;

require('espace1.php');
require('espace2.php');

use Espace1;
use Espace2;
use PDO; // Lorsqu'on est dans un namespace dézfinie (general) et
// que l'on souhaite utiliser une classe existante dans l'espace global de PHP (ex : PDO ou Mysqli), alors on doit importer la clase avec l'instruction USE.

// De manière général on doit toujours importer (USE) les namespace dont on a besoin.


// use Espace1, Espace2; // Idem cela marche également

$c = new Espace1\A;
echo $c->test1() .'<br>';

$d = new Espace2\A;
echo $d->test2();

$pdo = new PDO('mysql:host=localhost;dbname=entreprise', 'root', '');