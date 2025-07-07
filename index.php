<?php

session_start();

require_once "Modelo/Conexion.php";
require_once "Controlador/Controlador.php";
require_once "Controlador/ControladorCategorias.php";
require_once "Controlador/ControladorProductos.php";
require_once "Controlador/ControladorPedidos.php";
require_once "Modelo/Categorias.php";
require_once "Modelo/Productos.php";
require_once "Modelo/GestorAdmin.php";
require_once "Modelo/GestorCategorias.php";
require_once "Modelo/GestorProductos.php";
require_once "Modelo/GestorPedidos.php";

$controlador = new Controlador();
$controladorCategoria = new ControladorCategorias();
$controladorProducto = new ControladorProductos();
$controladorPedido = new ControladorPedidos();

if (isset($_GET["accion"])) {
    if ($_GET["accion"] == "admin") {
        $controlador->verPagina("Vista/html/login.html");
    } elseif ($_GET["accion"] == "catalogo") {
        $controlador->verPagina("Vista/html/catalogo.html");
    } elseif ($_GET["accion"] == "registro") {
        $controlador->verPagina("Vista/html/registro.html");
    } elseif ($_GET["accion"] == "login") {
        $controlador->login($_POST["email"], $_POST["password"]);
    } elseif ($_GET["accion"] == "logout") {
        $controlador->logout();
    } elseif ($_GET["accion"] == "registrarse") {
        $controlador->registro($_POST["name"], $_POST["email"], $_POST["password"], $_POST["password2"]);

    // VISTAS ADMIN
    } elseif ($_GET["accion"] == "panelAdmin") {
        $controlador->verPagina("Vista/html/adminProductos.html");
    } elseif ($_GET["accion"] == "adminPedidos") {
        $controlador->verPagina("Vista/html/adminPedidos.html");
    } elseif ($_GET["accion"] == "adminCategorias") {
        $controlador->verPagina("Vista/html/adminCategorias.html");

    // CRUD CATEGORIA
    } elseif ($_GET["accion"] == "agregarCategoria") {
        $controladorCategoria->agregarCategoria($_POST["nombre"]);
    } elseif ($_GET["accion"] == "eliminarCategoria") {
        $controladorCategoria->eliminarCategoria($_GET["id"]);
    } elseif ($_GET["accion"] == "editarCategoria") {
        $controladorCategoria->editarCategoria($_POST["id"], $_POST["nombre"]);
    
    // CRUD PEDIDOS
    } elseif ($_GET["accion"] == "completarPedido"){
        $controladorPedido->completarPedido($_GET["id"]);
    } elseif ($_GET["accion"] == "cancelarPedido"){
        $controladorPedido->cancelarPedido($_GET["id"]);
    
    // CRUD PRODUCTO
    } elseif ($_GET["accion"] == "agregarProducto") {
        $ruta_indexphp = "uploads";
        $extensiones = array(0 => 'image/jpg', 1 => 'image/jpeg', 2 => 'image/png');
        $max_tamanyo = 1024 * 1024 * 8;
        $imagen = $_FILES['imagen']['name'];
        $ruta_fichero_origen = $_FILES['imagen']['tmp_name'];
        $ruta_nuevo_destino = $ruta_indexphp . '/' . $_FILES['imagen']['name'];
        if (in_array($_FILES['imagen']['type'], $extensiones)) {
            echo 'Es una imagen';
            if ($_FILES['imagen']['size'] < $max_tamanyo) {
                echo 'Pesa menos de 1 MB';
                if (move_uploaded_file($ruta_fichero_origen, $ruta_nuevo_destino)) {
                    echo 'Fichero guardado con éxito';
                }
            }
        }

        $controladorProducto->agregarProducto($_POST["nombre"], $_POST["precio"], $_POST["talla"], $_POST["descripcion"], $_POST["categoria"], $imagen);
    } elseif ($_GET["accion"] == "eliminarProducto") {
        $controladorProducto->eliminarProducto($_GET["id"]);
    } elseif ($_GET["accion"] == "editarProducto") {
        $controladorProducto->editarProducto($_GET["id"]);
    } elseif ($_GET["accion"] == "editarProducto2") {
        $ruta_indexphp = "uploads";
        $extensiones = array(0 => 'image/jpg', 1 => 'image/jpeg', 2 => 'image/png');
        $max_tamanyo = 1024 * 1024 * 8;
        $imagen = $_FILES['imagen']['name'];
        $ruta_fichero_origen = $_FILES['imagen']['tmp_name'];
        $ruta_nuevo_destino = $ruta_indexphp . '/' . $_FILES['imagen']['name'];
        if (in_array($_FILES['imagen']['type'], $extensiones)) {
            echo 'Es una imagen';
            if ($_FILES['imagen']['size'] < $max_tamanyo) {
                echo 'Pesa menos de 1 MB';
                if (move_uploaded_file($ruta_fichero_origen, $ruta_nuevo_destino)) {
                    echo 'Fichero guardado con éxito';
                }
            }
        }

        $controladorProducto->editarProducto2($_POST["id"], $_POST["nombre"], $_POST["precio"], $_POST["talla"], $_POST["descripcion"], $_POST["categoria"], $imagen);

    // SOLICITAR COMPRA
    } elseif ($_GET["accion"] == "solicitarCompra") {
        $controladorProducto->solicitarCompra($_GET["id"]);
    
    // VISTA CLIENTE
    } elseif ($_GET["accion"] == "panelCliente") {
        $controlador->verPagina("Vista/html/cliente.html");
    } elseif ($_GET["accion"] == "registro") {
        $controlador->verPagina("Vista/html/registro.html");
    } elseif ($_GET["accion"] == "loadCarrito") {
        $controlador->verPagina("Vista/html/carrito.html");
    
    // CARRITO
    } elseif ($_GET["accion"] == "añadirProductoCarrito") {
        $controladorProducto->añadirProductoCarrito($_POST["id_producto"], $_POST["id_usuario"], $_POST["cantidad"]);
    } elseif ($_GET["accion"] == "confirmarPedido") {
        $controladorPedido->confirmarPedido();
    }
    // elseif ($_GET["accion"] == "mostrarProductos"){
    //     $controladorProducto->mostrarProductos($_GET["id"]);
    // }
} else {
    $controlador->verPagina("Vista/html/catalogo.html");
}