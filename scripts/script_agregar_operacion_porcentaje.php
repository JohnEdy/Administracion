<?php

   include('../conexion/conexion.php');
         // capturando los datos de las otras tablas 

    $nro_registro = 0;
    $porcentaje_entidad = $_POST['porcentaje_entidad'];
		$fecha_registro = date('Y-m-d');
		$numero_registro_presu = $_POST['numero_registro_presu'];
		$nro_registro_entidad = $_POST['nro_registro_entidad'];
		$eliminar_registro = 1;
		

		// validor si el valor sobrepasa el presupuesto disponible ...

        $consultaporcentaje = "SELECT SUM(porcentaje_entidad) AS porcentaje FROM presupuesto_asignado WHERE numero_registro_presu=$numero_registro_presu";
        //$total = 100;
        $ejecutarporcentaje = mysqli_query($conexion, $consultaporcentaje) or die ("No se puede consultar el porcentaje BD");

        $fetchporcentaje = mysqli_fetch_array($ejecutarporcentaje);
        $total = $fetchporcentaje['0'];

        /*while ($fetchporcentaje = mysqli_fetch_array($ejecutarporcentaje)) {

       $total=$total+$fetchporcentaje['2'];
    
       }    
       $total;

       $total_porcentaje=$total+$porcentaje_entidad;*/

       $faltante = 100-$total;

       if ($porcentaje_entidad>$faltante) {

       	mysqli_close($conexion);
          
          echo "<script>alert('Sobrepasa el Valor Disponible')</script>";
          header("refresh: 0.2; url = ../registros/agregar_porcentaje.php");
       }
       else{

	    // selecionar los datos existentes de la base de datos

		$seleccionar_presupuesto = "SELECT * FROM presupuesto WHERE numero_registro_presu=".$numero_registro_presu;

        $resul_consulta_presupuesto = mysqli_query($conexion,$seleccionar_presupuesto);

        $presupuesto = mysqli_fetch_array($resul_consulta_presupuesto);
        $presupuesto['valor_presupuesto'];
              
                

              $porcentaje = $porcentaje_entidad /100;

              $valor_presu_entidad = $porcentaje * $presupuesto['valor_presupuesto'];


       // validar si el registro ya existe en esta tabla 
    $consulta_existe = "SELECT * FROM presupuesto_asignado WHERE nro_registro=".$nro_registro;
		$query_consulta_existe = mysqli_query($conexion,$consulta_existe);
		$cant_consulta_existe = mysqli_num_rows($query_consulta_existe); 


       //valido si este registro ya existe en esta tabla 
		$consu_exi = "SELECT * FROM presupuesto WHERE numero_registro_presu =".$numero_registro_presu;
		$query_consu_exi = mysqli_query($conexion,$consu_exi);
		$canti_consu_exi = mysqli_num_rows($query_consu_exi);


if ($cant_consulta_existe >= 1){
	mysqli_close($conexion);

	echo "<script>alert('Este Dato Ya Esta Registrado')</script>";

	header("refresh: 1; url = ../registros/agregar_porcentaje.php");

}
else
{
         
$agregar_presupuesto = "INSERT INTO presupuesto_asignado (`nro_registro`, `porcentaje_entidad`, `valor_presu_entidad`, `fecha_registro`, `numero_registro_presu`, `nro_registro_entidad`, `eliminar_registro`) VALUES ('$nro_registro','$porcentaje_entidad','$valor_presu_entidad','$fecha_registro','$numero_registro_presu','$nro_registro_entidad','$eliminar_registro')";


 if (mysqli_query($conexion,$agregar_presupuesto)or die('no hay conexion')){

      echo "<script>alert('Registro Exitoso')</script>";
	  header("refresh: 1; url = ../control/arriba.php");
}
else {
echo "<script>alert('Error!!! No se pudo registar')</script>";
	  header("refresh: 1; url = ../control/arriba.php");




}
}
}
?>