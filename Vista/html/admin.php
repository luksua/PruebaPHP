<?php
require_once 'Controlador/ControladorProductos.php';
$controlador = new ControladorProductos();

list($labelsVendidos, $dataVendidos) = $controlador->getProductosMasVendidos();
list($labelsEstado, $dataEstado) = $controlador->getEstadisticasEstadoPedidos();
?>
<!-- index.html -->
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda Electronica</title>
    <link rel="stylesheet" href="Vista/css/styles.css">
    <script src="Vista/jquery/jquery.js"></script>
    <script src="Vista/js/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>
    <header>
        <h1>Tienda Electronica</h1>
        <nav>
            <a href="#">Inicio</a>
            <a href="index.php?accion=catalogo">Catálogo</a>
            <a href="#admin">Zona Admin</a>
        </nav>
    </header>

    <section id="panel-admin">
        <div class="admin-section">
            <h3>Estadísticas</h3>
            <canvas id="ventasPorMes" width="400" height="200"></canvas>
            <canvas id="graficaPedidosMes" width="400" height="200"></canvas>
            <script>
                fetch('Controlador/estadisticasController.php')
                    .then(response => response.json())
                    .then(stats => {
                        const ctx = document.getElementById('graficaPedidosMes').getContext('2d');
                        const chart = new Chart(ctx, {
                            type: 'line',
                            data: {
                                labels: stats.labels,
                                datasets: [{
                                    label: 'Pedidos por mes',
                                    data: stats.data,
                                    borderColor: 'rgba(75, 192, 192, 1)',
                                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                                    fill: true,
                                    tension: 0.1
                                }]
                            },
                            options: {
                                plugins: {
                                    subtitle: {
                                        display: true,
                                        text: 'Pedidos mensuales'
                                    }
                                }
                            }
                        });
                    });
            </script>
        </div>
        <div class="admin-section">
            <h3>Productos más vendidos</h3>
            <canvas id="productosVendidosChart" width="400" height="200"></canvas>
        </div>
        <div class="admin-section">
            <h3>Pedidos por estado</h3>
            <canvas id="estadoPedidosChart" width="400" height="200"></canvas>
        </div>
    </section>

    <footer>
        <p>&copy; 2025 . Todos los derechos reservados.</p>
    </footer>

    <?php
    require_once 'Controlador/ControladorProductos.php';
    $controlador = new ControladorProductos();

    list($labelsVendidos, $dataVendidos) = $controlador->getProductosMasVendidos();
    list($labelsEstado, $dataEstado) = $controlador->getEstadisticasEstadoPedidos();
    ?>

    <script>
        const labelsVendidos = <?php echo json_encode($labelsVendidos); ?>;
        const dataVendidos = <?php echo json_encode($dataVendidos); ?>;

        const ctxVendidos = document.getElementById('productosVendidosChart').getContext('2d');
        new Chart(ctxVendidos, {
            type: 'bar',
            data: {
                labels: labelsVendidos,
                datasets: [{
                    label: 'Cantidad vendida',
                    data: dataVendidos,
                    backgroundColor: 'rgba(54, 162, 235, 0.5)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                plugins: {
                    subtitle: {
                        display: true,
                        text: 'Top 5 productos más vendidos'
                    }
                },
                scales: {
                    y: { beginAtZero: true }
                }
            }
        });

        const labelsEstado = <?php echo json_encode($labelsEstado); ?>;
        const dataEstado = <?php echo json_encode($dataEstado); ?>;

        const ctxEstado = document.getElementById('estadoPedidosChart').getContext('2d');
        new Chart(ctxEstado, {
            type: 'doughnut',
            data: {
                labels: labelsEstado,
                datasets: [{
                    label: 'Cantidad de pedidos',
                    data: dataEstado,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.5)',
                        'rgba(54, 162, 235, 0.5)',
                        'rgba(255, 206, 86, 0.5)',
                        'rgba(75, 192, 192, 0.5)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                plugins: {
                    subtitle: {
                        display: true,
                        text: 'Pedidos por estado'
                    }
                }
            }
        });
    </script>
</body>

</html>