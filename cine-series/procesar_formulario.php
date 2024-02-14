<?php
// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recuperar datos del formulario
    $nombre = $_POST["nombre"];
    $apellidos = $_POST["apellidos"];
    $email = $_POST["email"];
    $telefono = $_POST["telefono"];
    $asunto = $_POST["asunto"];
    $mensaje = $_POST["mensaje"];

    // Conectar a la base de datos
    $servername = "localhost";
    $username = "usuario";
    $password = "usuario";
    $dbname = "hlc";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Preparar la consulta SQL
        $stmt = $conn->prepare("INSERT INTO formulario (nombre, apellidos, email, telefono, asunto, mensaje) VALUES (?, ?, ?, ?, ?, ?)");

        // Ejecutar la consulta con los datos del formulario
        $stmt->execute([$nombre, $apellidos, $email, $telefono, $asunto, $mensaje]);

        // Cerrar la conexión
        $conn = null;

        // Redirigir a la página de éxito o hacer cualquier otra acción que desees
        header("Location: index.html");
        exit();
    } catch (PDOException $e) {
        // Manejar el error (puedes redirigir a una página de error)
        echo "Error: " . $e->getMessage();
    }
}
?>
