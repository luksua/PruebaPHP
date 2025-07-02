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
        <nav>
            <a href="#">Inicio</a>
            <a href="index.php?accion=catalogo">Catálogo</a>
            <a href="#admin">Zona Admin</a>
        </nav>
    </header>

    <section id="panel-admin">
        <h2>Panel de Administración</h2>
        <div class="admin-section">
            <a href="index.php?accion=panelAdmin">Volver</a>
            <h3>Editar Productos</h3>
            <?php $fila = $result->fetch_assoc(); ?>

            <form action="index.php?accion=editarProducto2" method="post" class="form-admin"
                enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?php echo $fila['id_producto'] ?>">
                <input type="text" name="nombre" placeholder="Nombre del producto" value="<?php echo $fila['nombre_producto'] ?>">
                <input type="number" name="precio" placeholder="Precio" value="<?php echo $fila['precio'] ?>">
                <input type="text" name="talla" placeholder="Talla" value="<?php echo $fila['talla'] ?>">
                <input type="text" name="descripcion" placeholder="Descripcion" value="<?php echo $fila['descripcion'] ?>">
                <select name="categoria">
                    <option value="">Seleccionar Categoría</option>
                    <?php
                    while ($fila2 = $result2->fetch_assoc()) {
                        if ($fila2['id_cat'] == $fila2['cat_id']) {
                            $selected = 'selected';
                        } else {
                            $selected = '';
                        }
                        ?>
                        <option value="<?php echo $fila2['id']; ?>" <?php echo $selected; ?>>
                            <?php echo $fila2['nombre']; ?>
                        </option>
                        <?php
                    } ?>
                </select>
                <input type="file" name="imagen">
                <button type="submit">Editar Producto</button>
            </form>
        </div>
    </section>

    <footer>
        <p>&copy; 2025 Tienda de Tenis. Todos los derechos reservados.</p>
    </footer>
</body>

</html>