<?php

class ControladorProductos
{
    
    public function productoIngreso($ProdPeci, $ProdCatgo, $ProdMar, $ProdMod, $ProdTipo, $ProdEspels){ 

        $ModIngreso= new Productos($ProdPeci, $ProdCatgo, $ProdMar, $ProdMod, $ProdTipo, $ProdEspels);  
        $Crud_Productos1= new GestorProductos; 
        $Crud_Productos1->ProductosIngreso($ModIngreso);
    }


    public function productoActualizacion($ProdPeci2, $ProdCatgo2, $ProdMar2, $ProdMod2, $ProdTipo2, $ProdEspels2, $claveProd){ 

        $ModActualizar= new Productos($ProdPeci2, $ProdCatgo2, $ProdMar2, $ProdMod2, $ProdTipo2, $ProdEspels2, $claveProd); 
        $Crud_Productos2= new GestorProductos; 
        $Crud_Productos2->actualizarProductos($ModActualizar);
    } 

    public function deleteActualizacion($claveProd2){ 

        $ModBorrar= new Productos(null, null, null, null, null, null, $claveProd2);
        $Crud_Productos3= new GestorProductos; 
        $Crud_Productos3->CambioEstado($ModBorrar); 

        require_once 'Vista/html/adminProductos.html';
    }

    public function ImagenesIngresoProd($ProdAsociado ,$ListadoImg){ 

        $Modimagenes= new Imagenes($ProdAsociado ,$ListadoImg); 
        $Crud_ProductosImg= new GestorProductos; 
        $Crud_ProductosImg->IngresarImagen($Modimagenes); 
    } 




    
    //importante
    public function solicitarCompra($id)
    {
        if (!isset($_SESSION["email"])) {
            echo "<script>alert('Para poder solicitar una compra, primero debe registrarse');
            window.location='index.php?accion=registro'
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
    //importante
    public function añadirProductoCarrito($id_prod, $id_usu, $cantidad)
    {
        if (empty($cantidad)) {
            echo "<script>
            alert('Ingrese la cantidad que desea');
            window.location='index.php?accion=solicitarCompra&id=$id_prod'</script>";
        } else {
            $gestorProducto = new GestorProductos();
            // se consultan los demás datos del producto, por el id del producto
            $result = $gestorProducto->consultaEditar($id_prod);
            $productoDatos = $result->fetch_assoc();

            $_SESSION['id_usu'] = $id_usu;

            // esta es la estructura como array del producto, para desp agregarlo al carrito
            $producto = [
                'id_prod' => $id_prod,
                'marca' => $productoDatos['marca'],
                'modelo' => $productoDatos['modelos'],
                'tipo' => $productoDatos['tipo'],
                'precio' => $productoDatos['precio'],
                'cantidad' => $cantidad
            ];

            // creacion del carrito y/o se agregan el producto
            if (!isset($_SESSION['carrito'])) {
                $_SESSION['carrito'] = [];
            }

            // esto es para el producto no se agregue repetidas veces
            $productoAgregado = 0;

            // se recorre el carrito para modificar la cantidad directamente de un producto en especifico
            foreach ($_SESSION['carrito'] as &$prod) {
                if ($prod['id_prod'] == $id_prod) {
                    $prod['cantidad'] += $cantidad;
                    $productoAgregado += 1;
                    break;
                }
            }

            if ($productoAgregado == 0) {
                $_SESSION['carrito'][] = $producto;
            }

            echo "<script>alert('Producto agregado al carrito');
            window.location='index.php?accion=loadCarrito'</script>";
            // $gestorProducto = new GestorProductos();
            // $filas = $gestorProducto->añadirProductoCarrito($id_prod, $id_usu, $cantidad);
            // if ($filas > 0) {
            //     echo "<script>alert('Compra agregada');
            //     window.location='index.php?accion=panelCliente'</script>";
            // } else {
            //     echo "<script>alert('El producto no se agregó a la compra. Intente nuevamente');
            //     window.location='index.php?accion=solicitarCompra&id=$id_prod'</script>";
            // }
        }
    }
}