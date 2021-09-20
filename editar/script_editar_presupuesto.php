<?php


 include('../conexion/conexion.php');

$numero_registro_presu = $_POST['numero_registro_presu'];
$valor_presupuesto = $_POST['valor_presupuesto'];
$anho_presupuesto = $_POST['anho_presupuesto'];
$fecha_registro = $_POST['fecha_registro'];


// datos a actualizar


$consulta_actualizar = "UPDATE `presupuesto` SET `valor_presupuesto`='$valor_presupuesto',`anho_presupuesto`='$anho_presupuesto',`fecha_registro`='$fecha_registro' WHERE numero_registro_presu=$numero_registro_presu";


$resultado = mysqli_query($conexion, $consulta_actualizar);


if ($resultado) {
	//4. Cerrar la conexión
	mysqli_close($conexion);
	echo "<script>alert('Actualización Exitosa')</script>";
	header("refresh: 0.2; url = ../consulta/visualizar_presupuesto.php");

}
else {
	//4. Cerrar la conexión
	mysqli_close($conexion);
	echo "<script>alert('Error!!! No se pudo Editar')</script>";
	header("refresh: 0.2; url = ../consulta/visualizar_presupuesto.php"); 
}



?>