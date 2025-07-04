<?php
require_once "Conexion.php";
session_start();

$x = 0;
$total = 0;
if (!empty($_SESSION['carrito'])) {
    ?>
    <table>
        <thead>
            <tr>
                <th>Item</th>
                <th>Marca</th>
                <th>Modelo</th>
                <th>Tipo</th>
                <th>Cantidad</th>
                <th>Precio por Unidad</th>
                <th>Sub total</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($_SESSION['carrito'] as $producto) {
                $x++;
                $subtotal = $producto["precio"] * $producto["cantidad"];
                $total += $subtotal;
                ?>
                <tr>
                    <td><?php echo $x ?></td>
                    <td><?php echo $producto["marca"] ?></td>
                    <td><?php echo $producto["modelo"] ?></td>
                    <td><?php echo $producto["tipo"] ?></td>
                    <td><?php echo $producto["cantidad"] ?></td>
                    <td><?php echo '$'. number_format($producto["precio"]) ?></td>
                    <td><?php echo '$'. number_format($subtotal) ?></td>
                    <td><button onclick="eliminarProductoCarrito(<?php echo $producto['id_prod'] ?>)">Eliminar</button></td>
                </tr>
                <?php
            }
            ?>
        </tbody>
    </table>
    <h3>Total: $<?php echo number_format($total, 2); ?></h3>
    <br>
    <button onclick="confirmarPedido()">Confirmar Pedido</button>
    <?php
} else {
    echo "El carrito está vacío.";
}