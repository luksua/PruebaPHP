<?php

require_once "Conexion.php";

$id = $_POST["id"];

$conexion = new Conexion();
$conexion->abrir();
$sql = "SELECT * FROM categorias WHERE id = $id";
$conexion->consultar($sql);
$result = $conexion->getResult();
$filas = $conexion->getFilas();
$conexion->cerrar();

if ($filas > 0) {
    $fila = $result->fetch_assoc(); ?>
    <hr>
    <p class="a"><strong>Editar Categoria</strong></p>
    <form action="index.php?accion=editarCategoria" method="post" class="form-admin">
        <input type="hidden" name="id" value="<?php echo $fila['id'] ?>">
        <input type="text" name="nombre" placeholder="Nombre del producto" value="<?php echo $fila['nombre'] ?>">
        <button type="submit">Editar</button>
    </form>
    <?php
} ?>