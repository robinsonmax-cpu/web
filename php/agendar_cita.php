<?php
include 'db_connection.php';



try {
   
    // Verificar si el formulario fue enviado
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Obtener los datos del formulario
        $nombre = $_POST['nombre'];
        $fecha = $_POST['fecha'];
        $hora = $_POST['hora'];
        $motivo = $_POST['motivo'];

        // Consulta SQL para insertar una cita
        $sql = "INSERT INTO citas (nombre, fecha, hora, motivo) VALUES (:nombre, :fecha, :hora, :motivo)";
        $stmt = $conn->prepare($sql);

        // Asignar valores a los parámetros
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':fecha', $fecha);
        $stmt->bindParam(':hora', $hora);
        $stmt->bindParam(':motivo', $motivo);

        // Ejecutar la consulta
        if ($stmt->execute()) {
            echo "Cita agendada exitosamente.";
        } else {
            echo "Error al agendar la cita.";
        }
    }
} catch (PDOException $e) {
    echo "Error de conexión: " . $e->getMessage();
}

// Cerrar conexión (opcional, se cierra automáticamente al final del script)
$conn = null;
