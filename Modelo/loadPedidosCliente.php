<?php
require_once "Conexion.php";
session_start();

$email = $_SESSION["email"];

$conexion = new Conexion();
$conexion->abrir();
$sql = "SELECT *, p.id AS id_pedido, u.nombre AS nombre_usuario, pr.nombre AS nombre_producto
        FROM pedidos AS p
        JOIN usuarios AS u
        ON p.id_usuario = u.id
        JOIN productos AS pr
        ON p.id_producto = pr.id
        WHERE u.correo = '$email'";
$conexion->consultar($sql);
$filas = $conexion->getFilas();
$result = $conexion->getResult();
$conexion->cerrar();

if ($filas > 0) { ?>
    <table>
        <thead>
            <tr>
                <th>Producto</th>
                <th>Cantidad</th>
                <th>Fecha</th>
                <th>Precio</th>
            </tr>
        </thead>
        <?php
        while ($fila = $result->fetch_assoc()) { ?>
            <tbody>
                <tr>
                    <td><?php echo $fila["nombre_producto"] ?></td>
                    <td><?php echo $fila["cantidad"] ?></td>
                    <td><?php echo $fila["fecha"] ?></td>
                    <td><?php echo $fila["precio"] ?></td>
                </tr>
            </tbody>
            <?php
        } ?>
    </table>
    <?php
} else { 
    echo "Usted no tiene pedidos. Solicitelos y apareceran aquí";
}?>