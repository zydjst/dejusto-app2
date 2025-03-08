<?php
namespace App\Services;

class ProductService{
    protected $products;

    public function __construct($products=[]){
        $this->products=$products;
    }
    public function listProducts(){
        return $this -> products;
    }
    public function insert($product){
        return $this -> products[] =$product;
    }

}