<?php
require_once "Conexion.php";

$conexion = new Conexion();
$conexion->abrir();
$sql = "SELECT *, p.id AS id_producto, c.nombre AS nombre_categoria, p.nombre AS nombre_producto
        FROM productos AS p
        JOIN categorias AS c 
        ON p.id_categoria = c.id
        ORDER BY id_producto ASC";
$conexion->consultar($sql);
$filas = $conexion->getFilas();
$result = $conexion->getResult();
$conexion->cerrar();

if ($filas > 0) { ?>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Descripcion</th>
                <th>Categoría</th>
                <th>Precio</th>
                <th>Talla</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <?php
        while ($fila = $result->fetch_assoc()) { ?>
            <tbody>
                <tr>
                    <td><?php echo $fila["id_producto"] ?></td>
                    <td><?php echo $fila["nombre_producto"] ?></td>
                    <td><?php echo $fila["descripcion"] ?></td>
                    <td><?php echo $fila["nombre_categoria"] ?></td>
                    <td><?php echo $fila["precio"] ?></td>
                    <td><?php echo $fila["talla"] ?></td>
                    <td>
                        <button onclick="editarProducto(<?php echo $fila['id_producto'] ?>)">Editar</button>
                        <button onclick="eliminarProducto(<?php echo $fila['id_producto'] ?>)">Eliminar</button>
                    </td>
                </tr>
            </tbody>
            <?php
        } ?>
    </table>
    <?php
} ?>