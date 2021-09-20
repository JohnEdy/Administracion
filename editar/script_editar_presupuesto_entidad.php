<?php

 include('../conexion/conexion.php');

$nro_registro = $_POST['nro_registro'];
$porcentaje_entidad = $_POST['porcentaje_entidad'];
$valor_presu_entidad = $_POST['valor_presu_entidad'];
$fecha_registro = $_POST['fecha_registro'];
$numero_registro_presu = $_POST['numero_registro_presu'];
$nro_registro_entidad = $_POST['nro_registro_entidad'];


// datos a actualizar


$consulta_actualizar = "UPDATE `presupuesto_asignado` SET `nro_registro`='$nro_registro',`porcentaje_entidad`='$porcentaje_entidad',`valor_presu_entidad`='$valor_presu_entidad',`fecha_registro`='$fecha_registro',`numero_registro_presu`='$numero_registro_presu',`nro_registro_entidad`='$nro_registro_entidad' WHERE nro_registro = $nro_registro";

$resultado = mysqli_query($conexion, $consulta_actualizar);


if ($resultado) {
	//4. Cerrar la conexión
	mysqli_close($conexion);
	echo "<script>alert('Actualización Exitosa')</script>";
	header("refresh: 0.2; url = ../consulta/visualizar_presupuesto_entidad.php");

}
else {
	//4. Cerrar la conexión
	mysqli_close($conexion);
	echo "<script>alert('Error!!! No se pudo Editar')</script>";
	header("refresh: 0.2; url = ../consulta/visualizar_presupuesto_entidad.php"); 
}



?>


?>