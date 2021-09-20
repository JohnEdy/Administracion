<?php 
session_start();
if (empty($_SESSION['nombre_usuario']) && empty($_SESSION['contrasena_usuario'])) {
   //echo "<center><h1>No Puede Ingresar, debe resgistrarse</h1></center>";
   //echo "<a href='inicio.php'>";
   //echo "<meta http-equiv='refresh' content='3; url=registrate.php'>";

header("location:../index.php");
}
else{

?>
<!DOCTYPE html>
<html>
<head lang="es">
	<title>APPWEBS</title>
	<link rel="stylesheet" type="text/css" href="../css/menu_estilo.css">

	 <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	 <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

	  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    <script src="https://unpkg.com/@popperjs/core@2"></script>


	

</head>
<body>
  <header>
	<div class="container">

				<div id="header">

					<ul class="nav">
						<li><a href="../control/inicio.php">inicio</a></li>

					

						<li><a href="">Registros</a>

							<ul>
								<li><a href="../registros/agregar_presupuesto.php">Registro  Presupuesto</a></li>
								<li><a href="../registros/agregar_entidad.php">Registro Entidades</a></li>
								<li><a href="../registros/agregar_porcentaje.php">Registar Porcentajes</a></li>
								
							</ul>


						</li>

						<li><a href="">visualizar</a>

							<ul>
								<li><a href="../consulta/visualizar_presupuesto.php">Visualizar Presupuestos</a></li>
								<li><a href="../consulta/visualizar_entidad.php">Visualizar Entidades</a></li>
								<li><a href="../consulta/visualizar_presupuesto_entidad.php">Visualizar Porcentajes</a></li>
								
							</ul>

						</li>
						<li><a href="../porcentaje/descuento.php">Calcular</a></li>
						<li><a href="../control/salir.php">cerrar sesión</a></li>
					</ul>
					

				</div>
    </div>

</header>
</body>
</html>
<?php
	}

?>