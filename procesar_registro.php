<?php
// Conectar a la base de datos
$servername = "localhost"; // Cambia si es necesario
$username = "root"; // Cambia a 'root' si usas XAMPP
$password = ""; // Cambia a '' si no tienes contraseña
$dbname = "pintegradores";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener los datos del formulario
$noControl = $_POST['noControl'];
$nombre = $_POST['nombre'];
$correo = $_POST['correo'];
$contraseña = $_POST['contraseña'];
$confirmar_contra = $_POST['confirmar_contra'];

// Validar que las contraseñas coinciden
if ($contraseña !== $confirmar_contra) {
    die("Las contraseñas no coinciden.");
}

// Comprobar si el número de control ya existe
$sql_check = "SELECT * FROM usuario WHERE noControl = ?";
$stmt_check = $conn->prepare($sql_check);
$stmt_check->bind_param("s", $noControl);
$stmt_check->execute();
$result = $stmt_check->get_result();

if ($result->num_rows > 0) {
    die("El número de control ya está registrado. Por favor, use otro número.");
}
$stmt_check->close();

// Preparar la consulta
$hashed_password = password_hash($contraseña, PASSWORD_DEFAULT);
$sql = "INSERT INTO usuario (noControl, correo, contraseña, nombre) VALUES (?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssss", $noControl, $correo, $hashed_password, $nombre);

if ($stmt->execute()) {
    echo "Registro exitoso.";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
