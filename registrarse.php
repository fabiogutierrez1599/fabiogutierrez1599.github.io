<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Registrarse - SSIPI</title>
</head>

<body style="background-image: url('img/afuera.jpg'); background-size: cover; background-position: center; height: 100vh; display: flex; justify-content: center; align-items: center;">
    <div class="container" style="background-color:white; max-width: 600px; padding: 30px; border-radius: 10px;">
        <div class="row">
            <div class="col text-center">
                <h2>Registrarse</h2>
            </div>
        </div>
        <form action="procesar_registro.php" method="POST">
            <div class="row">
                <div class="col-12">
                    <div class="mb-3">
                        <label for="noControl" class="form-label">Número de Control:</label>
                        <input type="text" class="form-control" id="noControl" name="noControl" required>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre completo:</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" required>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="mb-3">
                        <label for="correo" class="form-label">Correo electrónico:</label>
                        <input type="email" class="form-control" id="correo" name="correo" required>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="mb-3">
                        <label for="contra" class="form-label">Contraseña:</label>
                        <input type="password" class="form-control" id="contra" name="contraseña" required>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="mb-3">
                        <label for="confirmar_contra" class="form-label">Confirmar contraseña:</label>
                        <input type="password" class="form-control" id="confirmar_contra" name="confirmar_contra" required>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col text-center">
                    <button type="submit" class="btn btn-primary">Registrarse</button>
                </div>
            </div>
        </form>
        <div class="row" style="margin-top: 20px;">
            <div class="col text-center">
                <a href="index.php">Volver al inicio de sesión</a>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
        integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous">
    </script>
</body>

</html>
