<?php 
require_once "Conexion.php";

//-------listado Categorias-----------
    $conexion = new Conexion();
    $conexion->abrir();
    $sql = "SELECT * FROM categorias WHERE Cat_estado='Activo'";
    $conexion->consultar($sql);
    $result = $conexion->getResult();
    $conexion->cerrar(); 
//-------------------------------------  
?>   
<div id="Natural"></div> 
<div id="Friction"></div>
<div> 
    <button onclick="mostrarNewIngreso()">NEW</button>
</div>
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>NOMBRE</th>
            <th>CREACION</th>
            <th>ESTADO</th>
            <th>UPDATE</th>
            <th>DELETE</th>
        </tr>
    </thead> 
    <tbody> 
      <?php while($ContendCat= $result->fetch_object()){?>
        <tr>
            <td><?php echo $ContendCat->id;?></td>
            <td><?php echo $ContendCat->nombre;?></td>
            <td><?php echo $ContendCat->Cat_Creacion;?></td>
            <td><?php echo $ContendCat->Cat_estado;?></td>
            <td><button onclick="mostrarActualizacion(this)" 
            data-nombrecat="<?php echo $ContendCat->nombre;?>" 
            data-fechacat="<?php echo $ContendCat->Cat_Creacion;?>"
            data-clavecat="<?php echo $ContendCat->id;?>"
            >UPDATE</button></td> 
            <td><button onclick="return confirm('Confirma eliminacion')"><a href=" index.php?accion=delCategoria&clave3=<?php echo $ContendCat->id;?>">DELETE</a></button></td>
        </tr> 
      <?php }?>  
    </tbody>
</table> 

<!-- ingreso categoria ---------> 
<div id="fmrcategoria" title="NEW CATEGORIE">
    <form action="" id="razihell" method="get"> 
        <div class="form-field">
            <label for="nombre">Nombre</label>
            <input type="text" name="NombreCat" id="NombreCat">
        </div> 

        <div class="form-field">
            <label for="nombre">Fecha Creacion</label>
            <input type="date" name="BornFech" id="BornFech">
        </div>
    </form>
</div>
<!------------------------------> 

<!-- Actualizacion categoria ---------> 
<div id="fmrcategoria22" title="UPDATE CATEGORIE">
    <form action="" id="Warning" method="get"> 
        <div class="form-field">
            <label for="nombre">Nombre</label>
            <input type="text" name="NombreCat2" id="NombreCat2"> 
            <input type="hidden" name="ClaveCat2" id="ClaveCat2">
        </div> 

        <div class="form-field">
            <label for="nombre">Fecha Creacion</label>
            <input type="date" name="BornFech2" id="BornFech2">
        </div>
    </form>
</div>
<!------------------------------>