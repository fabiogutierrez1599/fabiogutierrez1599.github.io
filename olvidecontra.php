<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Olvidé mi contraseña - SSIPI</title>
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
        <div class="container" style="background-color:white; max-width: 600px; padding: 30px; border-radius: 10px;">
            <div class="row">
                <div class="col text-center">
                    <h2>Olvidé mi contraseña</h2>
                    <p class="text-muted">Introduce tu correo electrónico para recibir un enlace de recuperación</p>
                </div>
            </div>
            <form action="procesar_olvido.php" method="POST">
                <div class="row">
                    <div class="col-12">
                        <div class="mb-3">
                            <label for="correo" class="form-label">Correo electrónico:</label>
                            <input type="email" class="form-control" id="correo" name="correo" required>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col text-center">
                        <button type="submit" class="btn btn-primary">Enviar enlace</button>
                    </div>
                </div>
            </form>
            <div class="row" style="margin-top: 20px;">
                <div class="col text-center">
                    <a href="login.html">Volver al inicio de sesión</a>
                </div>
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
