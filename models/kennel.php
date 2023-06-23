<?php
class Kennel extends Product
{
    // PROPERTIES
    private string $size;
    private string $color;

    // CONSTRUCTOR
    public function __construct($name, $price, $img, Category $category, $size, $color)
    {
        parent::__construct($name, $price, $img, $category);
        $this->size = $size;
        $this->color = $color;
    }

    // GETTER
    public function getProductSize()
    {
        return $this->size;
    }

    public function getProductColor()
    {
        return $this->color;
    }

    // SETTER
    public function setProductSize($size)
    {
        $this->size = $size;
    }

    public function setProductColor($color)
    {
        $this->color = $color;
    }
}
