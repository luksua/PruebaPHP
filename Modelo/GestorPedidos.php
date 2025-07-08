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
    public function confirmarPedidoCliente(Pedidos $pedido)
    {
        $conexion = new Conexion();
        $conexion->abrir();
        $id_usuario = $pedido->getIdUsuario();
        $fecha = $pedido->getFecha();
        $total = $pedido->getTotal();
        $estado = $pedido->getEstado();
        $sql = "INSERT INTO pedidos VALUES(null, '$id_usuario', '$fecha', '$total', '$estado')";
        $conexion->consultar($sql);
        $filas = $conexion->getId();
        $conexion->cerrar();
        return $filas;
    }
    public function confirmarDetallePedido(DetallePedido $detallePedido){
        $conexion = new Conexion();
        $conexion->abrir();
        $id_pedido = $detallePedido->getIdPedido();
        $id_producto = $detallePedido->getIdProducto();
        $cantidad = $detallePedido->getCantidad();
        $subtotal = $detallePedido->getSubTotal();
        $precio = $detallePedido->getPrecio();
        $subtotal = $precio * $cantidad;
        $sql = "INSERT INTO detalle_pedido VALUES(null, '$id_pedido', '$id_producto', '$cantidad', '$subtotal', '$precio')";
        $conexion->consultar($sql);
        $filas = $conexion->getFilas();
        return $filas;
    }
}
