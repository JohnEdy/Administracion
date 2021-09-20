 <?php
 // datos del formulario


$numero_registro_presu = 0;
$valor_presupuesto = $_POST['valor_presupuesto'];
$anho_presupuesto = $_POST['anho_presupuesto'];
$fecha_registro = date('Y-m-d');
$eliminar_registro = 1;


// Conectar al Servidor y seleccionar la Base de Datos

include("../conexion/conexion.php");

// SI LOS CAMPOS LLEGAN VACIOS 


if($valor_presupuesto=="" || $anho_presupuesto="") {

	 	echo "<script>alert('Los Campos son Obligatorios')</script>";
	    header("refresh: 0.2; url = ../registros/agregar_presupuesto.php");
}
else{



// Validar si registro existe con la misma Llave Principal


$consulta_existe="SELECT * FROM presupuesto WHERE numero_registro_presu=".$numero_registro_presu;
$query_consulta_existe = mysqli_query($conexion,$consulta_existe);
$cant_consulta_existe = mysqli_num_rows($query_consulta_existe);



if ($cant_consulta_existe > 0) {
	mysqli_close($conexion);
	echo "<script>alert('Presupuesto ya asignado')</script>";
	header("refresh: 0.2; url = ../control/arriba.php"); 
}
else
{

// Ejecutar Consulta

$consulta_agregar = "INSERT INTO `presupuesto`( `numero_registro_presu`,`valor_presupuesto`, `anho_presupuesto`, `fecha_registro`, `eliminar_registro`) VALUES ('$numero_registro_presu','$valor_presupuesto','$anho_presupuesto','$fecha_registro','$eliminar_registro')";


$resultado = mysqli_query($conexion, $consulta_agregar);


if ($resultado) {
	// Cerrar la conexión
	mysqli_close($conexion);
	echo "<script>alert('Registro Exitoso')</script>";
	header("refresh: 1; url = ../control/arriba.php");

}
else {
	
	mysqli_close($conexion);
	echo "<script>alert('Error!!! No se pudo registrar')</script>";
	header("refresh: 1; url = ../control/arriba.php"); 
}
}
}
?>