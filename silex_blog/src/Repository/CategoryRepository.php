<?php

namespace Repository;

use Doctrine\DBAL\Connection;
use Entity\Category;

class CategoryRepository {
    
    /*
     * 
     * @var Connecion
     */
    private $db;
    public function __construct(Connection $db) {
        $this->db = $db;
    }
    
    public function findAll(){
        $dbCategories = $this->db->fetchAll('SELECT * FROM category');
        $categories = [];
        foreach($dbCategories as $dbCategory){
            $category = new Category();
            $category
                    ->setId($dbCategory['id'])
                    ->setId($dbCategory['name']);
            $categories[] = $category;
        }
        return $categories;
    }
}
