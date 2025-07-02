<?php
require_once "Conexion.php";
session_start();

$email = $_SESSION["email"];

$conexion = new Conexion();
$conexion->abrir();
$sql = "SELECT *, p.id AS id_pedido, c.nombre AS nombre_categoria
        FROM pedidos AS p
        JOIN usuarios AS u
        ON p.id_usuario = u.id
        JOIN productos AS pr
        ON p.id_producto = pr.id
        JOIN categorias AS c
        ON pr.id_categoria = c.id
        WHERE u.correo = '$email'";
$conexion->consultar($sql);
$filas = $conexion->getFilas();
$result = $conexion->getResult();
$conexion->cerrar();

if ($filas > 0) { ?>
    <table>
        <thead>
            <tr>
                <th>Marca</th>
                <th>Modelo</th>
                <th>Especificaciones</th>
                <th>Tipo</th>
                <th>Categoria</th>
                <th>Cantidad</th>
                <th>Precio</th>
            </tr>
        </thead>
        <?php
        while ($fila = $result->fetch_assoc()) { ?>
            <tbody>
                <tr>
                    <td><?php echo $fila["marca"] ?></td>
                    <td><?php echo $fila["modelos"] ?></td>
                    <td><?php echo $fila["tipo"] ?></td>
                    <td><?php echo $fila["nombre_categoria"] ?></td>
                    <td><?php echo $fila["cantidad"] ?></td>
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