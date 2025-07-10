<?php

class ControladorCategorias
{
    public function CategoriaIngreso($Nomcatego, $FetchCatego){ 
         
        $Crud_Catego= new Categorias($Nomcatego, $FetchCatego, null, null);
        $GestorCat= new GestorCategorias;  
        $GestorCat->categoriaIngresar($Crud_Catego);
    } 

    public function ActualizarCategos($Nomcatego, $FetchCatego, $ClaveCatego){ 

        $Crud_Catego2= new Categorias($Nomcatego, $FetchCatego, null, $ClaveCatego); 
        $GestorCat2= new GestorCategorias; 
        $GestorCat2->categoriaUpdate($Crud_Catego2);
    } 

    public function DeleteCategorias($CifradoCatego){ 

        $Crud_Catego3= new Categorias(null, null, null, $CifradoCatego); 
        $GestorCat3= new GestorCategorias; 
        $GestorCat3->CategoriaDelete($Crud_Catego3); 

        require_once 'Vista/html/adminCategorias.html';
    }
}