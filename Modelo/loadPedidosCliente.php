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
                <th>#</th>
                <th>Marca</th>
                <th>Modelo</th>
                <th>Especificaciones</th>
                <th>Tipo</th>
                <th>Categoria</th>
                <th>Cantidad</th>
                <th>Precio</th>
                <th>Estado</th>
            </tr>
        </thead>
        <tbody>
        <?php
        $i = 1;
        while ($fila = $result->fetch_assoc()) { ?>
            <tr>
                <td><?php echo $i++; ?></td>
                <td><?php echo htmlspecialchars($fila["marca"]); ?></td>
                <td><?php echo htmlspecialchars($fila["modelos"]); ?></td>
                <td><?php echo htmlspecialchars($fila["especificaciones"]); ?></td>
                <td><?php echo htmlspecialchars($fila["tipo"]); ?></td>
                <td><?php echo htmlspecialchars($fila["nombre_categoria"]); ?></td>
                <td><?php echo $fila["cantidad"]; ?></td>
                <td><?php echo '$' . number_format($fila["precio"], 2); ?></td>
                <td><?php echo htmlspecialchars($fila["estado"]); ?></td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
<?php
} else { 
    echo "Usted no tiene pedidos. Solicítelos y aparecerán aquí.";
}