<?php

class ControladorPedidos{
    public function completarPedido($id){
        $gestorPedidos = new GestorPedidos();
        $filas = $gestorPedidos->completarPedido($id);
        if ($filas > 0) {
            echo "<script>alert('Pedido Entregado');
                window.location='index.php?accion=adminPedidos'
                </script>";
        } else {
            echo "<script>alert('Algo salió mal. Intente nuevamente');
                window.location='index.php?accion=adminPedidos'
                </script>";
        }
    }
    public function cancelarPedido($id){
        $gestorPedidos = new GestorPedidos();
        $filas = $gestorPedidos->cancelarPedido($id);
        if ($filas > 0) {
            echo "<script>alert('Pedido Cancelado');
                window.location='index.php?accion=adminPedidos'
                </script>";
        } else {
            echo "<script>alert('Algo salió mal. Intente nuevamente');
                window.location='index.php?accion=adminPedidos'
                </script>";
        }
    }
}