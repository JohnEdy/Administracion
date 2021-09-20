<?php
    // menu de navegacion y base de datos
 include('../control/arriba.php');
 include('../conexion/conexion.php');

 // seleciono el registro variable que llega por la URL

 $numero_registro_presu = $_GET['numero_registro_presu'];
 $consultar_registro = "SELECT * FROM presupuesto WHERE numero_registro_presu=$numero_registro_presu";
 $resultado_consultar_registro = mysqli_query($conexion,$consultar_registro);
 $resultado = mysqli_fetch_array($resultado_consultar_registro);

?>
     <center><br>
	
	   <form action="script_editar_presupuesto.php" method="POST">
	   	<h3>MUNICIPIO DE PEREIRA</h3><br>
	   	<h3>Registro Entidad</h3><br>
	   	 
	   	  Numero Registro: <br><br>
	   	  <input type="number" name="numero_registro_presu" value="<?php echo $resultado['numero_registro_presu']?>" readonly><br><br>
	   	  
	   	  Valor Presupuesto: <br><br>
	   	  <input type="number" name="valor_presupuesto" value="<?php echo $resultado['valor_presupuesto']?>"><br><br>


	   	  Año de Presupuesto: <br><br>
	   	  <input type="text" name="anho_presupuesto" value="<?php echo $resultado['anho_presupuesto']?>"><br><br>
           

	   	  Fecha Registro: <br><br>
	   	  <input type="date" name="fecha_registro"  value="<?php echo $resultado['fecha_registro']?>"><br><br>


	   	
	   	 <input type="submit" name="" value="Actualizar">

       

	   </form>
       </center>




<?php

?>