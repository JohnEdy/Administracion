<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/estilo_nuevo_registro.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet">

</head>
<body>
    <form action="scripts/script_nuevo_usuario.php" method="POST" id="form">
        <div class="form">
            <h1>Registros</h1>
            <div class="grupo">
                <input type="text" name="nombre_usuario" id="name" required><span class="barra"></span>
                <label for="">Nombre</label>
            </div>
            <div class="grupo">
                <input type="email" name="correo_usuario" id="email" required><span class="barra"></span>
                <label for="">Email</label>
            </div>
            <div class="grupo">
                <input type="password" name="contrasena_usuario" id="password" required><span class="barra"></span>
                <label for="">Password</label>
            </div>

             <div class="form-check">
              <input class="form-check-input" type="checkbox" id="gridCheck">
              <label class="form-check-label" for="gridCheck"><p class="text-primary">Acepto los teminos de uso de la aplicacion web</p></label>
            </div>

            <button type="submit">Registrarse</button>
            <center>
             <div class="col-12 forgot">
                    <a href="index.php">Iniciar Sesión</a>
             </div>
            </center>
        </div>
    </form>
    <script src="main.js"></script>
</body>
</html>