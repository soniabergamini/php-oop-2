 <!-- => REACTIVE CART CREATED WITH VUEJS -->
 <!-- This method doesn't work correctly on 'Add to cart' button click: returns errors and adds all products to array $products, on page initialization. 
 For these reasons, Cart class was created but is not currently used. -->

 <?php

    class Cart
    {

        // PROPERTIES
        public $products = [];
        public $total = 0;

        // CONSTRUCTOR
        public function __construct($products, $total)
        {
            $this->products = $products;
            $this->total = $total;
        }

        // GETTER
        public function getProducts()
        {
            return $this->products;
        }

        public function getTotal()
        {
            return $this->total;
        }

        // ADD TO CART 
        public function addToCart($product)
        {
            $this->products[] = $product;
            $this->total += $product->price;
        }
    }

    ?>