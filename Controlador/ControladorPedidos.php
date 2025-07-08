<?php

class ControladorPedidos
{
    public function completarPedido($id)
    {
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
    public function cancelarPedido($id)
    {
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
    public function confirmarPedido()
    {
        if (isset($_SESSION['carrito'])) {
            $gestorPedidos = new GestorPedidos();
            $fecha = date('Y-m-d');
            $id_usu = $_SESSION['id_usu'];
            $carrito = $_SESSION['carrito'];

            foreach ($carrito as $prod){
                $subtotal = $prod['cantidad'] * $prod['precio'];
                $total += $subtotal;
            }

            $pedido = new Pedidos($id_usu, $fecha, $total,'Pendiente');
            $id_pedido = $gestorPedidos->confirmarPedidoCliente($pedido);
            
            foreach ($carrito as $prod){
                $detallePedido = new DetallePedido(
                    $id_pedido,
                    $prod['id_prod'],
                    $prod['cantidad'],
                    null,
                    $prod['precio']
                );
                $filas = $gestorPedidos->confirmarDetallePedido($detallePedido);
            }

            if ($filas > 0) {
                echo "<script>alert('Pedido Confirmado');
                window.location='index.php?accion=loadCarrito'</script>";
                unset($_SESSION['carrito']);
            } else {
                echo "<script>alert('Intente Nuevamente');
                window.location='index.php?accion=loadCarrito'</script>";
            }
        }
    }
}