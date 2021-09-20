<?php
    // menu de navegacion y base de datos
 include('../control/arriba.php');
 include('../conexion/conexion.php');

 // seleciono el registro variable que llega por la URL

 $nro_registro = $_GET['nro_registro'];
 $consultar_registro = "SELECT * FROM presupuesto_asignado WHERE nro_registro=$nro_registro";
 $resultado_consultar_registro = mysqli_query($conexion,$consultar_registro);
 $resultado = mysqli_fetch_array($resultado_consultar_registro);

?>
     <center><br>
	
	   <form action="script_editar_presupuesto_entidad.php" method="POST">
	   	<h3>MUNICIPIO DE PEREIRA</h3><br>
	   	<h3>Registro Entidad</h3><br>
	   	 
	   	  Numero Registro: <br><br>
	   	  <input type="text" name="nro_registro" value="<?php echo $resultado['nro_registro']?>" readonly><br><br>
	   	  
	   	  Porcentaje Entidad: <br><br>
	   	  <input type="number" name="porcentaje_entidad" value="<?php echo $resultado['porcentaje_entidad']?>"><br><br>

	   	   Valor Presupuesto: <br><br>
	   	  <input type="number" name="valor_presu_entidad" value="<?php echo $resultado['valor_presu_entidad']?>"><br><br>

	   	   Fecha Registro: <br><br>
	   	  <input type="date" name="fecha_registro" value="<?php echo $resultado['fecha_registro']?>"><br><br>


	   	  Registro Presupuesto: <br><br>
	   	  <input type="number" name="numero_registro_presu" value="<?php echo $resultado['numero_registro_presu']?>"><br><br>
           

	   	  Registro Entidad: <br><br>
	   	  <input type="text" name="nro_registro_entidad"  value="<?php echo $resultado['nro_registro_entidad']?>"><br><br>


	   	
	   	 <input type="submit" name="" value="Actualizar">

       

	   </form>
       </center>




<?php

?>