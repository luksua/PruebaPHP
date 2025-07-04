<?php

class GestorPedidos
{
    public function completarPedido($id)
    {
        $conexion = new Conexion();
        $conexion->abrir();
        $sql = "UPDATE pedidos SET estado = 'Entregado' WHERE id = $id";
        $conexion->consultar($sql);
        $filas = $conexion->getFilas();
        $conexion->cerrar();
        return $filas;
    }
    public function cancelarPedido($id)
    {
        $conexion = new Conexion();
        $conexion->abrir();
        $sql = "UPDATE pedidos SET estado = 'Cancelado' WHERE id = $id";
        $conexion->consultar($sql);
        $filas = $conexion->getFilas();
        $conexion->cerrar();
        return $filas;
    }
    public function confirmarPedidoCliente($id_usu, $productos)
    {
        $conexion = new Conexion();
        $conexion->abrir();
        $filas = 0;

        foreach ($productos as $prod) {
            $id_prod = $prod['id_prod'];
            $cantidad = $prod['cantidad'];
            $sql = "INSERT INTO pedidos (id_usuario, id_producto, cantidad, fecha, estado) 
            VALUES ('$id_usu', '$id_prod', '$cantidad', NOW(), 'Pendiente')";
            $conexion->consultar($sql);
            if ($conexion->getFilas() <= 0) {
                echo "Error al insertar producto $id_prod: " . $conexion->getError() . "<br>";
            }
            $filas += $conexion->getFilas();
        }

        echo $id_prod;
        echo $id_usu;
        echo $cantidad;
        echo $filas;

        $conexion->cerrar();
        return $filas;
    }
}
