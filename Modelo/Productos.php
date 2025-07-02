<?php

class Productos{
    private $name;
    private $size;
    private $description;
    private $price;
    private $photo;
    private $category;
    public function __construct($name, $size, $description, $price, $photo, $category){
        $this->name = $name;
        $this->size = $size;
        $this->description = $description;
        $this->price = $price;
        $this->photo = $photo;
        $this->category = $category;
    }
    public function getName(){
        return $this->name;
    }
    public function getSize(){
        return $this->size;
    }
    public function getDescription(){
        return $this->description;
    }
    public function getPrice(){
        return $this->price;
    }
    public function getPhoto(){
        return $this->photo;
    }
    public function getCategory(){
        return $this->category;
    }
}