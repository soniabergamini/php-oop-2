<?php

// CLASS
class Product {

    // PROPERTIES
    protected string $name;
    protected int $price;
    protected object $category;

    // CONSTRUCTOR
    public function __construct($name, $price, Category $category)
    {
        $this->name = $name;
        $this->price = $price;
        $this->category = $category;

        foreach ($this->category as $category) {
            if (!$category instanceof Category) {
                die("ERROR: Invalid Category Data");
            }
        }

    }

    // GETTER
    public function getProductName()
    {
        return $this->name;
    }

    public function getProductPrice()
    {
        return $this->price;
    }

    // SETTER
    public function setProductName($name)
    {
        $this->name = $name;
    }

    public function setProductPrice($price)
    {
        $this->price = $price;
    }

}

?>