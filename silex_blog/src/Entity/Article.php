<?php
namespace Entity;


class Article {
    /*
     * @var int
     */
    private $id;
    
    /*
     * @var string
     */
    private $title;
    
    /*
     * @var string
     */
    private $content;
    
    /*
     * @var string
     */
    private $shortContent;
    
    /*
     * @var string
     */
    private $category;
    
    /*
     * @return int
     */
    public function getId() {
        return $this->id;
    }
    
    /*
     * @return string
     */
    public function getTitle() {
        return $this->title;
    }
    
    /*
     * @return string
     */
    public function getContent() {
        return $this->content;
    }
    
    /*
     * @return string
     */
    public function getShortContent() {
        return $this->shortContent;
    }

    public function setId($id) {
        $this->id = $id;
        return $this;
    }

    public function setTitle($title) {
        $this->title = $title;
        return $this;
    }

    public function setContent($content) {
        $this->content = $content;
        return $this;
    }

    public function setShortContent($shortContent) {
        $this->shortContent = $shortContent;
        return $this;
    }
    /*
     * @return Category
     */
    public function getCategory() {
        return $this->category;
    }

    public function setCategory(Category $category) {
        $this->category = $category;
        return $this;
    }
    
    public function getCategoryId(){
        if(!is_null($this->category)){
            return $this->category->getId();
        }
        return null;
    }
    
    public function getCategoryName(){
        if(!is_null($this->category)){
            return $this->category->getName();
        }
        return '';
    }

}


