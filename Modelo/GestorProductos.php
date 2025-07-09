<?php
class GestorProductos
{
    public function agregarProducto(Productos $producto)
    {
        $conexion = new Conexion();
        $conexion->abrir();
        $nombre = $producto->getName();
        $talla = $producto->getSize();
        $descripcion = $producto->getDescription();
        $precio = $producto->getPrice();
        $imagen = $producto->getPhoto();
        $categoria = $producto->getCategory();
        $sql = "INSERT INTO productos VALUES(null, '$nombre', '$talla', '$descripcion', '$precio', '$imagen', '$categoria')";
        $conexion->consultar($sql);
        $filas = $conexion->getFilas();
        $conexion->cerrar();
        return $filas;
    }
    public function eliminarProducto($id)
    {
        $conexion = new Conexion();
        $conexion->abrir();
        $sql = "DELETE FROM productos WHERE id = $id";
        $conexion->consultar($sql);
        $filas = $conexion->getFilas();
        $conexion->cerrar();
        return $filas;
    }
    public function consultaEditar($id)
    {
        $conexion = new Conexion();
        $conexion->abrir();
        $sql = "SELECT *, p.id AS id_producto, c.nombre AS nombre_categoria, p.id_categoria AS id_cat, c.id AS cat_id
                FROM productos AS p
                JOIN categorias AS c 
                ON p.id_categoria = c.id
                WHERE p.id = $id";
        $conexion->consultar($sql);
        $result = $conexion->getResult();
        $conexion->cerrar();
        return $result;
    }
    public function editarProducto2($id, $nombre, $precio, $talla, $descripcion, $categoria, $imagen)
    {
        $conexion = new Conexion();
        $conexion->abrir();
        $sql = "UPDATE productos SET nombre = '$nombre', talla = '$talla', descripcion = '$descripcion', precio = '$precio', imagen = '$imagen', id_categoria = '$categoria' WHERE id = $id";
        $conexion->consultar($sql);
        $filas = $conexion->getFilas();
        $conexion->cerrar();
        return $filas;
    }
    public function añadirProductoCarrito($id_prod, $id_usu, $cantidad)
    {
        $conexion = new Conexion();
        $conexion->abrir();
        $sql = "INSERT INTO pedidos VALUES (null, '$id_usu', '$id_prod', '$cantidad', NOW(), 'activo')";
        $conexion->consultar($sql);
        $filas = $conexion->getFilas();
        $conexion->cerrar();
        return $filas;
    }
}