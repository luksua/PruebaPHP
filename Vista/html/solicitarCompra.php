<!-- index.html -->
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda de Tenis</title>
    <link rel="stylesheet" href="Vista/css/styles.css">
    <script src="Vista/jquery/jquery.js"></script>
    <script src="Vista/js/script.js"></script>
</head>

<body>
    <header>
        <h1>Tienda de Tenis</h1>
        <div id="menu">

        </div>
    </header>

    <section id="catalogo">
        <h2>Solicitar Compra</h2>
        <div class="admin-section">
            <p class="a"><strong>Datos</strong></p>
            <?php $fila = $result->fetch_assoc() ?>
            <?php $fila2 = $result2->fetch_assoc() ?>
            <form action="index.php?accion=agregarCompra" method="post" class="form-admin">
                <input type="hidden" name="id_producto" value="<?php echo $fila['id_producto'] ?>">
                <input type="hidden" name="id_usuario" value="<?php echo $fila2['id'] ?>">
                <input type="text" value="<?php echo $fila['nombre_producto'] ?>" placeholder="Nombre del producto"
                    readonly>
                <input type="number" name="cantidad" placeholder="Cantidad">
                <button type="submit">Guardar Producto</button>
            </form>
        </div>
    </section>

    <footer>
        <p>&copy; 2025 Tienda de Tenis. Todos los derechos reservados.</p>
    </footer>
</body>

</html>