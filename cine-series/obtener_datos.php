<?php
// Archivo de configuración de la base de datos
$db_host = "localhost";
$db_user = "usuario"; // Usuario de la base de datos
$db_pass = "usuario"; // Contraseña del usuario de la base de datos
$db_name = "hlc";

// Conexión a la base de datos
$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

// Comprobar conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Consulta para obtener todos los datos de la tabla formulario
$sql = "SELECT * FROM formulario";
$result = $conn->query($sql);

// Verificar si se encontraron resultados
if ($result->num_rows > 0) {
    // Construir una tabla HTML con los datos obtenidos
    echo "<table class='table'>";
    echo "<thead><tr><th>ID</th><th>Nombre</th><th>Apellidos</th><th>Email</th><th>Teléfono</th><th>Asunto</th><th>Mensaje</th><th>Fecha de Creación</th></tr></thead>";
    echo "<tbody>";
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>".$row["id"]."</td>";
        echo "<td>".$row["nombre"]."</td>";
        echo "<td>".$row["apellidos"]."</td>";
        echo "<td>".$row["email"]."</td>";
        echo "<td>".$row["telefono"]."</td>";
        echo "<td>".$row["asunto"]."</td>";
        echo "<td>".$row["mensaje"]."</td>";
        echo "<td>".$row["fecha_creacion"]."</td>";
        echo "</tr>";
    }
    echo "</tbody>";
    echo "</table>";
} else {
    echo "No se encontraron resultados.";
}

// Cerrar conexión
$conn->close();
?>
