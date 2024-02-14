<?php
// Archivo de configuración
$db_host = "localhost";
$db_root_user = "root";
$db_root_pass = ""; // Contraseña del usuario root de MySQL
$db_name = "hlc";
$db_user = "usuario";
$db_pass = "usuario"; // Contraseña del usuario de la base de datos

// Conexión al servidor MySQL como root
$conn = new mysqli($db_host, $db_root_user, $db_root_pass);

// Comprobar conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Crear la base de datos si no existe
$sql_create_db = "CREATE DATABASE IF NOT EXISTS $db_name";
if ($conn->query($sql_create_db) === TRUE) {
    echo "Base de datos creada correctamente.<br>";
} else {
    echo "Error al crear la base de datos: " . $conn->error . "<br>";
}

// Crear el usuario de la base de datos
$sql_create_user = "CREATE USER IF NOT EXISTS '$db_user'@'localhost' IDENTIFIED BY '$db_pass'";
if ($conn->query($sql_create_user) === TRUE) {
    echo "Usuario de la base de datos creado correctamente.<br>";
} else {
    echo "Error al crear el usuario de la base de datos: " . $conn->error . "<br>";
}

// Asignar privilegios al usuario sobre la base de datos
$sql_grant_privileges = "GRANT ALL PRIVILEGES ON $db_name.* TO '$db_user'@'localhost'";
if ($conn->query($sql_grant_privileges) === TRUE) {
    echo "Privilegios asignados correctamente.<br>";
} else {
    echo "Error al asignar privilegios: " . $conn->error . "<br>";
}

// Cerrar conexión
$conn->close();
?>
