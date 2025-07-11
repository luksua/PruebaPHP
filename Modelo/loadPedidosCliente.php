<?php
require_once "Conexion.php";
session_start();

$email = $_SESSION["email"];

$conexion = new Conexion();
$conexion->abrir();
$sql = "SELECT 
            p.id AS id_pedido,
            p.fecha,
            p.estado,
            dp.cantidad,
            dp.precio,
            pr.marca,
            pr.modelos,
            pr.especificaciones,
            pr.tipo,
            p.total,
            dp.subtotal,
            c.nombre AS nombre_categoria
        FROM pedidos AS p
        JOIN usuarios AS u ON p.id_usuario = u.id
        JOIN detalle_pedido AS dp ON p.id = dp.id_pedido
        JOIN productos AS pr ON dp.id_producto = pr.id
        JOIN categorias AS c ON pr.id_categoria = c.id
        WHERE u.correo = '$email'
        ORDER BY p.id DESC";
$conexion->consultar($sql);
$result = $conexion->getResult();
$conexion->cerrar();

// Agrupar productos por pedido
$pedidos = [];
while ($fila = $result->fetch_assoc()) {
    $id_pedido = $fila['id_pedido'];
    if (!isset($pedidos[$id_pedido])) {
        $pedidos[$id_pedido] = [
            'fecha' => $fila['fecha'],
            'estado' => $fila['estado'],
            'productos' => []
        ];
    }
    $pedidos[$id_pedido]['productos'][] = $fila;
}

if (count($pedidos) > 0) {
    foreach ($pedidos as $id_pedido => $pedido) { ?>
        <h3>Pedido n°<?php echo $id_pedido; ?> - Estado: <?php echo $pedido['estado']; ?></h3>
        <table>
            <thead>
                <tr>
                    <th>Item</th>
                    <th>Marca</th>
                    <th>Modelo</th>
                    <th>Especificaciones</th>
                    <th>Tipo</th>
                    <th>Categoria</th>
                    <th>Cantidad</th>
                    <th>Precio Producto</th>
                    <th>Sub total</th>
                </tr>
            </thead>
            <tbody>
            <?php
            $i = 1;
            foreach ($pedido['productos'] as $prod) { 
                ?>
                <tr>
                    <td><?php echo $i++; ?></td>
                    <td><?php echo $prod["marca"]; ?></td>
                    <td><?php echo $prod["modelos"]; ?></td>
                    <td><?php echo $prod["especificaciones"]; ?></td>
                    <td><?php echo $prod["tipo"]; ?></td>
                    <td><?php echo $prod["nombre_categoria"]; ?></td>
                    <td><?php echo $prod["cantidad"]; ?></td>
                    <td><?php echo '$' . number_format($prod["precio"], 2); ?></td>
                    <td><?php echo '$' . number_format($prod["subtotal"], 2); ?></td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
        <h3>Total: $<?php echo number_format($prod["total"], 2); ?></h3>
        <br>
    <?php }
} else {
    echo "Usted no tiene pedidos. Solicítelos y aparecerán aquí.";
}