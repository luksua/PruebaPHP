<?php
require_once "Conexion.php";

$conexion = new Conexion();
$conexion->abrir();
$sql = "SELECT *, p.id AS id_pedido, u.nombre AS nombre_usuario, pr.nombre AS nombre_producto
        FROM pedidos AS p
        JOIN usuarios AS u
        ON p.id_usuario = u.id
        JOIN productos AS pr
        ON p.id_producto = pr.id";
$conexion->consultar($sql);
$filas = $conexion->getFilas();
$result = $conexion->getResult();
$conexion->cerrar();

if ($filas > 0) { ?>
    <table>
        <thead>
            <tr>
                <th>ID Pedido</th>
                <th>Cliente</th>
                <th>Producto</th>
                <th>Cantidad</th>
                <th>Fecha</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <?php
        while ($fila = $result->fetch_assoc()) { ?>
            <tbody>
                <tr>
                    <td><?php echo $fila["id_pedido"] ?></td>
                    <td><?php echo $fila["nombre_usuario"] ?></td>
                    <td><?php echo $fila["nombre_producto"] ?></td>
                    <td><?php echo $fila["cantidad"] ?></td>
                    <td><?php echo $fila["fecha"] ?></td>
                    <td><?php echo $fila["estado"] ?></td>
                    <td>
                        <button onclick="completarPedido(<?php echo $fila['id_pedido'] ?>)">Completar pedido</button>
                        <button onclick="cancelarPedido(<?php echo $fila['id_pedido'] ?>)">Cancelar pedido</button>
                    </td>
                </tr>
            </tbody>
            <?php
        } ?>
    </table>
    <?php
} ?>