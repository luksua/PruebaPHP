<?php

class ControladorCategorias
{
    public function agregarCategoria($nombre)
    {
        $categoria = new Categorias($nombre);
        $gestorCategoria = new GestorCategorias();
        $filas = $gestorCategoria->agregarCategoria($categoria);
        if ($filas > 0) {
            echo "<script>alert('Categoria agregada');
                window.location='index.php?accion=adminCategorias'
                </script>";
        } else {
            echo "<script>alert('Algo salió mal. Intente nuevamente');
                window.location='index.php?accion=adminCategorias'
                </script>";
        }
    }
    public function loadCategorias()
    {
        $gestorCategoria = new GestorCategorias();
        $result = $gestorCategoria->loadCategorias();
        require_once "Vista/html/admin.php";
    }
    public function eliminarCategoria($id)
    {
        $gestorCategoria = new GestorCategorias();
        $filas = $gestorCategoria->eliminarCategoria($id);
        if ($filas > 0) {
            echo "<script>alert('Categoria eliminada');
                window.location='index.php?accion=adminCategorias'
                </script>";
        } else {
            echo "<script>alert('No se pudo eliminar la categoria');
                window.location='index.php?accion=adminCategorias'
                </script>";
        }
    }
    public function editarCategoria($id, $nombre)
    {
        $gestorCategoria = new GestorCategorias();
        $filas = $gestorCategoria->editarCategoria($id, $nombre);
        if ($filas > 0) {
            echo "<script>alert('Categoria editada');
                window.location='index.php?accion=adminCategorias'
                </script>";
        } else {
            echo "<script>alert('No se pudo editar la categoria');
                window.location='index.php?accion=adminCategorias'
                </script>";
        }
    }
}