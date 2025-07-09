$(document).ready(function () {
    loadCategorias();
    loadNamesCategorias();
    loadProductos();
    loadPedidos();
    loadCatalogo(0);
    loadMenu();
    loadPedidosCliente();
})

function loadCategorias() {
    $.post("Modelo/loadCategorias.php", {}, function (respuesta) {
        $("#categorias").html(respuesta);
    })
}
//crud categoprias----------------------------------------------------------
    function loadNamesCategorias() {
        $.post("Modelo/loadCategorias.php", {}, function (respuesta) {
            $("#namesC").html(respuesta); 

            //conversion primer modal categorias-----------------------------{ 
                $("#fmrcategoria").dialog({ 
                    autoOpen: false, 
                    height: 310,
                    width: 400,
                    modal: true,
                    buttons: {
                        "Ingreso": ingresoNewIngreso, 
                        "Cancelar": cancelarNewing,
                    }  
                });
            //conversion primer modal categorias-----------------------------}  

            //conversion segundo modal categorias-----------------------------{
                $("#fmrcategoria22").dialog({ 
                    autoOpen: false, 
                    height: 310,
                    width: 400,
                    modal: true,
                    buttons: {
                        "Actualizar": UpdateCategories, 
                        "Cancelar": cancelarDialogActu,
                    }  
                });
            //conversion segundo modal categorias-----------------------------} 


        })
    } 

    // dialog de ingreso------------------------------------------------------{ 
        function mostrarNewIngreso(){ 
            $("#fmrcategoria").dialog('open');
        } 

        function cancelarNewing(){ 
            $(this).dialog('close');
        } 

        function ingresoNewIngreso(){ 

            var listdates= $("#razihell").serialize(); 
            var ConexionIndx= 'index.php?accion=IngresoCategos&'+ listdates; 
            $("#Natural").load(ConexionIndx, function(){ 
                location.reload();
            }); 
            $("#fmrcategoria").dialog('close');
        }
    //dialog de ingreso------------------------------------------------------} 

    // dialog de Actualizacion------------------------------------------------------{  

    function mostrarActualizacion (btn){ 

        var nombrecat= $(btn).data("nombrecat"); 
        var fechacat= $(btn).data("fechacat");
        var clavecat= $(btn).data("clavecat");

        $("#fmrcategoria22 input[name='NombreCat2']").val(nombrecat);
        $("#fmrcategoria22 input[name='BornFech2']").val(fechacat);
        $("#fmrcategoria22 input[name='ClaveCat2']").val(clavecat);

        $("#fmrcategoria22").dialog('open');
    }

    function cancelarDialogActu(){ 
        $(this).dialog('close');
    } 

    function UpdateCategories(){ 
        var listLog= $("#Warning").serialize(); 
        var bridgeINDX= "index.php?accion=updateCategos&"+listLog; 
        $("#Friction").load(bridgeINDX, function(){ 
            location.reload();
        }); 
        $("#fmrcategoria22").dialog('close');
    }
    // dialog de Actualizacion------------------------------------------------------}

//crud categoprias---------------------------------------------------------- 

// crud productos--------------------------------------------------------------------{ 
    function loadProductos() {
        $.post("Modelo/loadProductos.php", {}, function (respuesta) {
            $("#productos").html(respuesta); 
            
            // conversio dialog ingreso prod--------------------------------------------------------------------{
                $("#fmrproductos1").dialog({ 
                        autoOpen: false, 
                        height: 310,
                        width: 400,
                        modal: true,
                        buttons: {
                            "Nuevo": ingProd, 
                            "Cancelar": cancelar,
                        }  
                    }); 
            // conversio dialog ingreso prod--------------------------------------------------------------------{  

            // conversio dialog2 ingreso prod--------------------------------------------------------------------{
                $("#fmrproductos2").dialog({ 
                        autoOpen: false, 
                        height: 310,
                        width: 400,
                        modal: true,
                        buttons: {
                            "Actualizar": actualizarProducto, 
                            "Cancelar": cancelarUpdate,
                        }  
                    }); 
            // conversio dialog2 ingreso prod--------------------------------------------------------------------{ 

            // conversio dialog3 ingreso prod--------------------------------------------------------------------{
                $("#fmrimganes").dialog({ 
                        autoOpen: false, 
                        height: 310,
                        width: 400,
                        modal: true,
                        buttons: {
                            "ingresar": ingresoImgProd, 
                            "Cancelar": cancelarDialogImg,
                        }  
                    }); 
            // conversio dialog3 ingreso prod--------------------------------------------------------------------{


        })
    }   

    // primer dialog productos----------------------------------------------------------------------------------------{  

        function ingProd(){ 

            var deslist= $("#hxh").serialize(); 
            var redirec= 'index.php?accion=ingProds&'+ deslist;  
            $("#atakan").load(redirec, function(){ 
                location.reload();
            }); 
            $("#fmrproductos1").dialog('close');

        }
         
        function MostIngProductos (){ 
             
            $("#fmrproductos1").dialog('open')
        } 

        function cancelar(){ 
            $(this).dialog('close')
        }

    // primer dialog productos----------------------------------------------------------------------------------------} 

    // segundo dialog productos----------------------------------------------------------------------------------------{  

        function MostUpdate(btn){ 
            
            var precioprod= $(btn).data("precioprod"); 
            var categoriaprod = $(btn).data("categoriaprod");
            var marcaprod= $(btn).data("marcaprod");
            var modelprod= $(btn).data("modelprod");
            var tipoprod= $(btn).data("tipoprod");
            var espelsprod= $(btn).data("espelsprod");
            var claveprod= $(btn).data("claveprod");  


            $("#fmrproductos2 input[name='ProdPrecio2']").val(precioprod); 
            $("#fmrproductos2 select[name='ProdCategoria2']").val(categoriaprod);
            $("#fmrproductos2 input[name='ProdMarca2']").val(marcaprod);
            $("#fmrproductos2 input[name='ProdModelo2']").val(modelprod); 
            $("#fmrproductos2 select[name='ProdTipo2']").val(tipoprod); 
            $("#fmrproductos2 textarea[name='ProdEpec2']").val(espelsprod);  
            $("#fmrproductos2 input[name='ProdClave']").val(claveprod);  

            $("#fmrproductos2").dialog('open');
        } 

        function cancelarUpdate(){ 

            $(this).dialog('close');
        } 

        function actualizarProducto(){ 

            var lagerloger= $("#Asajakir").serialize(); 
            var inkdx= 'index.php?accion=actuprodocs&'+lagerloger; 
            $("#rakir").load(inkdx, function(){ 
                location.reload();
            }
            ); 
            $("#fmrproductos2").dialog('close');
        }
        
    // segundo dialog productos----------------------------------------------------------------------------------------}
    
    // tercer dialog productos----------------------------------------------------------------------------------------{  

        function mostrarDialog(btn){ 

            var listaruta= $(btn).data("listaruta"); 

            $("#fmrimganes input[name='IdProdImg']").val(listaruta);
            $("#fmrimganes").dialog('open');
        } 

        function cancelarDialogImg(){ 
            $(this).dialog('close');
        } 

        function ingresoImgProd(){ 
            

            var Gregarius= document.getElementById("razal"); 
            console.log(Gregarius);
            var DataGregarius= new FormData(Gregarius); 
            
            $.ajax({

                url:"index.php?accion=imgIngProd", 
                type:"POST",
                data: DataGregarius, 
                processData: false, 
                contentType: false,  
                success: function(response){ 
                    //location.reload();
                }, 
                error: function(xhr, status, error) {
                alert("Error al actualizar producto: " + error);
                }
            }) 
            $("#fmrimganes").dialog('close');
        }
        
    // tercer dialog productos----------------------------------------------------------------------------------------}

// crud productos--------------------------------------------------------------------}

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

function loadCatalogo(id) {
    $.post("Modelo/loadCatalogo.php", { id: id }, function (respuesta) {
        $("#catalogos").html(respuesta);
    })
}

function loadMenu() {
    $.post("Modelo/nav.php", {}, function (respuesta) {
        $("#menu").html(respuesta);
    })
}
//
    //funciones de crud categorias removidas
//

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