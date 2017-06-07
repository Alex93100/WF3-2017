<?php

namespace Entity;

class Category {
    
    /*
     * @var int
     */
    private $id;
    
    /*
     * @var string
     */
    private $name;
    
    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }

    /*
     * @param int $id
     * @return $this
     */
    public function setId($id) {
        $this->id = $id;
        return $this;
    }
    
    /*
     * @param string $name
     * @return $this
     */
    public function setName($name) {
        $this->name = $name;
        return $this;
    }


}
