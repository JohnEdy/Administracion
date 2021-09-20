   <?php

	  include('../control/arriba.php');

	?>

  <center>
     <br><br><br>
	<h1 align="center">Contabilidad</h1>

	<form action="descuento.php" method="POST">
		<fieldset>

			<legend>INGRESO DE DATOS</legend>
			<label for="entidad">Nombre entidad</label>
			<input type="text" name="entidad" placeholder="Entidad" id="entidad">
			<br><br>
			<label for="presu_asig">Presupuesto</label>
			<input type="number" name="presu_asig" placeholder="Presupuesto" id="presu_asig">
				
			<br><br>

			<label for="desc">% Porecentaje</label>
			<input type="number" name="desc" placeholder="%" id="desc">
              <br><br>
			<input type="submit" name="enviar" value="Calcular"id="enviar">
			

			
		</fieldset>
		
	</form>
  
	 <?php

	   if(isset($_POST["enviar"])){


        $presu_asig = $_POST['presu_asig'];
        $descuento = $_POST['desc'];

        $total = $presu_asig;

        $descuento = ($descuento/100*$total);

        $totalf = $total- $descuento;

        //imprimir resultado

        echo "<h2>totales...</h2><br>";

        echo "Total Asignado: ". $total ."<br>";

        echo "Porcentaje Asignado: ". $descuento ."<br>";

        echo "Total Presupuesto: ". $totalf . "<br>";

	   }


	 ?>

</center>