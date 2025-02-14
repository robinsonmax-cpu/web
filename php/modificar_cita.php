<?php
include 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $fecha = $_POST['fecha'];
    $hora = $_POST['hora'];
    $motivo = $_POST['motivo'];

    // Consulta SQL para modificar una cita
    $sql = "UPDATE citas SET nombre = $1, fecha = $2, hora = $3, motivo = $4 WHERE id = $5";
    $result = pg_query_params($conn, $sql, array($nombre, $fecha, $hora, $motivo, $id));

    if ($result) {
        echo "Cita modificada exitosamente.";
    } else {
        echo "Error al modificar la cita: " . pg_last_error($conn);
    }
}

pg_close($conn);
?>