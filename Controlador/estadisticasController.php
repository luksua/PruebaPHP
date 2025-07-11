<?php
include '../Modelo/Conexion.php'; // Ajusta la ruta según tu estructura

$conexion = new Conexion();

$sql = "SELECT MONTH(fecha) AS mes, COUNT(*) AS total
        FROM pedidos
        GROUP BY mes
        ORDER BY mes";
$conexion->consultar($sql);
$result = $conexion->getResult();

$meses = [];
$totales = [];
while ($row = $result->fetch_assoc()) {
    $meses[] = date('F', mktime(0, 0, 0, $row['mes'], 10)); // Nombre del mes en inglés
    $totales[] = $row['total'];
}

echo json_encode(['labels' => $meses, 'data' => $totales]);
?>