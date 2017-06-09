<?php

namespace Controller;

class IndexController extends ControllerAbstract{
    public function indexAction(){
        
        $articles = $this->app['article.repository']->findAll();
        return $this->render('index.html.twig', ['articles' => $articles]);
    }
    
     public function categorieAction($id){
        $category = $this->app['category.repository']->find($id);
        $articles = $this->app['article.repository']->findByCategory($category);
        return $this->render('category.html.twig', ['category' => $category, 'articles' => $articles,]);

    }
    
    public function categoriesAction(){
        $categories = $this->app['category.repository']->findAll();
        
        return $this->render('categories.html.twig', ['categories'=>$categories]);
    }
}
