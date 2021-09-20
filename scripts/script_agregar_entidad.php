<?php
error_reporting(0);
 // datos del formulario


$nro_registro_entidad = 0;
$nombre_entidad = $_POST['nombre_entidad'];
$fecha_registro = date('Y-m-d');
$eliminar_registro= 1;


// Conectar al Servidor y seleccionar la Base de Datos

include("../conexion/conexion.php");

if ($nombre_entidad==""){
   
   	echo "<script>alert('Los Campos son Obligatorios')</script>";
	header("refresh: 0.2; url = ../registros/agregar_entidad.php"); 	
  
}
else{

// Validar si registro existe con la misma Llave Principal


$consulta_existe="SELECT * FROM entidades WHERE nro_registro_entidad='$nro_registro_entidad' || nombre_entidad='$nombre_entidad'";
$query_consulta_existe=mysqli_query($conexion,$consulta_existe);
$cant_consulta_existe=mysqli_num_rows($query_consulta_existe);



if ($cant_consulta_existe >= 1) {
	mysqli_close($conexion);
	echo "<script>alert('Entidad ya registrada')</script>";
	header("refresh: 0.2; url = ../control/arriba.php"); 
}
else
{

// Ejecutar ConsultaS

$consulta_agregar = "INSERT INTO `entidades` ( `nombre_entidad`, `fecha_registro`, `eliminar_registro`) VALUES ('$nombre_entidad','$fecha_registro','$eliminar_registro')";

$resultado = mysqli_query($conexion, $consulta_agregar);

if ($resultado) {
	// Cerrar la conexión
	mysqli_close($conexion);
	echo "<script>alert('Registro Exitoso')</script>";
	header("refresh: 1; url = ../control/arriba.php");

}
else {
	//4. Cerrar la conexión
	mysqli_close($conexion);
	echo "<script>alert('Error!!! No se pudo registrar')</script>";
	header("refresh: 1; url = ../control/arriba.php"); 
}
}
}
?>