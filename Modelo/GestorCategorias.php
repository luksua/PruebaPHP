<?php

class GestorCategorias
{
    public function loadCategorias()
    {
        $conexion = new Conexion();
        $conexion->abrir();
        $sql = "SELECT * FROM categorias";
        $conexion->consultar($sql);
        $result = $conexion->getResult();
        $conexion->cerrar();
        return $result;
    } 


    public function categoriaIngresar(Categorias $Categorias1){ 

        $Conexion2= new Conexion; 
        $Conexion2->abrir(); 

        $NombreCategories= $Categorias1->getNameCatego(); 
        $FechaCategories=  $Categorias1->getBornCatego(); 

        $sql=("INSERT INTO categorias (nombre, Cat_Creacion)VALUES 
        ('$NombreCategories','$FechaCategories')");  
        $Conexion2->consultar($sql);  

        $Num_roows1= $Conexion2->getFilas(); 
        $Conexion2->cerrar(); 

        return $Num_roows1;
    } 

    public function categoriaUpdate(Categorias $Categorias2){ 

        $Conexion3= new Conexion; 
        $Conexion3->abrir(); 

        $NombreCatego2= $Categorias2->getNameCatego(); 
        $FechaCatego= $Categorias2->getBornCatego();  
        $ClaveCatego1= $Categorias2->getCipherCatego();

        $sql=("UPDATE categorias SET nombre='$NombreCatego2', Cat_Creacion='$FechaCatego' WHERE id='$ClaveCatego1' "); 
        $Conexion3->consultar($sql); 

        $Num_roows1= $Conexion3->getFilas(); 
        $Conexion3->cerrar(); 

        return $Num_roows1;
    } 

    public function CategoriaDelete(Categorias $Categorias3){ 

        $Conexion4= new Conexion; 
        $Conexion4->abrir(); 
         
        $ClaveCatego2= $Categorias3->getCipherCatego();
        $sql=("UPDATE categorias SET Cat_estado='Inactivo' WHERE id='$ClaveCatego2'"); 
        $Conexion4->consultar($sql); 

        $Num_roows2= $Conexion4->getFilas(); 
        $Conexion4->cerrar(); 

        return $Num_roows2;
    }
    
}