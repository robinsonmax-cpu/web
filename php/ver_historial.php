<?php
include 'db_connection.php';

// Consulta SQL para obtener todas las citas
$sql = "SELECT * FROM citas";
$result = pg_query($conn, $sql);

if ($result && pg_num_rows($result) > 0) {
    echo "<table border='1'>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Fecha</th>
                <th>Hora</th>
                <th>Motivo</th>
            </tr>";

    while ($row = pg_fetch_assoc($result)) {
        echo "<tr>
                <td>".$row['id']."</td>
                <td>".$row['nombre']."</td>
                <td>".$row['fecha']."</td>
                <td>".$row['hora']."</td>
                <td>".$row['motivo']."</td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "No hay citas agendadas.";
}

pg_close($conn);
?>