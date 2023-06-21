<?php
class Toy extends Product
{
    // PROPERTIES
    private string $brand;
    private string $agerange;

    // CONSTRUCTOR
    public function __construct($name, $price, $img, Category $category, $brand, $agerange)
    {
        parent::__construct($name, $price, $img, $category);
        $this->brand = $brand;
        $this->agerange = $agerange;
    }

    // GETTER
    public function getProductBrand()
    {
        return $this->brand;
    }

    public function getProductAge()
    {
        return $this->agerange;
    }

    // SETTER
    public function setProductBrand($brand)
    {
        $this->brand = $brand;
    }

    public function setProductAge($agerange)
    {
        $this->agerange = $agerange;
    }
}
