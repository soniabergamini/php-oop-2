<?php 

class Category {

    // PROPERTIES
    private string $name;
    private string $description;

    // CONSTRUCTOR
    public function __construct($name , $description)
    {
        $this->name = $name;
        $this->description = $description;
    }

    // GETTER
    public function getCategoryName()
    {
        return $this->name;
    }

    public function getCategoryDescrip()
    {
        return $this->description;
    }

    // SETTER
    public function setCategoryName($name)
    {
        $this->name = $name;
    }

    public function setCategoryDescrip($description)
    {
        $this->description = $description;
    }

}
?>