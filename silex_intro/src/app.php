<?php

use Silex\Application;
use Silex\Provider\AssetServiceProvider;
use Silex\Provider\DoctrineServiceProvider;
use Silex\Provider\TwigServiceProvider;
use Silex\Provider\ServiceControllerServiceProvider;
use Silex\Provider\HttpFragmentServiceProvider;

$app = new Application();
$app->register(new ServiceControllerServiceProvider());
$app->register(new AssetServiceProvider());
$app->register(new TwigServiceProvider());
$app->register(new HttpFragmentServiceProvider());
$app['twig'] = $app->extend('twig', function ($twig, $app) {
    // add custom globals, filters, tags, ...

    return $twig;
});

// Ajout doctrine DBAL
// on doit ensuite exécuter
// composer require "doctine/dbal:~2.2"
// en ligne de commande dans le répertoire de l'application

$app->register(new DoctrineServiceProvider(), 
    ['db.options'=> 
        ['driver'=> 'pdo_mysql','host'=>'localhost', 'dbname'=>'mvc',
            'user'=>'root','password'=>'','charset'=>'utf8',
        ]
    ]
);

return $app;
