<?php
include 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];

    // Consulta SQL para cancelar una cita
    $sql = "DELETE FROM citas WHERE id = $1";
    $result = pg_query_params($conn, $sql, array($id));

    if ($result) {
        echo "Cita cancelada exitosamente.";
    } else {
        echo "Error al cancelar la cita: " . pg_last_error($conn);
    }
}

pg_close($conn);
?>