<?php

namespace Controller;

class IndexController extends ControllerAbstract{
    public function indexAction(){
        return $this->render('index.html.twig');
    }
    
    public function categoriesAction(){
        $categories = $this->app['category.repository']->findAll();
        
        return $this->render('categories.html.twig', ['categories'=>$categories]);
    }
}
