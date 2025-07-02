<?php
require_once "Conexion.php";

$conexion = new Conexion();
$conexion->abrir();
$sql = "SELECT * FROM categorias";
$conexion->consultar($sql);
$filas = $conexion->getFilas();
$result = $conexion->getResult();
$conexion->cerrar();

if ($filas > 0) { ?>
    <ul>
        <?php
        while ($fila = $result->fetch_assoc()) { ?>
            <li> <?php echo $fila["nombre"] ?> <button onclick="eliminarCategoria(<?php echo $fila['id']?>)">Eliminar</button>
            <button onclick="editarCategoria(<?php echo $fila['id']?>)">Editar</button></li>
            <br>
            <?php
        } ?>
    </ul>
    <?php
} ?>