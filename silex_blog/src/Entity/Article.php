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
}


