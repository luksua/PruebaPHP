<?php

require_once "Conexion.php";

$conexion = new Conexion();
$conexion->abrir();

$id = $_POST['id'];

// if (isset($id)) {
if ($id > 0) {
    $sql = "SELECT p.especificaciones, p.marca, p.tipo ,p.modelos, p.precio, c.nombre AS nombre_cat, p.id AS id_prod, i.ruta_img, i.id_imag FROM productos AS p
        JOIN categorias AS c
        ON p.id_categoria = c.id 
        LEFT JOIN imagenes as i
        ON p.id = i.id_prod
        WHERE p.id_categoria = $id";
    // $sql = "SELECT * FROM imagenes AS i
    // JOIN productos AS p
    // ON i.id_prod = p.id 
    // WHERE p.id_categoria = $id";
} else {
    $sql = "SELECT p.especificaciones, p.marca, p.tipo ,p.modelos, p.precio, c.nombre AS nombre_cat, p.id AS id_prod, i.ruta_img, i.id_imag FROM productos AS p
        JOIN categorias AS c
        ON p.id_categoria = c.id 
        LEFT JOIN imagenes as i
        ON p.id = i.id_prod";

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

$productos = [];
while ($fila2 = $result->fetch_assoc()) {
    $id_prod = $fila2['id_prod'];
    if (!isset($productos[$id_prod])) {
        $productos[$id_prod] = $fila2;
        $productos[$id_prod]['imagenes'] = [];
    }
    if (!empty($fila2['ruta_img'])) {
        $productos[$id_prod]['imagenes'][] = $fila2['ruta_img'];
    }
}

if (count($productos) > 0) {
    foreach ($productos as $producto) { ?>
        <div class="producto">
            <div class="carrusel"
                data-imagenes='<?php echo json_encode(array_map(fn($img) => "uploads/$img", $producto['imagenes'])); ?>'>
                <button class="carrusel-flecha izq">&#8592;</button>
                <img class="carrusel-img" src="uploads/<?php echo $producto['imagenes'][0]; ?>" alt="">
                <button class="carrusel-flecha der">&#8594;</button>
            </div>
            <h2><?php echo $producto["marca"] ?></h2>
            <h3><?php echo $producto["modelos"] ?></h3>
            <p>Tipo: <?php echo $producto["tipo"] ?></p>
            <p>Especificaciones: <?php echo $producto["especificaciones"] ?></p>
            <p>Precio: $<?php echo number_format($producto["precio"]) ?></p>
            <button onclick="solicitar(<?php echo $producto['id_prod'] ?>)">Solicitar Compra</button>
        </div>
    <?php }
} else {
    echo "<p>No hay productos para mostrar en esta categoría</p>";
}