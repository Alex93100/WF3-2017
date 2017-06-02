<?php

require_once '../App/autoload.php';

use Lib\Router;
use Lib\ViewRenderer;

$viewRenderer = ViewRenderer::getInstance();

$viewRenderer
            ->setViewDir('../views/')
            ->setLayoutPath('../views/layout.views.php');

$router = Router::getInstance();

$router
        ->setPrefix('/mvc/web/')
        ->addRoute('home','utilisateurs','user','list')
        ->addRoute('user_edit','utilisateurs/edition','user','edit')
        ->run();