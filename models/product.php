<?php

// CLASS
class Product {

    // PROPERTIES
    protected string $name;
    protected string $img;
    protected int $price;
    public object $category;

    // CONSTRUCTOR
    public function __construct($name, $price, $img, Category $category)
    {
        $this->name = $name;
        $this->price = $price;
        $this->img = $img;
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

    public function getProductImg()
    {
        return $this->img;
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

    public function setProductImg($img)
    {
        $this->img = $img;
    }

}

?>