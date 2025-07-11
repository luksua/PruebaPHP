<?php session_start() ?>
<nav>
    <?php
    if (isset($_SESSION["email"])) { ?>
        <?php
        if ($_SESSION["rol"] == "cliente") { ?>
            <a href="index.php?accion=catalogo">Inicio</a>
            <a href="index.php?accion=catalogo">Catálogo</a>
            <a href="index.php?accion=loadCarrito">Carrito</a>
            <a href="index.php?accion=panelCliente">Mis Pedidos</a>
            <a href="index.php?accion=logout">Cerrar Sesión</a>
            <?php
        } else { ?>
            <a href="index.php?accion=catalogo">Inicio</a>
            <a href="index.php?accion=catalogo">Catálogo</a>
            <a href="index.php?accion=panelAdmin">Productos</a>
            <a href="index.php?accion=adminPedidos">Pedidos</a>
            <a href="index.php?accion=adminCategorias">Categorías</a>
            <a href="index.php?accion=adminEstadisticas">Zona Admin</a>
            <a href="index.php?accion=logout">Cerrar Sesión</a>
        <?php } ?>
        <?php
    } else { ?>
        <a href="index.php?accion=catalogo">Inicio</a>
        <a href="index.php?accion=catalogo">Catálogo</a>
        <a href="index.php?accion=registro">Registrarse</a>
        <a href="index.php?accion=admin">Iniciar Sesión</a>
        <?php
    } ?>
</nav>