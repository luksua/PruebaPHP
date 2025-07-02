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
    public function agregarCategoria(Categorias $categoria){
        $name = $categoria->getName();
        if (empty($name)){
            echo "<script>alert('Ingrese el nombre de la categoria');
                window.location='index.php?accion=panelAdmin'
                </script>";
        } else {
            $conexion = new conexion();
            $conexion->abrir();
            $sql = "INSERT INTO categorias VALUES(null, '$name')";
            $conexion->consultar($sql);
            $filas = $conexion->getFilas();
            $conexion->cerrar();
            return $filas;
        }
    }
    public function eliminarCategoria($id){
        $conexion = new Conexion();
        $conexion->abrir();
        $sql = "DELETE FROM categorias WHERE id = '$id'";
        $conexion->consultar($sql);
        $filas = $conexion->getFilas();
        return $filas;
    }
    public function editarCategoria($id, $nombre){
        $conexion = new Conexion();
        $conexion->abrir();
        $sql = "UPDATE categorias SET nombre = '$nombre' WHERE id = $id";
        $conexion->consultar($sql);
        $filas = $conexion->getFilas();
        $conexion->cerrar();
        return $filas;
    }
}