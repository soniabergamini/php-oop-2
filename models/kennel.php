<?php
class Kennel extends Product
{
    // PROPERTIES
    private string $brand;
    private string $size;
    private string $color;

    // CONSTRUCTOR
    public function __construct($name, $price, $img, Category $category, $brand, $size, $color)
    {
        parent::__construct($name, $price, $img, $category);
        $this->brand = $brand;
        $this->size = $size;
        $this->size = $color;
    }

    // GETTER
    public function getProductBrand()
    {
        return $this->brand;
    }

    public function getProductSize()
    {
        return $this->size;
    }

    public function getProductColor()
    {
        return $this->color;
    }

    // SETTER
    public function setProductBrand($brand)
    {
        $this->brand = $brand;
    }

    public function setProductSize($size)
    {
        $this->size = $size;
    }

    public function setProductColor($color)
    {
        $this->color = $color;
    }
}
