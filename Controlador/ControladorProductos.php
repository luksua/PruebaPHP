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
    //importante
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