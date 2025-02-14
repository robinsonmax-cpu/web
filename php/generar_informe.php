<?php
include 'db_connection.php';

// Consulta SQL para contar el total de citas
$sql = "SELECT COUNT(*) as total_citas FROM citas";
$result = pg_query($conn, $sql);

if ($result) {
    $row = pg_fetch_assoc($result);
    $total_citas = $row['total_citas'];
    echo "Total de citas agendadas: " . $total_citas;
} else {
    echo "Error al generar el informe: " . pg_last_error($conn);
}

pg_close($conn);
?>