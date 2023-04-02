<?php

//class Product {

//     public function __construct($name){
//         $this->setName($name);
//     }

//     protected $name = 'Product';

//     public function getName() { 
//         return $this->name; 
//     }

//     public function setName($name) { 
//         return $this->name = $name; 
//     }
// }

// class ProductChild extends Product{

// }

// $productIntance = new Product('product-2');
// // $productIntance->setName('PRODUCT-1');
// echo $productIntance->getName();

// $productChildIntance = new ProductChild();

//ben ngoai class thong qua instane
// echo $productIntance->name;
// echo $productChildIntance->name;

//been trong class qua phuong thuc
// echo $productChildIntance->getName();

//public protected private --- satatic
// tao ra instance cua class
//var_dump($productIntance);

class Product
{
    public function __construct($price, $image)
    {
        $this->setName($price);
        $this->setImage($image);
    }

    private $price = 0;

    private $description = null;

    private $image;

    public function setName($price)
    {
        return $this->price = $price;
    }

    public function getName()
    {
        return $this->price;
    }

    public function setDescription($description)
    {
        return $this->description = $description;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setImage($image){
        //khong phai string thi in ra
        if (!is_string($image)){
            var_dump('is image string');
            return;
        }else{
        return $this->image = $image;
        }
    }

    public function getImage(){
        return $this->image;
    }

}

class ProductChild extends Product{
    public function __construct($price, $image){
        parent::__construct($price, $image);
        var_dump('child contruct running');
    }
}

// $producInter = new Product(0,0);
// echo $producInter->getName();

$productChildInter = new ProductChild(0,0);
