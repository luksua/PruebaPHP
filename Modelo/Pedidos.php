<?php

class Pedidos{
    private $id_usuario;
    private $fecha;
    private $total;
    private $estado;
    public function __construct($id_usuario, $fecha, $total, $estado) {
        $this->id_usuario = $id_usuario;
        $this->fecha = $fecha;
        $this->total = $total;
        $this->estado = $estado;
    }
    public function getIdUsuario(){
        return $this->id_usuario;
    }
    public function getFecha(){
        return $this->fecha;
    }
    public function getEstado(){
        return $this->estado;
    }
    public function getTotal(){
        return $this->total;
    }
}