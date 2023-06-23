<?php 
trait Brand {
    private string $brand;

    // GETTER
    public function getProductBrand()
    {
        return ucfirst(strtolower($this->brand));
    }

    // SETTER
    public function setProductBrand($brand)
    {
        $this->brand = ucfirst(strtolower($brand));
    }
}

?>