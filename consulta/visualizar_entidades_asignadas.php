<?php

  require('../control/arriba.php');
  require('../conexion/conexion.php');



?>

<center>
<br><br><br><br>

<form action="visualizar_entidad.php" method="POST">
  Busqueda: <input type="text" name="busqueda_entidad">
 
  <input type="submit" name="buscar" value="buscar">
</form>
</center>

<?php

 if (isset($_POST['buscar'])) {

  $busqueda_entidad = $_POST['busqueda_entidad'];
 }
 else {
  $busqueda_entidad = "";
 }
// ejecutar la consulta

$consulta_visualizar = "SELECT * FROM  `entidades` WHERE eliminar_registro = '1'
AND  `nombre_entidad`  LIKE '%". $busqueda_entidad."%'";
$resultado = mysqli_query($conexion, $consulta_visualizar) or die ('No Hay Consulta');


// tabla de resultados 
echo "<br><br><br><center><table class='tabla_resultado' border=\"10%\">
      <thead>
           <tr>
             <th>Entidad</th>
             <th>% asignado</th>
             <th>Valor asignado</th>
             <th>Actualizar Registro</th>
             <th>Eliminar registro</th>

           </tr>
      </thead>
      <tboby></center>";

      // aqui extraemos los datos para mostrars

      while ($columna = mysqli_fetch_array($resultado)) {
      echo "<tr>

               <td><center>".$columna['nombre_entidad']."</center></td>";
               // remplazar los campos de la tabla para el usuario 


      $consulta_porcentaje="SELECT * FROM presupuesto_asignado WHERE nro_registro=".$columna['nro_registro'];
      $ejecutar_porcentaje=mysqli_query($conexion,$consulta_porcentaje);
      $resultado_porcentaje=mysqli_fetch_array($ejecutar_porcentaje);
      echo  "<td>".$resultado_porcentaje['porcentaje_entidad']."</td>";




      $consultar_presu_entidad="SELECT * FROM presupuesto_asignado WHERE nro_registro=".$columna['nro_registro'];
      $ejecutar_presu_entidad=mysqli_query($conexion,$consultar_presu_entidad);
      $resultado_presu_entidad=mysqli_fetch_array($ejecutar_presu_entidad);
      echo    "<td>".$resultado_presu_entidad['valor_presu_entidad']."</td>
      
                 

          <td><a href='../editar/editar_entidad.php?nro_registro_entidad=".$columna['nro_registro_entidad']."'<center><img src='../img/editar.png' width='20' heigth='20'></center></a></td>

           <td><a href='../eliminar/eliminar_entidad.php?nro_registro_entidad=".$columna['nro_registro_entidad']."'<center><img src='../img/borrar.png' width='20' heigth='20'></center></a></td>


              </tr>";           


         
      }





?>