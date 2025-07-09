$(document).ready(function () {
    loadCategorias();
    loadNamesCategorias();
    loadProductos();
    loadPedidos();
    loadCatalogo(0);
    loadMenu();
    loadPedidosCliente();
    loadCarrito();
})

function loadCategorias() {
    $.post("Modelo/loadCategorias.php", {}, function (respuesta) {
        $("#categorias").html(respuesta);
    })
}

function loadNamesCategorias() {
    $.post("Modelo/loadNames.php", {}, function (respuesta) {
        $("#namesC").html(respuesta);
    })
}

function loadProductos() {
    $.post("Modelo/loadProductos.php", {}, function (respuesta) {
        $("#productos").html(respuesta);
    })
}

function loadPedidos() {
    $.post("Modelo/loadPedidos.php", {}, function (respuesta) {
        $("#pedidos").html(respuesta);
    })
}

function loadPedidosCliente() {
    $.post("Modelo/loadPedidosCliente.php", {}, function (respuesta) {
        $("#pedidosCliente").html(respuesta);
    })
}

function loadCarrito() {
    $.post("Modelo/loadCarrito.php", {}, function (respuesta) {
        $("#carrito").html(respuesta);
    })
}

function loadCatalogo(id, pagina = 1) {
    $.post("Modelo/loadCatalogo.php", { id: id, pagina: pagina }, function (respuesta) {
        $("#catalogos").html(respuesta);
    })
}

$(document).on('click', '.pagina-btn', function() {
    var pagina = $(this).data('pagina');
    var id = $('.select').val(); // obtiene la categoría seleccionada
    loadCatalogo(id, pagina);
});

function loadMenu() {
    $.post("Modelo/nav.php", {}, function (respuesta) {
        $("#menu").html(respuesta);
    })
}

function eliminarCategoria(id) {
    var id = id;
    if (confirm("Desea eliminar la categoria?")) {
        window.location.href = "index.php?accion=eliminarCategoria&id=" + id;
    }
}

function editarCategoria(id) {
    $.post("Modelo/loadEditarCategoria.php", { id: id }, function (respuesta) {
        $("#formEditarCategoria").html(respuesta);
    })
}

function eliminarProducto(id) {
    var id = id;
    if (confirm("Desea eliminar el producto?")) {
        window.location.href = "index.php?accion=eliminarProducto&id=" + id;
    }
}

function editarProducto(id) {
    var id = id;
    window.location.href = "index.php?accion=editarProducto&id=" + id;
}

function mostrarProductos(id) {
    loadCatalogo(id);
    // var id = id;
    // window.location.href = "index.php?accion=mostrarProductos&id=" + id;
}

function confirmarPedido() {
    window.location.href = "index.php?accion=confirmarPedido";
}

function solicitar(id) {
    var id = id;
    window.location.href = "index.php?accion=solicitarCompra&id=" + id;
}

function completarPedido(id) {
    var id = id;
    if (confirm("Está seguro de cambiar el estado del pedido a ENTREGADO?")) {
        window.location.href = "index.php?accion=completarPedido&id=" + id;
    }
}

function cancelarPedido(id) {
    var id = id;
    if (confirm("Está seguro de cambiar el estado del pedido a CANCELADO?")) {
        window.location.href = "index.php?accion=cancelarPedido&id=" + id;
    }
}

// CARRUSEL
$(document).on('click', '.carrusel-flecha', function() {
    var $carrusel = $(this).closest('.carrusel');
    var imagenes = JSON.parse($carrusel.attr('data-imagenes'));
    var $img = $carrusel.find('.carrusel-img');
    var actual = imagenes.indexOf($img.attr('src'));
    if ($(this).hasClass('izq')) {
        actual = (actual - 1 + imagenes.length) % imagenes.length;
    } else {
        actual = (actual + 1) % imagenes.length;
    }
    $img.attr('src', imagenes[actual]);
});