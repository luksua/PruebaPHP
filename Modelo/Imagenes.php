<?php  

    class Imagenes{ 

        private $ProductoImg; 
        private $RutaImg; 
        
        public function __construct($ProductoImg=null, $RutaImg=null){
            
            $this->ProductoImg=$ProductoImg; 
            $this->RutaImg=$RutaImg;
        } 

        public function getimgProducto(){ 
            return $this->ProductoImg;
        } 

        public function getimgRuta(){ 
            return $this->RutaImg;
        }
    }




?>