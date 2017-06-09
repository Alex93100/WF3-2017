<?php
namespace Repository;

use Entity\Article;

class ArticleRepository extends RepositoryAbstract {

    public function findAll(){
        
        $dbArticles = $this -> db -> fetchAll('SELECT * FROM article');
        $articles = [];
        
        foreach ($dbArticles as $dbArticle) {
            $article = new Article(); // $article est un objet instance de la classe Entity article
            $article
                ->setId($dbArticle['id'])
                ->setTitle($dbArticle['title'])
                ->setContent($dbArticle['content'])
                ->setShortContent($dbArticle['short_content']);
            
            $articles[] = $article;
        }
        return $articles;
    }
    
    public function save(Article $article){
        
        if(!empty($article->getId())) {
            $this->update($article);
        }else{
            $this->insert($article);
        }
    }
    
    public function insert(Article $article){
        
        $this->db->insert(
            'article',
            ['title' => $article->getTitle(),
            'content' => $article->getContent(),
            'short_content' => $article->getShortContent(),
            ] // valeurs
        );
    }
    
    public function update(Article $article){
         $this->db->update(
            'article', // nom de la table
            ['title' => $article->getTitle(),
            'content' => $article->getContent(),
            'short_content' => $article->getShortContent()
            ], //valeurs
            ['id' => $article->getId()] // clause WHERE
        );
        
    }

    public function delete(Article $article ){
        
        $this-> db->delete('article',['id'=> $article->getId()]);
        
    }
    
    public function find($id){
        $dbArticle = $this -> db -> fetchAssoc(
            'SELECT * FROM article WHERE id= :id',[':id' => $id]
        );
        
        $article = new Article();
        $article 
            ->setId($dbArticle['id'])
            ->setTitle($dbArticle['title'])
        ;
        
        return $article;
    }
}
