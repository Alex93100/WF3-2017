<?php

use Controller\IndexController;
use Controller\Admin\ArticleController;
use Controller\Admin\CategoryController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

//Request::setTrustedProxies(array('127.0.0.1'));

$app['index.controller'] = function () use ($app) {
    return new IndexController($app);
};

$app
    ->get('/', 'index.controller:indexAction')  
    ->bind('homepage');

$app
    ->get('/rubriques', 'index.controller:categoriesAction')  
    ->bind('categories');

$app['admin.category.controller'] = function () use ($app) {
    return new CategoryController($app);
};

$app
    ->get('admin/rubriques', 'admin.category.controller:listAction')  
    ->bind('admin_categories');

$app
    ->get('/rubriques/{id}', 'index.controller:categorieAction')
    ->assert('id', '\d+')
    ->bind('categories');

$app
    ->match('admin/rubriques/edition/{id}', 'admin.category.controller:editAction') //match accepte plusieurs méthodes, nomtamment get et post
    ->value('id', null) // valeur par défaut (null) pour le paramètre (id) de la route
    ->bind('admin_category_edit');

$app
    ->match('admin/rubriques/suppression/{id}', 'admin.category.controller:deleteAction') //match accepte plusieurs méthodes, nomtamment get et post
    ->bind('admin_category_delete');


/*
 * Créer la partie admin pour les articles :
 * - Créer le contrôleur Admin\ArticleController
 * - le définir en service
 * - on y ajoute la méthode listAction à vide
 * - puis la route qui ponte dessus
 * - on ajoute le lien vers cette route dans la navbar admin
 * - on crée l'entity Article et le repository Article Repository
 * - on remplit la méthode listAction du contrôleur en utilisant ArticleRepository
 * - on crée la vue qui affiche les articles dans un tableau html
 */

$app['admin.article.controller'] = function () use ($app) {
    return new ArticleController($app);
};

$app
    ->get('admin/articles', 'admin.article.controller:listAction')  
    ->bind('admin_articles');

$app
    ->match('admin/articles/edition/{id}', 'admin.article.controller:editAction') //match accepte plusieurs méthodes, nomtamment get et post
    ->value('id', null) // valeur par défaut (null) pour le paramètre (id) de la route
    ->assert('id', '\d+')
    ->bind('admin_article_edit');

$app
    ->match('admin/articles/suppression/{id}', 'admin.article.controller:deleteAction') //match accepte plusieurs méthodes, nomtamment get et post
    ->bind('admin_article_delete');

$app->error(function (Exception $e, Request $request, $code) use ($app) {
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