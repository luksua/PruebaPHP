<?php

require_once "Conexion.php";

$conexion = new Conexion();
$conexion->abrir();

$id = $_POST['id'];

// if (isset($id)) {
    if ($id > 0) {
        $sql = "SELECT p.nombre AS nombre_prod, p.talla, p.precio, p.imagen, c.nombre AS nombre_cat, p.id AS id_prod FROM productos AS p
        JOIN categorias AS c
        ON p.id_categoria = c.id WHERE p.id_categoria = $id";
    } else {
        $sql = "SELECT p.nombre AS nombre_prod, p.talla, p.precio, p.imagen, c.nombre AS nombre_cat, p.id AS id_prod FROM productos AS p
        JOIN categorias AS c
        ON p.id_categoria = c.id";
    }
// } else {
//     $sql = "SELECT p.nombre AS nombre_prod, p.talla, p.precio, p.imagen, c.nombre AS nombre_cat FROM productos AS p
//         JOIN categorias AS c
//         ON p.id_categoria = c.id";
// }
$conexion->consultar($sql);
$filas = $conexion->getFilas();
$result = $conexion->getResult();
$conexion->cerrar();

if ($filas > 0) {
    ?>
    <?php
    while ($fila = $result->fetch_assoc()) { ?>
        <div class="producto">
            <img src="uploads/<?php echo $fila['imagen'] ?>">
            <h3><?php echo $fila["nombre_prod"] ?></h3>
            <p>Categoría: <?php echo $fila["nombre_cat"] ?></p>
            <p>Talla: <?php echo $fila["talla"] ?></p>
            <p>$<?php echo $fila["precio"] ?></p>
            <button onclick="solicitar(<?php echo $fila['id_prod'] ?>)">Solicitar Compra</button>
        </div>
        <?php
    }
} else {
    echo "No hay productos para mostrar en esta categoría";
}