<?php

include('../control/arriba.php');
include('../conexion/conexion.php');

?>
               <!-- formulario de busqueda-->
             <center>
            <br><br><br><br>

            <form action="visualizar_presupuesto.php" method="POST">
              Busqueda: <input type="text" name="busqueda_presupuesto">
             
              <input type="submit" name="buscar" value="buscar">
            </form>
            </center>

<?php

            // validar la busqueda si hay click el boton buscar
            if (isset($_POST['buscar'])) {

              $busqueda_presupuesto = $_POST['busqueda_presupuesto'];
            }
            else {
              $busqueda_presupuesto = "";
            }
// ejecutar la consulta

$consulta_visualizar ="SELECT * FROM  `presupuesto` WHERE eliminar_registro = '1' AND  `anho_presupuesto` LIKE '%".$busqueda_presupuesto."%'";
$resultado = mysqli_query($conexion, $consulta_visualizar) or die ('No Hay Consulta');


// tabla de resultados 
echo "<br><br><br><center><table class='tabla_resultado' border=10px>
      <thead>
           <tr>
             <th>Numero de Registro</th>
             <th>Valor Presupuesto</th>
             <th>Año Presupuesto</th>
             <th>Fecha de Registro</th>
              <th>Presupuestos Asignados</th>
             <th>Editar Registro</th>
             <th>Eliminar registro</th>

           </tr>
      </thead>
      <tboby></center>";

      // aqui extraemos los datos la visualizar

      while ($columna = mysqli_fetch_array($resultado)) {
         echo "<tr>

                   <td><center>".$columna['numero_registro_presu']."</center></td>
                   <td><center>".$columna['valor_presupuesto']."</center></td>
                   <td><center>".$columna['anho_presupuesto']."</center></td>
                   <td><center>".$columna['fecha_registro']."</center></td>

                     <td><a href='visualizar_entidades_asignadas.php?numero_registro_presu=".$columna['numero_registro_presu']."'<center><img src='../img/asignar.png' width='20' heigth='20'></center></a></td>

          <td><a href='../editar/editar_presupuesto.php?numero_registro_presu=".$columna['numero_registro_presu']."'<center><img src='../img/editar.png' width='20' heigth='20'></center></a></td> 

           <td><a href='../eliminar/eliminar_presupuesto.php?numero_registro_presu=".$columna['numero_registro_presu']."'<center><img src='../img/borrar.png' width='20' heigth='20'></center></a></td> 


              </tr>";           


         
      }





?>