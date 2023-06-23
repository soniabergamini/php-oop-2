<?php
class Food extends Product
{
    // PROPERTIES
    private string $weight;
    private string $agerange;

    // CONSTRUCTOR
    public function __construct($name, $price, $img, Category $category, $weight, $agerange)
    {
        parent::__construct($name, $price, $img, $category);
        $this->weight = $weight;
        $this->agerange = $agerange;
    }

    // GETTER
    public function getProductWeight()
    {
        return $this->weight;
    }

    public function getProductAge()
    {
        return $this->agerange;
    }

    // SETTER
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