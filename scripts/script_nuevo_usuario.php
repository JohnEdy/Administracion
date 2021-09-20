<?php
error_reporting(0);

include('../conexion/conexion.php');

$nombre_usuario = $_POST['nombre_usuario'];
$correo_usuario = $_POST['correo_usuario'];
$contrasena_usuario = $_POST['contrasena_usuario'];


session_start();// inicia una nueva sesion o reanuda ya la existente

  $_SESSION['nombre_usuario'] = $nombre_usuario;  
  $_SESSION['correo_usuario'] = $correo_usuario;  
  $_SESSION['contrasena_usuario'] = $contrasena_usuario; 

  // si los campos bienen vacios 

  if($nombre_usuario=="" || $correo_usuario=="" || $contrasena_usuario==""){

          echo "<script>alert('Los Campos son Obligatorios')</script>";
          header("refresh: 0.2; url = ../nuevo_usuario.php");
  }
  else{



   // validar si el registrpo ya existe 


  $consulta_existe = "SELECT * FROM usuarios WHERE nombre_usuario='$nombre_usuario' AND contrasena_usuario='$contrasena_usuario'";
  $query_consulta_existe = mysqli_query($conexion,$consulta_existe);
  $cantidad_existe = mysqli_num_rows($query_consulta_existe);

  if ($cantidad_existe > 0) {
  	mysqli_close($conexion);

  	echo "<script>alert('Este Usuario ya Esta Registrado')</script>";
    header("refresh: 0.5; url = ../index.php");
    
  }

else{
  	// agregando los nuevos usuarios a la base de datos s
 
$consulta = "INSERT INTO usuarios ( `nombre_usuario` , `correo_usuario` , `contrasena_usuario`) VALUES ('$nombre_usuario','$correo_usuario','$contrasena_usuario')";
$resultado = mysqli_query($conexion, $consulta) or die("no consulta");

if ($resultado) {
	//4. Cerrar la conexión
	mysqli_close($conexion);
	echo "<script>alert('Registro Exitoso')</script>";
	header("refresh: 1; url = ../index.php");

}
else {
	//4. Cerrar la conexión
	mysqli_close($conexion);
	echo "<script>alert('Error!!! No se pudo registrar')</script>";
	header("refresh: 1; url =  ../index.php"); 




}
}
}
?>
