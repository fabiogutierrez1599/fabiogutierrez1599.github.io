<?php
session_start();
require 'config/db.php'; // Asegúrate de que esta ruta sea correcta

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $correo = $_POST['correo'];
    $contraseña = $_POST['contra'];

    // Consulta para verificar el usuario y el estado
    $stmt = $conn->prepare("SELECT * FROM usuario WHERE correo = ? AND contraseña = ?");
    $stmt->bind_param("ss", $correo, $contraseña);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $usuario = $result->fetch_assoc();

        // Verificar el estado del usuario
        if ($usuario['estado'] == 'Activo') {
            // Guardar información en la sesión
            $_SESSION['noControl'] = $usuario['noControl'];
            $_SESSION['nombre'] = $usuario['nombre'];

            // Redirigir al menú con el parámetro bienvenida=true
            header("Location: residente/menu.php?bienvenida=true");
            exit();
        } else {
            // Si el estado es Inactivo, mostrar mensaje de error
            header("Location: index.php?error=inactive");
            exit();
        }
    } else {
        // Redirigir con un mensaje de error si las credenciales son incorrectas
        header("Location: index.php?error=credentials");
        exit();
    }

    $stmt->close();
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>SSIPI</title>
    <style>
        body {
            background-image: url('img/afuera.jpg');
            background-size: cover;
            background-position: center;
            height: 100vh;
        }
    </style>
</head>

<body>
    <div class="d-flex justify-content-center align-items-center vh-100">
        <div class="container" style="background-color:white; padding: 30px; border-radius: 10px;">
            <div class="row">
                <div class="col-5">
                    <img src="img/logo.webp" height="400px" width="400px" alt="Logo">
                </div>
                <div class="col-7">
                    <div class="row">
                        <div class="col-12 text-center" style="padding-top:30px">
                            <h2>SISTEMA DE SEGUIMIENTO DE PROYECTOS INTEGRADORES PARA EL INSTITUTO TECNOLÓGICO SUPERIOR DE SAN MARTIN TEXMELUCAN (SSIPI)</h2>
                        </div>
                    </div>

                    <form style="padding-top: 50px;" method="POST" action="">
                    <?php if (isset($_GET['error']) && $_GET['error'] == 'inactive'): ?>
                        <div class="alert alert-danger" role="alert">
                            Su cuenta está inactiva. No puede acceder al sistema.
                        </div>
                    <?php endif; ?>
                        <div class="row mb-3">
                            <div class="col-4">
                                <label>Correo electrónico:</label>
                            </div>
                            <div class="col-8">
                                <input type="email" class="form-control" id="correo" name="correo" required>
                                <small class="form-text text-muted">*Campo obligatorio</small>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-4">
                                <label>Contraseña:</label>
                            </div>
                            <div class="col-8">
                                <input type="password" class="form-control" id="contra" name="contra" required>
                                <small class="form-text text-muted">*Campo obligatorio</small>
                            </div>
                        </div>

                        <div class="row mt-4 text-center">
                            <div class="col-12">
                                <input class="btn btn-primary" type="submit" value="INICIAR SESIÓN">
                            </div>
                        </div>
                        
                        <div class="row mt-3 text-center">
                            <div class="col">
                                <a href="registrarse.php">Registrarse</a>
                            </div>
                            <div class="col">
                                <a href="#" data-bs-toggle="modal" data-bs-target="#recuperarModal">Recuperar contraseña</a>
                            </div>
                            <div class="col">
                                <a href="">Olvidé mi contraseña</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal de Recuperación de Contraseña -->
    <div class="modal fade" id="recuperarModal" tabindex="-1" aria-labelledby="recuperarModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="recuperarModalLabel">Recuperar contraseña</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="recuperar_contrasena.php">
                        <div class="mb-3">
                            <label for="correoRecuperacion" class="form-label">Correo electrónico:</label>
                            <input type="email" class="form-control" id="correoRecuperacion" name="correoRecuperacion" required>
                            <small class="form-text text-muted">Ingrese su correo electrónico registrado para recibir instrucciones de recuperación.</small>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Enviar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" crossorigin="anonymous"></script>
    <script src="../js/bienvenida.js"></script>
    <script src="../js/error.js"></script>
</body>
</html>
