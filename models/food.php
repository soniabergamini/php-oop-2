<?php 

class Food extends Product {

    // PROPERTIES
    private $category;
    private $description;

    // CONSTRUCTOR
    public function __construct($category = null , $description = 'lorem ipsum')
    {
        parent::__construct($name, $price);
        $this->category = $category;
        $this->description = $description;
    }

    // GETTER
    public function getCategory()
    {
        return $this->category;
    }

    public function getDescrip()
    {
        return $this->description;
    }

    // SETTER
    public function setCategory($category)
    {
        $this->category = $category;
    }

    public function setDescrip($description)
    {
        $this->description = $description;
    }

}
