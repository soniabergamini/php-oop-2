<?php 

class Category {

    // PROPERTIES
    private string $name;
    private string $description;
    private string $icon;

    // CONSTRUCTOR
    public function __construct($name , $description, $icon)
    {
        $this->name = $name;
        $this->description = $description;
        $this->icon = $icon;
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

    public function getCategoryIcon()
    {
        return $this->icon;
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

    public function setCategoryIcon($icon)
    {
        $this->icon = $icon;
    }

}
?>