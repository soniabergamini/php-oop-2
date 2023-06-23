<?php
class Toy extends Product
{
    // PROPERTIES
    private string $agerange;

    // CONSTRUCTOR
    public function __construct($name, $price, $img, Category $category, $agerange)
    {
        parent::__construct($name, $price, $img, $category);
        $this->agerange = $agerange;
    }

    // GETTER
    public function getProductAge()
    {
        return $this->agerange;
    }

    // SETTER
    public function setProductAge($agerange)
    {
        $this->agerange = $agerange;
    }
}
