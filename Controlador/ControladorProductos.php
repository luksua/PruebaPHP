<?php

class ControladorProductos
{
    public function agregarProducto($nombre, $precio, $talla, $descripcion, $categoria, $imagen)
    {
        $producto = new Productos($nombre, $talla, $descripcion, $precio, $imagen, $categoria);
        $gestorProducto = new GestorProductos();
        $filas = $gestorProducto->agregarProducto($producto);
        if ($filas > 0) {
            echo "<script>alert('Producto agregado');
                window.location='index.php?accion=panelAdmin'
                </script>";
        } else {
            echo "<script>alert('Algo salió mal. Intente nuevamente');
                window.location='index.php?accion=panelAdmin'
                </script>";
        }
    }
    public function eliminarProducto($id)
    {
        $gestorProducto = new GestorProductos();
        $filas = $gestorProducto->eliminarProducto($id);
        if ($filas > 0) {
            echo "<script>alert('Producto eliminado');
                window.location='index.php?accion=panelAdmin'
                </script>";
        } else {
            echo "<script>alert('Algo salió mal. Intente nuevamente');
                window.location='index.php?accion=panelAdmin'
                </script>";
        }
    }
    public function editarProducto($id)
    {

        $gestorProducto = new GestorProductos();
        $gestorCategorias = new GestorCategorias();
        $result = $gestorProducto->consultaEditar($id);
        $result2 = $gestorCategorias->loadCategorias();
        require_once "Vista/html/adminEditar.php";
    }
    public function editarProducto2($id, $nombre, $precio, $talla, $descripcion, $categoria, $imagen)
    {
        if (empty($imagen)) {
            echo "<script>
            alert('Ingrese todos los datos');
            window.location='index.php?accion=editarProducto&id=" . $id . "';
        </script>";
        } else {
            $gestorProducto = new GestorProductos();
            $filas = $gestorProducto->editarProducto2($id, $nombre, $precio, $talla, $descripcion, $categoria, $imagen);
            if ($filas > 0) {
                echo "<script>alert('Producto editado');
                window.location='index.php?accion=panelAdmin'</script>";
            } else {
                echo "<script>alert('El producto no se editó, ingrese nuevos datos');
                window.location='index.php?accion=editarProducto&id=$id'</script>";
            }
        }
    }
    public function mostrarProductos($id)
    {
        $id = $id;
        // require_once "Modelo/loadCatalogo.php";
    }
    public function solicitarCompra($id)
    {
        if (!isset($_SESSION["email"])) {
            echo "<script>alert('Para poder solicitar una compra, primero debe registrarse');
            window.location='index.php?accion=catalogo'
            </script>";
        } else {
            $email = $_SESSION["email"];
            $gestorProducto = new GestorProductos();
            $gestorAdmin = new GestorAdmin();
            $result = $gestorProducto->consultaEditar($id);
            $result2 = $gestorAdmin->datos($email);
            require_once "Vista/html/solicitarCompra.php";
        }
    }
    public function agregarCompra($id_prod, $id_usu, $cantidad)
    {
        if (empty($cantidad)) {
            echo "<script>
            alert('Ingrese todos los datos');
            window.location='index.php?accion=solicitarCompra&id=$id_prod'</script>";
        } else {
            $gestorProducto = new GestorProductos();
            $filas = $gestorProducto->agregarCompra($id_prod, $id_usu, $cantidad);
            if ($filas > 0) {
                echo "<script>alert('Compra agregada');
                window.location='index.php?accion=panelCliente'</script>";
            } else {
                echo "<script>alert('El producto no se agregó a la compra. Intente nuevamente');
                window.location='index.php?accion=solicitarCompra&id=$id_prod'</script>";
            }
        }
    }
}