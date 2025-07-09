<?php

require_once "Conexion.php";

$conexion = new Conexion();
$conexion->abrir();

$id = $_POST['id'];
$pagina = $_POST['pagina'];
$limite = 10;
$offset = ($pagina - 1) * $limite;

// Contar total de productos para la paginación
if ($id > 0) {
    $sql_count = "SELECT COUNT(*) as total FROM productos WHERE id_categoria = $id";
} else {
    $sql_count = "SELECT COUNT(*) as total FROM productos";
}
$conexion->consultar($sql_count);
$consulta = $conexion->getResult();
$totalP = $consulta->fetch_assoc()['total'];

// Consulta principal de productos
if ($id > 0) {
    $sql = "SELECT p.especificaciones, p.marca, p.tipo ,p.modelos, p.precio, c.nombre AS nombre_cat, p.id AS id_prod
        FROM productos AS p
        JOIN categorias AS c ON p.id_categoria = c.id
        WHERE p.id_categoria = $id
        LIMIT $limite OFFSET $offset";
} else {
    $sql = "SELECT p.especificaciones, p.marca, p.tipo ,p.modelos, p.precio, c.nombre AS nombre_cat, p.id AS id_prod
        FROM productos AS p
        JOIN categorias AS c ON p.id_categoria = c.id
        LIMIT $limite OFFSET $offset";
}
$conexion->consultar($sql);
$filas = $conexion->getFilas();
$result_productos = $conexion->getResult();

$productos = [];
$ids = [];

while ($fila = $result_productos->fetch_assoc()) {
    $id_prod = $fila['id_prod'];
    $productos[$id_prod] = $fila;
    $productos[$id_prod]['imagenes'] = [];
    $ids[] = $id_prod;
}

// Consulta solo imágenes de los productos seleccionados
if (count($ids) > 0) {
    $ids_str = implode(',', $ids);
    $sql_i = "SELECT id_prod, ruta_img FROM imagenes WHERE id_prod IN ($ids_str)";
    $conexion->consultar($sql_i);
    $result_imagenes = $conexion->getResult();
    if ($result_imagenes) {
        while ($img = $result_imagenes->fetch_assoc()) {
            $productos[$img['id_prod']]['imagenes'][] = $img['ruta_img'];
        }
    }
}
$conexion->cerrar();

if (count($productos) > 0) {
    foreach ($productos as $producto) { ?>
        <div class="producto">
            <div class="carrusel"
                data-imagenes='<?php echo json_encode(array_map(fn($img) => "uploads/$img", $producto['imagenes'])); ?>'>
                <button class="carrusel-flecha izq"><</button>
                <?php if (!empty($producto['imagenes'])): ?>
                    <img class="carrusel-img" src="uploads/<?php echo $producto['imagenes'][0]; ?>" alt="">
                <?php else: ?>
                    <img class="carrusel-img" src="uploads/default.png" alt="Sin imagen">
                <?php endif; ?>
                <button class="carrusel-flecha der">></button>
            </div>
            <h2><?php echo $producto["marca"] ?></h2>
            <h3><?php echo $producto["modelos"] ?></h3>
            <p>Tipo: <?php echo $producto["tipo"] ?></p>
            <p>Especificaciones: <?php echo $producto["especificaciones"] ?></p>
            <p>Precio: $<?php echo number_format($producto["precio"]) ?></p>
            <button onclick="solicitar(<?php echo $producto['id_prod'] ?>)">Solicitar Compra</button>
        </div>
    <?php }
    // Mostrar paginación fuera del listado de productos
    $totalPa = ceil($totalP / $limite);
    echo '<script>
        $("#paginacion").html(`';
    echo '<div class="paginacion">';
    for ($i = 1; $i <= $totalPa; $i++) {
        echo '<button class="pagina-btn" data-pagina="'.$i.'">'.$i.'</button> ';
    }
    echo '</div>';
    echo '`);</script>';
} else {
    echo "<p>No hay productos para mostrar en esta categoría</p>";
    echo '<script>$("#paginacion").html("");</script>';
}