<?php

session_start();

require_once "Modelo/Conexion.php";
require_once "Controlador/Controlador.php";
require_once "Controlador/ControladorCategorias.php";
require_once "Controlador/ControladorProductos.php";
require_once "Controlador/ControladorPedidos.php";
require_once "Modelo/Categorias.php";
require_once "Modelo/Productos.php";
require_once "Modelo/Categorias.php";
require_once "Modelo/GestorAdmin.php";
require_once "Modelo/Pedidos.php";
require_once "Modelo/DetallePedido.php";
require_once "Modelo/GestorCategorias.php";
require_once "Modelo/GestorProductos.php";
require_once "Modelo/GestorPedidos.php";
require_once "Modelo/Imagenes.php";

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
    }

    // CRUD CATEGORIA
    elseif ($_GET['accion'] == "IngresoCategos") {
        $controladorCategoria->CategoriaIngreso(
            $_GET['NombreCat'],
            $_GET['BornFech']
        );
    } elseif ($_GET['accion'] == "updateCategos") {
        $controladorCategoria->ActualizarCategos(
            $_GET['NombreCat2'],
            $_GET['BornFech2'],
            $_GET['ClaveCat2']
        );
    } elseif ($_GET['accion'] == "delCategoria") {
        $controladorCategoria->DeleteCategorias(
            $_GET['clave3']
        );
    }
    //

    // CRUD PEDIDOS
    elseif ($_GET["accion"] == "completarPedido") {
        $controladorPedido->completarPedido($_GET["id"]);
    } elseif ($_GET["accion"] == "cancelarPedido") {
        $controladorPedido->cancelarPedido($_GET["id"]);
    } elseif ($_GET["accion"] == "estadoEnviado") {
        $controladorPedido->estadoEnviado($_GET["id"]);

        // CRUD PRODUCTO
    } elseif ($_GET["accion"] == "ingProds") {
        $controladorProducto->productoIngreso(
            $_GET['ProdPrecio'],
            $_GET['ProdCategoria'],
            $_GET['ProdMarca'],
            $_GET['ProdModelo'],
            $_GET['ProdTipo'],
            $_GET['ProdEpec']
        );
    } elseif ($_GET["accion"] == "actuprodocs") {

        $controladorProducto->productoActualizacion(
            $_GET['ProdPrecio2'],
            $_GET['ProdCategoria2'],
            $_GET['ProdMarca2'],
            $_GET['ProdModelo2'],
            $_GET['ProdTipo2'],
            $_GET['ProdEpec2'],
            $_GET['ProdClave']
        );
    } elseif ($_GET['accion'] == "deleteProducto") {

        $controladorProducto->deleteActualizacion(
            $_GET['Omegon']
        );
    } elseif ($_GET['accion'] == "imgIngProd") {


        $BoxFort = "uploads";
        $formatos_admitido = array('image/jpg', 'image/jpeg', 'image/webp', 'image/png', 'image/avif');
        $Tamaño_Maximo = 1024 * 1024 * 8;
        $idProd = $_POST['IdProdImg'];

        foreach ($_FILES['ListadoFotos']['name'] as $Posicion => $NombreArchivo) {
            $origenFoto = $_FILES['ListadoFotos']['tmp_name'][$Posicion];
            $tipoArchivo = $_FILES['ListadoFotos']['type'][$Posicion];
            $tamanoArchivo = $_FILES['ListadoFotos']['size'][$Posicion];
            $nombreUnico = time() . '_' . $NombreArchivo;
            $imgDestinoFinal = $BoxFort . '/' . $nombreUnico;


            if ($tamanoArchivo < $Tamaño_Maximo && in_array($tipoArchivo, $formatos_admitido)) {
                if (move_uploaded_file($origenFoto, $imgDestinoFinal)) {
                    $controladorProducto->ImagenesIngresoProd($idProd, $nombreUnico);
                }
            }
        }
    }

    // CRUD PRODUCTO 

    // SOLICITAR COMPRA
    elseif ($_GET["accion"] == "solicitarCompra") {
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