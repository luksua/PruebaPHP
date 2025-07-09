 
<?php
require_once "Conexion.php";

$conexion = new Conexion();
$conexion->abrir();
$sql = "SELECT productos.*, categorias.nombre FROM productos JOIN categorias ON productos.id_categoria = categorias.id WHERE Prod_estado='Activo'";
$conexion->consultar($sql);
$filas = $conexion->getFilas();
$result = $conexion->getResult();
$conexion->cerrar();  
//------------------------------------------------------------
$conexion2= new Conexion; 
$conexion2->abrir(); 
$sql2=("SELECT * FROM categorias WHERE Cat_estado='Activo'"); 
$conexion2->consultar($sql2); 
$Selecto1= $conexion2->getResult();  
$conexion2->cerrar(); 
//-------------------------------------------------------------- 
$conexion3= new Conexion; 
$conexion3->abrir(); 
$sql3=("SELECT * FROM categorias WHERE Cat_estado='Activo'"); 
$conexion3->consultar($sql3); 
$Selecto3= $conexion3->getResult();  
$conexion3->cerrar(); 

?>
   
<div>
    <button onclick="MostIngProductos()">NEW</button>
</div> 
<div id="atakan"></div> 
<div id="rakir"></div>
   <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Precio</th>
                <th>Categoria</th>
                <th>Marca</th>
                <th>Modelo</th>
                <th>Tipo</th>
                <th>Especificaciones</th> 
                <th>UPDATE</th> 
                <th>DELETE</th> 
                <th>IMAGES</th>
            </tr>
        </thead>
            <tbody> 
                <?php while($ContProd= $result->fetch_object()){?>
                <tr>
                    <td><?php echo $ContProd->id;?></td>
                    <td><?php echo $ContProd->precio;?></td>
                    <td><?php echo $ContProd->nombre;?></td>
                    <td><?php echo $ContProd->marca;?></td>
                    <td><?php echo $ContProd->modelos;?></td>
                    <td><?php echo $ContProd->tipo;?></td>
                    <td><?php echo $ContProd->especificaciones;?></td> 
                    <td><button onclick="MostUpdate(this)" 
                    data-precioprod="<?php echo $ContProd->precio;?>" 
                    data-categoriaprod="<?php echo $ContProd->id_categoria;?>"
                    data-marcaprod="<?php echo $ContProd->marca;?>"
                    data-modelprod="<?php echo $ContProd->modelos;?>"
                    data-tipoprod="<?php echo $ContProd->tipo;?>"
                    data-espelsprod="<?php echo $ContProd->especificaciones;?>" 
                    data-claveprod="<?php echo $ContProd->id;?>"
                    >UPDATE</button></td>
                    <td><button onclick="return confirm('Eliminar producto?')"><a href="index.php?accion=deleteProducto&Omegon=<?php echo $ContProd->id;?>">DELETE</a></button></td> 
                    <td><button onclick="mostrarDialog(this)"
                    data-listaruta="<?php echo $ContProd->id;?>"
                    >NEW</button></td>
                </tr> 
                 <?php }?>
            </tbody>
    </table> 

    <div id="fmrproductos1" title="Nuevo Producto"> 
        <form action="" method="get" id="hxh">  

            <div class="form-field">
                <label for="nombre">Precio</label>
                <input type="text" name="ProdPrecio" id="ProdPrecio">
            </div>  
            
            <div class="form-field">
                <label for="nombre">Categoria</label> 
                <select name="ProdCategoria" id="ProdCategoria">
                    <?php while($ContSelect= $Selecto1->fetch_object()){?> 
                        <option value="<?php echo $ContSelect->id;?>"><?php echo $ContSelect->nombre;?></option>
                    <?php }?> 
                </select>
            </div>  

            <div class="form-field">
                <label for="nombre">Marca</label>
                <input type="text" name="ProdMarca" id="ProdMarca">
            </div>  

            <div class="form-field">
                <label for="nombre">Modelo</label>
                <input type="text" name="ProdModelo"  id="ProdModelo">
            </div>  

            <div class="form-field">
                <label for="nombre">Tipo</label>
                <select name="ProdTipo" id="ProdTipo"> 
                    <option value="Repuesto">Repuesto</option> 
                    <option value="Computador">Computador</option>
                </select>
            </div>  

            <div class="form-field">
                <label for="nombre">Especs</label>
                <textarea name="ProdEpec" id="ProdEpec"> 

                </textarea>
            </div>  

        </form>
    </div> 

    <div id="fmrproductos2" title="Actualizar">
        <form action="" method="get" id="Asajakir">
            <div class="form-field">
                <label for="nombre">Precio</label>
                <input type="text" name="ProdPrecio2" id="ProdPrecio2"> 
                <input type="hidden" name="ProdClave" id="ProdClave">
            </div>  
            
            <div class="form-field">
                <label for="nombre">Categoria</label> 
                <select name="ProdCategoria2" id="ProdCategoria2">
                    <?php while($ContSelect2= $Selecto3->fetch_object()){?> 
                        <option value="<?php echo $ContSelect2->id;?>"><?php echo $ContSelect2->nombre;?></option>
                    <?php }?> 
                </select>
            </div>  

            <div class="form-field">
                <label for="nombre">Marca</label>
                <input type="text" name="ProdMarca2" id="ProdMarca2">
            </div>  

            <div class="form-field">
                <label for="nombre">Modelo</label>
                <input type="text" name="ProdModelo2"  id="ProdModelo2">
            </div>  

            <div class="form-field">
                <label for="nombre">Tipo</label>
                <select name="ProdTipo2" id="ProdTipo2"> 
                    <option value="Repuesto">Repuesto</option> 
                    <option value="Computador">Computador</option>
                </select>
            </div>  

            <div class="form-field">
                <label for="nombre">Especs</label>
                <textarea name="ProdEpec2" id="ProdEpec2"> 

                </textarea>
            </div>  
        </form>
    </div> 

    <div id="fmrimganes" title="IMAGENES"> 
        <form action="" method="post" id="razal" enctype="multipart/form-data"> 
            <div class="form-field">
                <label for="Fotos">Fotos</label>
                <input type="file" name="ListadoFotos[]" id="ListadoFotos[]" multiple required> 
                <input type="hidden" name="IdProdImg" id="IdProdImg">
            </div>  
        </form>
    </div>

