<?php

use Controller\FirstController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

//Request::setTrustedProxies(array('127.0.0.1'));

$app->get('/', function () use ($app) {
    return $app['twig']->render('index.html.twig', array());
})
->bind('homepage');

$app->get('/hello', function() use ($app){
    return $app['twig']->render('hello.html.twig');
})
->bind('hello');
/*
 * name est une variable dans l'url,
 * passée à la fonction anonyme qui sert de contrôleur
 * puis à la vue dans la méthode render de twig
 */
$app->get('/hello/{name}', function($name) use ($app){
    return $app['twig']->render('hello_world.html.twig',['name'=> $name]);
})
->bind('hello_world');

$app->get('/twig', function() use ($app){
    return $app['twig']->render('twig.html.twig', ['myvar'=>'Ma variable ']);
})
->bind('twig');

// déclaration du contrôleur en service dans l'application
$app['first.controller'] = function(){
  return new FirstController();
};

// utilisation du contrôleur dans une route
$app
    ->get('/test', 'first.controller:testAction')
    ->bind('test');

// $namesera passé à la méthode testParamAction
$app
    ->get('/test/{name}', 'first.controller:testParamAction')
    ->bind('test_param');

$app
    ->get('/users', 'first.controller:usersAction')
    ->bind('users');

$app
    ->get('/user/{userId}', 'first.controller:userAction')
    ->bind('user');

$app->error(function (\Exception $e, Request $request, $code) use ($app) {
    if ($app['debug']) {
        return;
    }

    // 404.html, or 40x.html, or 4xx.html, or error.html
    $templates = array(
        'errors/'.$code.'.html.twig',
        'errors/'.substr($code, 0, 2).'x.html.twig',
        'errors/'.substr($code, 0, 1).'xx.html.twig',
        'errors/default.html.twig',
    );

    return new Response($app['twig']->resolveTemplate($templates)->render(array('code' => $code)), $code);
});
