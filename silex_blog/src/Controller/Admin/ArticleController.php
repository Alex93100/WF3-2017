<?php
namespace Controller\Admin;

use Controller\ControllerAbstract;
use Entity\Article;
use Entity\Category;



class ArticleController extends ControllerAbstract{
    public function listAction(){
        $articles = $this->app['article.repository']->findAll();
        
        return $this->render('admin/article/list.html.twig', ['articles' => $articles]);
    }
    
    public function editAction($id = null){
        
        $categories = $this->app['category.repository']->findAll();
        
        if(!is_null($id)){  
            $article = $this->app['article.repository']->find($id);
        }
        else{
            $article = new Article();
            $article->setCategory(new Category());
        }
        
        if (!empty($_POST)){
            $article->setTitle($_POST['title'])
                    ->setContent($_POST['content'])
                    ->setShortContent($_POST['short_content']);
                    
            $article->getCategory()->setId($_POST['category']);

            $this->app['article.repository']->save($article); // save vérifie que l'id existe, si non => insert, si oui => update
            $this->addflashMessage('L\'article est enregistrée');
            
            return $this->redirectRoute('admin_articles');
        }
                
        return $this->render(
                'admin/article/edit.html.twig',
                ['article' => $article, 'categories' => $categories]
        );
    }
    
    public function deleteAction($id){
        
         $article = $this->app['article.repository']->find($id);
        
        $this->app['article.repository']->delete($article); // save vérifie que l'id existe, si non => insert, si oui => update
        $this->addflashMessage('La rubrique est supprimée');
        
        return $this->redirectRoute('admin_articles');
    }
}
