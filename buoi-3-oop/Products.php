<?php

require(__DIR__ . '/BaseModel.php');
class Products extends BaseModel  
{
    protected $table = 'products';
    private $name;
    private $description;
    private $price;

    public function __construct() 
    {
        echo '<pre>';
        print_r($this);
        parent::__construct($this->table);
    }

    public function setName($name) 
    {
        $this->name = $name;
    }
    public function getName()
    {
        return $this->name;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }
    public function getDescription()
    {
        return $this->description;
    }
    public function setPrice($price)
    {
        $this->price = $price;
    }
    public function getPrice()
    {
        return $this->price;
    }
}