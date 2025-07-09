<?php
class GestorProductos
{
    public function ProductosIngreso(Productos $productos1){ 

        $Conexion12= new Conexion; 
        $Conexion12->abrir(); 

        $precio= $productos1->getPrecio(); 
        $categoria= $productos1->getCatego(); 
        $Marca= $productos1->getMarca(); 
        $Modelos= $productos1->getModelo(); 
        $Tipo= $productos1->getTipo(); 
        $Especs= $productos1->getEspeci(); 

        $sql=("INSERT INTO productos (precio, id_categoria, marca, modelos, tipo, especificaciones) VALUES 
        ('$precio','$categoria','$Marca','$Modelos','$Tipo','$Especs')"); 

        $Conexion12->consultar($sql); 

        $num_roows= $Conexion12->getFilas(); 

        $Conexion12->cerrar(); 

        return $num_roows;
    } 

    public function actualizarProductos(Productos $productos2){ 

        $conexion13= new Conexion; 
        $conexion13->abrir(); 

        $precio2= $productos2->getPrecio(); 
        $categoria2= $productos2->getCatego(); 
        $Marca2= $productos2->getMarca(); 
        $Modelos2= $productos2->getModelo(); 
        $Tipo2= $productos2->getTipo(); 
        $Especs2= $productos2->getEspeci();  
        $claveProd= $productos2->getClave(); 

        $sql2=("UPDATE productos SET precio='$precio2', id_categoria='$categoria2',  marca='$Marca2', modelos='$Modelos2', tipo='$Tipo2', especificaciones='$Especs2' WHERE id='$claveProd' "); 

        $conexion13->consultar($sql2); 
        $num_roows2= $conexion13->getFilas(); 

        $conexion13->cerrar(); 

        return $num_roows2;
    }

    public function CambioEstado(Productos $productos3){ 

        $conexion14= new Conexion; 
        $conexion14->abrir(); 

        $claveProd2= $productos3->getClave(); 

        $sql3= ("UPDATE productos SET Prod_estado='Inactivo' WHERE id='$claveProd2' ");
        $conexion14->consultar($sql3);  
        $num_roows3= $conexion14->getFilas()< 

        $conexion14->cerrar(); 

        return $num_roows3;
    } 

    public function IngresarImagen(Imagenes $imagenes){ 

       $conexion15 = new Conexion; 
       $conexion15->abrir();  

       $Producto = $imagenes->getimgProducto(); 
       $ruta = $imagenes->getimgRuta(); 
       echo $Producto;
       echo $ruta;


       $sql5 = "INSERT INTO imagenes (id_prod, ruta_img) VALUES ('$Producto', '$ruta')"; 

       $conexion15->consultar($sql5);  

       $result33= $conexion15->getResult(); 


    
            //if ($conexion15->getError()) {
                //error_log("Error SQL imagenes: " . $conexion15->getError());
              //  error_log("Consulta: $sql5");
            //}

       $conexion15->cerrar();   
       
       return $result33;
    }




    //importante
    public function consultaEditar($id)
    {
        $conexion = new Conexion();
        $conexion->abrir();
        $sql = "SELECT *, p.id AS id_producto, c.nombre AS nombre_categoria, p.nombre AS nombre_producto, p.id_categoria AS id_cat, c.id AS cat_id
                FROM productos AS p
                JOIN categorias AS c 
                ON p.id_categoria = c.id
                WHERE p.id = $id";
        $conexion->consultar($sql);
        $result = $conexion->getResult();
        $conexion->cerrar();
        return $result;
    }
    

    //importante
    public function agregarCompra($id_prod, $id_usu, $cantidad)
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