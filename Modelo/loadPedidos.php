<?php
require_once "Conexion.php";

$conexion = new Conexion();
$conexion->abrir();
$sql =" SELECT pedidos.*, usuarios.nombre, dp.cantidad FROM pedidos 
        JOIN usuarios 
        ON pedidos.id_usuario = usuarios.id
        JOIN detalle_pedido AS dp
        ON pedidos.id = dp.id_pedido
        ";
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
                    <td><?php echo $fila['id']; ?></td>
                    <td><?php echo $fila['nombre']; ?></td>
                    <td><?php echo $fila['cantidad']; ?></td>
                    <td><?php echo $fila['fecha']; ?></td>
                    <td><?php echo $fila['estado']; ?></td>
                    <td>
                        <button onclick="completarPedido(<?php echo $fila['id'] ?>)">Completar pedido</button>
                        <button onclick="cancelarPedido(<?php echo $fila['id'] ?>)">Cancelar pedido</button>
                        <button onclick="estadoEnviado(<?php echo $fila['id'] ?>)">Marcar como enviado</button>
                    </td>
                </tr>
            </tbody>
            <?php
        } ?>
    </table>
    <?php
} ?>