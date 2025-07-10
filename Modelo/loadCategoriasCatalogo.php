<?php 
require_once "Conexion.php";

$conexion = new Conexion();
$conexion->abrir();
$sql = "SELECT * FROM categorias WHERE Cat_estado='Activo'";
$conexion->consultar($sql);
$filas = $conexion->getFilas();
$result = $conexion->getResult();
$conexion->cerrar();

if ($filas > 0) { ?>
        <?php
        while ($fila = $result->fetch_assoc()){ ?>
            <option value="<?php echo $fila['id']; ?>"><?php echo $fila['nombre']; ?></option>
        <?php
        } ?>
    </select>
    <?php
} 