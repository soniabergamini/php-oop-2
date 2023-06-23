<?php 
trait Brand {
    private string $brand;

    // GETTER
    public function getProductBrand()
    {
        if($this->brand == ''){
            throw new Exception("The Brand is null. ");
        }
        return ucfirst(strtolower($this->brand));
    }

    // SETTER
    public function setProductBrand($brand)
    {
        $this->brand = ucfirst(strtolower($brand));
    }
}

?>