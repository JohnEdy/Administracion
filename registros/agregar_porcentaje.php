    <?php

	  include('../control/arriba.php');

	?>

	
	  <center> <br>
	   <form action="../scripts/script_agregar_operacion_porcentaje.php" method="POST">
	   	<h3>MUNICIPIO DE PEREIRA</h3>
	   	   <h3>Registro Porcentaje</h3><br>
	   	  Nombre de la Entidad:
	   	  <select name="nro_registro_entidad">

	   	  	<?php
              include("../conexion/conexion.php");
              $seleccionar_entidades="SELECT * from entidades";

              $resul_seleccionar_entidades=mysqli_query($conexion,$seleccionar_entidades);

              while($cada_fila=mysqli_fetch_array($resul_seleccionar_entidades)){
                echo "<option value='".$cada_fila['nro_registro_entidad']."'>".$cada_fila['nombre_entidad']."</option>";
              }

            ?>
              
            </select><br><br>


	       Año : 

	       <select name="numero_registro_presu">
            <?php
              include("../conexion/conexion.php");
              $seleccionar_presupuesto="SELECT * from presupuesto";
              $resul_seleccionar_presupuesto=mysqli_query($conexion,$seleccionar_presupuesto);

              while($cada_fila=mysqli_fetch_array($resul_seleccionar_presupuesto)){
                echo "<option value='".$cada_fila['numero_registro_presu']."'>".$cada_fila['anho_presupuesto']."</option>";
              }

            ?>
           </select><br><br>

	   	  Porcentaje %: <br>
	   	  <input type="number" name="porcentaje_entidad" required=""> <br><br>

	   	 <input type="submit" name="" value="Registrar">

       

	   </form>

     </center>
   