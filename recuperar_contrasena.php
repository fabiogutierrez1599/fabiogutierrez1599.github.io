<?php
require 'PHPMailer-master/src/Exception.php';
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $correoRecuperacion = $_POST['correoRecuperacion'];

    // Conexión a la base de datos
    require 'config/db.php';

    // Preparar la consulta para verificar si el correo está registrado
    $stmt = $conn->prepare("SELECT * FROM usuario WHERE correo = ?");
    if ($stmt === false) {
        die('Error en la consulta: ' . $conn->error); // Manejar el error si la preparación de la consulta falla
    }

    $stmt->bind_param("s", $correoRecuperacion);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $usuario = $result->fetch_assoc();
        $nombreUsuario = $usuario['nombre'];

        // Crear un token único para la recuperación de contraseña
        $token = bin2hex(random_bytes(50));

        // Actualizar la tabla de usuario con el token de recuperación
        $updateStmt = $conn->prepare("UPDATE usuario SET token = ? WHERE correo = ?");
        if ($updateStmt === false) {
            die('Error en la actualización: ' . $conn->error);
        }

        $updateStmt->bind_param("ss", $token, $correoRecuperacion);
        $updateStmt->execute();

        // Configurar PHPMailer para enviar el correo
        $mail = new PHPMailer(true);
        try {
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'tucorreo@gmail.com'; // Reemplaza con tu correo de Gmail
            $mail->Password = 'tu_contraseña'; // Reemplaza con tu contraseña o un App Password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;

            $mail->setFrom('tucorreo@gmail.com', 'SSIPI');
            $mail->addAddress($correoRecuperacion, $nombreUsuario);

            $mail->isHTML(true);
            $mail->Subject = 'Recuperación de contraseña';
            $mail->Body = "Hola $nombreUsuario,<br><br>Haga clic en el siguiente enlace para restablecer su contraseña:<br>
            <a href='http://tu-dominio.com/restablecer.php?token=$token'>Restablecer contraseña</a><br><br>Si no solicitó este cambio, ignore este correo.";

            $mail->send();
            echo 'Las instrucciones de recuperación han sido enviadas a su correo.';
        } catch (Exception $e) {
            echo "Error al enviar el correo: {$mail->ErrorInfo}";
        }
    } else {
        echo 'El correo electrónico no está registrado.';
    }

    // Cerrar las consultas y la conexión
    $stmt->close();
    $updateStmt->close();
    $conn->close();
}
?>
