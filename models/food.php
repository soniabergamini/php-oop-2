<?php
class Food extends Product
{
    // PROPERTIES
    private string $brand;
    private string $weight;
    private string $agerange;

    // CONSTRUCTOR
    public function __construct($name, $price, $img, Category $category, $brand, $weight, $agerange)
    {
        parent::__construct($name, $price, $img, $category);
        $this->brand = $brand;
        $this->weight = $weight;
        $this->agerange = $agerange;
    }

    // GETTER
    public function getProductBrand()
    {
        return $this->brand;
    }

    public function getProductWeight()
    {
        return $this->weight;
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

    public function setProductWeight($weight)
    {
        $this->weight = $weight;
    }

    public function setProductAge($agerange)
    {
        $this->agerange = $agerange;
    }
}
?>