  <?php
// Configuración de la conexión
$host = "localhost";
$port = "5432"; // Puerto de PostgreSQL
$dbname = "medico"; // Nombre de la base de datos
$user = "postgres"; // Usuario de la base de datos
$password = "elias2003"; // Contraseña del usuario

try {
    // Crear conexión PDO
    $conn = new PDO("pgsql:host=$host;port=$port;dbname=$dbname", $user, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Si llegamos aquí, la conexión fue exitosa
    echo "Conexión a PostgreSQL establecida correctamente.";
} catch (PDOException $e) {
    // Si hay un error, se muestra un mensaje
    echo "Error de conexión: " . $e->getMessage();
}

// Cerrar conexión (opcional, se cierra automáticamente al final del script)
$conn = null;
?>