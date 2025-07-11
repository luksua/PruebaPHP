<?php

    class Productos{
         
        private $PrecioProd; 
        private $CategoProd;
        private $MarcaProd;
        private $ModeloProd;
        private $TipoProd;
        private $EspciProd;  
        private $claveprod;

        public function __construct($PrecioProd=null, $CategoProd=null, $MarcaProd=null, $ModeloProd=null, $TipoProd=null, $EspciProd=null, $claveprod=null){
            
            $this->PrecioProd=$PrecioProd;  
            $this->CategoProd=$CategoProd;
            $this->MarcaProd=$MarcaProd;
            $this->ModeloProd=$ModeloProd;
            $this->TipoProd=$TipoProd;
            $this->EspciProd=$EspciProd; 
            $this->claveprod=$claveprod; 
            
        } 

        public function getPrecio(){ 
            return $this->PrecioProd;
        } 

        public function getCatego(){ 
            return $this->CategoProd;
        } 

        public function getMarca(){ 
            return $this->MarcaProd;
        } 

        public function getModelo(){ 
            return $this->ModeloProd;
        } 

        public function getTipo(){ 
            return $this->TipoProd;
        } 

        public function getEspeci(){ 
            return $this->EspciProd;
        } 

        public function getClave(){ 
            return $this->claveprod;
        }

    } 

?>