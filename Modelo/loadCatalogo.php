<?php

require_once "Conexion.php";

$conexion = new Conexion();
$conexion->abrir();

$id = $_POST['id'];

// if (isset($id)) {
    if ($id > 0) {
        $sql = "SELECT p.especificaciones, p.marca, p.tipo ,p.modelos, p.precio, p.id_imagen, c.nombre AS nombre_cat, p.id AS id_prod, i.ruta_imag, i.id_imag FROM productos AS p
        JOIN categorias AS c
        ON p.id_categoria = c.id 
        JOIN imagenes as i
        ON p.id_imagen = i.id_imag
        WHERE p.id_categoria = $id";
    } else {
        $sql = "SELECT p.especificaciones, p.marca, p.tipo ,p.modelos, p.precio, p.id_imagen, c.nombre AS nombre_cat, p.id AS id_prod, i.ruta_imag, i.id_imag FROM productos AS p
        JOIN categorias AS c
        ON p.id_categoria = c.id 
        JOIN imagenes as i
        ON p.id_imagen = i.id_imag";
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
            <h2><?php echo $fila["marca"] ?></h2>
            <h3><?php echo $fila["modelos"] ?></h3>
            <p>Tipo: <?php echo $fila["tipo"] ?></p>
            <p>Talla: <?php echo $fila["especificaciones"] ?></p>
            <p>$<?php echo $fila["precio"] ?></p>
            <button onclick="solicitar(<?php echo $fila['id_prod'] ?>)">Solicitar Compra</button>
        </div>
        <?php
    }
} else {
    echo "No hay productos para mostrar en esta categoría";
}