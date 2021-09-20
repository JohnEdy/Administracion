<?php
    // menu de navegacion y base de datos
 include('../control/arriba.php');
 include('../conexion/conexion.php');

 // seleciono el registro variable que llega por la URL

 $nro_registro_entidad = $_GET['nro_registro_entidad'];
 $consultar_registro = "SELECT * FROM entidades WHERE nro_registro_entidad = $nro_registro_entidad";
 $resultado_consultar_registro = mysqli_query($conexion,$consultar_registro);
 $resultado = mysqli_fetch_array($resultado_consultar_registro);

?>
     <center><br>
	
	   <form action="script_editar_entidad.php" method="POST">
	   	<h3>MUNICIPIO DE PEREIRA</h3><br>
	   	<h3>Registro Entidad</h3><br>
	   	 
	   	  Numero Registro: <br><br>
	   	  <input type="text" name="nro_registro_entidad" value="<?php echo $resultado['nro_registro_entidad']?>" readonly><br><br>
	   	  
	   	  Nombre Entidad: <br><br>
	   	  <input type="text" name="nombre_entidad" value="<?php echo $resultado['nombre_entidad']?>"><br><br>

	   	   Fecha Registro: <br><br>
	   	  <input type="date" name="fecha_registro"  value="<?php echo $resultado['fecha_registro']?>"><br><br>


	   	
	   	 <input type="submit" name="" value="Actualizar">

       

	   </form>
       </center>




<?php

?>