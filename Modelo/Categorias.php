<?php

class Categorias{
    
    private $CatName;
    private $CatFechBorn;
    private $CatState; 
    private $CatCipher;

    public function __construct($CatName=null, $CatFechBorn=null, $CatState=null, $CatCipher=null){
        
        $this->CatName=$CatName; 
        $this->CatFechBorn=$CatFechBorn;
        $this->CatState=$CatState;
        $this->CatCipher=$CatCipher;
    } 

    public function getNameCatego(){ 
        return $this->CatName;
    }
    
    public function getBornCatego(){ 
        return $this->CatFechBorn;
    } 

    public function getStateCatego(){ 
        return $this->CatState;
    }

    public function getCipherCatego(){ 
        return $this->CatCipher;
    }
} 

?>