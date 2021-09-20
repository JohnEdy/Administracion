<?php

include('../control/arriba.php');
include('../conexion/conexion.php');

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

$consulta_visualizar = "SELECT * FROM  `entidades` WHERE eliminar_registro = '1'AND `nombre_entidad`  LIKE '%". $busqueda_entidad."%'";
$resultado = mysqli_query($conexion, $consulta_visualizar) or die ('No Hay Consulta');


// tabla de resultados 
echo "<br><br><br><center><table class='tabla_resultado' border=\"10%\">
      <thead>
           <tr>
             <th>Numero de Registro</th>
             <th>Nombre de la Entidad</th>
             <th>Fecha de Registro</th>
             <th>Actualizar Registro</th>
             <th>Eliminar registro</th>

           </tr>
      </thead>
      <tboby></center>";

      // aqui extraemos los datos para mostrar

      while ($columna = mysqli_fetch_array($resultado)) {
         echo "<tr>

                   <td><center>".$columna['nro_registro_entidad']."</center></td>
                   <td><center>".$columna['nombre_entidad']."</center></td>
                   <td><center>".$columna['fecha_registro']."</center></td>

          <td><a href='../editar/editar_entidad.php?nro_registro_entidad=".$columna['nro_registro_entidad']."'<center><img src='../img/editar.png' width='20' heigth='20'></center></a></td> 

           <td><a href='../eliminar/eliminar_entidad.php?nro_registro_entidad=".$columna['nro_registro_entidad']."'<center><img src='../img/borrar.png' width='20' heigth='20'></center></a></td> 


              </tr>";           


         
      }





?>