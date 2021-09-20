<?php
 include('../conexion/conexion.php');

$nro_registro_entidad = $_POST['nro_registro_entidad'];
$nombre_entidad = $_POST['nombre_entidad'];
$fecha_registro = $_POST['fecha_registro'];



$consulta_actualizar = "UPDATE `entidades` SET `nro_registro_entidad`='$nro_registro_entidad' ,`nombre_entidad`='$nombre_entidad',`fecha_registro`='$fecha_registro' WHERE nro_registro_entidad=$nro_registro_entidad";

$resultado = mysqli_query($conexion, $consulta_actualizar);


if ($resultado) {
	//4. Cerrar la conexión
	mysqli_close($conexion);
	echo "<script>alert('Actualización Exitosa')</script>";
	header("refresh: 0.2; url = ../consulta/visualizar_entidad.php");

}
else {
	//4. Cerrar la conexión
	mysqli_close($conexion);
	echo "<script>alert('Error!!! No se pudo Editar')</script>";
	header("refresh: 0.2; url = ../consulta/visualizar_entidad.php"); 
}

?>