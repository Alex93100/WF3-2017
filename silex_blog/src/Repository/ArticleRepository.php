<?php
namespace Repository;

use Entity\Article;
use Entity\Category;

class ArticleRepository extends RepositoryAbstract {

    public function findAll(){
        
        $query = <<<EOS
SELECT a.*, c.name
FROM article a
JOIN category c ON a.category_id = c.id
EOS;

        $dbArticles = $this -> db -> fetchAll($query);
        $articles = [];
        
        foreach ($dbArticles as $dbArticle) {
            
            $article = $this->buildArticleFromArray($dbArticle);
            
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
            'short_content' => $article->getShortContent(),
            'category_id' => $article->getCategoryId(),
            ], //valeurs
            ['id' => $article->getId()] // clause WHERE
        );
        
    }

    public function delete(Article $article ){
        
        $this-> db->delete('article',['id'=> $article->getId()]);
        
    }
    
    private function buildArticleFromArray(array $dbArticle){
        $category = new Category();
            
        $category
                ->setId($dbArticle['category_id'])
                ->setName($dbArticle['name']);

        $article = new Article(); // $article est un objet instance de la classe Entity article
        $article
            ->setId($dbArticle['id'])
            ->setTitle($dbArticle['title'])
            ->setContent($dbArticle['content'])
            ->setShortContent($dbArticle['short_content'])
            ->setCategory($category);
        return $article;

    }
    
    public function find($id){
        
        $query = <<<EOS
SELECT a.*, c.name
FROM article a
JOIN category c ON a.category_id = c.id
WHERE a.id = :id
EOS;
        
        $dbArticle = $this -> db -> fetchAssoc(
            $query, [':id' => $id]);
        
        $article = $this->buildArticleFromArray($dbArticle);
        return $article;
    }
    
    public function findByCategory(Category $category){
        
         $query = <<<EOS
SELECT a.*, c.name
FROM article a
JOIN category c ON a.category_id = c.id
WHERE c.id = :id
EOS;
        
        $dbArticles = $this -> db -> fetchAll($query);
        $articles = [];
        
        foreach ($dbArticles as $dbArticle) {
            
            $article = $this->buildArticleFromArray($dbArticle);
            
            $articles[] = $article;
        }
        return $articles;
    }
}

