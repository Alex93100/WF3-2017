<?php

use Repository\CategoryRepository;
use Silex\Application;
use Silex\Provider\AssetServiceProvider;
use Silex\Provider\DoctrineServiceProvider;
use Silex\Provider\HttpFragmentServiceProvider;
use Silex\Provider\ServiceControllerServiceProvider;
use Silex\Provider\TwigServiceProvider;

$app = new Application();
$app->register(new ServiceControllerServiceProvider());
$app->register(new AssetServiceProvider());
$app->register(new TwigServiceProvider());
$app->register(new HttpFragmentServiceProvider());
$app['twig'] = $app->extend('twig', function ($twig, $app) {
    // add custom globals, filters, tags, ...

    return $twig;
});

$app->register(new DoctrineServiceProvider(), 
    ['db.options'=> 
        ['driver'=> 'pdo_mysql','host'=>'localhost', 'dbname'=>'silex_blog',
            'user'=>'root','password'=>'','charset'=>'utf8',
        ]
    ]
);

$app['category.repository'] = function() use ($app){
    return new CategoryRepository($app['db']);
};

return $app;