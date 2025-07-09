<?php

class DetallePedido{
    private $id_pedido;
    private $id_producto;
    private $cantidad;
    private $subtotal;
    private $precio;

    public function __construct($id_pedido, $id_producto, $cantidad, $subtotal, $precio){
        $this->id_pedido = $id_pedido;
        $this->id_producto = $id_producto;
        $this->cantidad = $cantidad;
        $this->subtotal = $subtotal;
        $this->precio = $precio;
    }
    public function getIdPedido(){
        return $this->id_pedido;
    }
    public function getIdProducto(){
        return $this->id_producto;
    }
    public function getCantidad(){
        return $this->cantidad;
    }
        public function getSubTotal(){
        return $this->subtotal;
    }
    public function getPrecio(){
        return $this->precio;
    }
}