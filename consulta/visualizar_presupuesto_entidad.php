<?php

include('../control/arriba.php');
include('../conexion/conexion.php');

?>
          <!-- formulario de busqueda-->
             <center>
            <br><br><br><br>

            <form action="visualizar_presupuesto_entidad.php" method="POST">
              Busqueda: <input type="text" name="busqueda">
             
              <input type="submit" name="buscar" value="buscar">
            </form>
            </center>

<?php
   

    if (isset($_POST['buscar'])) {

       $busqueda = $_POST['busqueda'];

    }
    else{
      $busqueda = "";
    }

// ejecutar la consulta

$consulta_visualizar ="SELECT * FROM  `presupuesto_asignado` WHERE eliminar_registro = '1' AND `porcentaje_entidad` LIKE '%".$busqueda."%'";
$resultado = mysqli_query($conexion, $consulta_visualizar) or die ('No Hay Consulta');


// tabla de resultados 
echo "<br><br><br><center><table class='tabla_resultado' border=10px>
      <thead>
           <tr>
             <th>Numero Registro</th>
             <th>Porcentaje Entidad</th>
             <th>Valor Presupuesto</th>
             <th>Fecha Registro</th>
             <th>Numero Registro Presupuesto</th>
             <th>Numero Registro Entidad</th>
             <th>Editar</th>
             <th>Eliminar</th>


           </tr>
      </thead>
      <tboby></center>";

      // aqui extraemos los datos la visualizar

      while ($columna = mysqli_fetch_array($resultado)) { 
         echo "<tr>

                   <td><center>".$columna['nro_registro']."</ceneter></td>
                   <td><center>".$columna['porcentaje_entidad']." %</center></td>
                   <td><center>".'$ '.$columna['valor_presu_entidad']."</center></td>
                   <td><center>".$columna['fecha_registro']."</center></td>";

      // remplazar los campos de la base de datos
       
      $consultar_entidad="SELECT * from entidades WHERE nro_registro_entidad=".$columna['nro_registro_entidad'];
      $ejecutar_entidad=mysqli_query($conexion,$consultar_entidad);
      $resultado_entidad=mysqli_fetch_array($ejecutar_entidad);

     echo    "<td>".$resultado_entidad['nombre_entidad']."</td>";

      // remplazar otro campo

       $consultar_presupuesto="SELECT * from presupuesto WHERE numero_registro_presu=".$columna['numero_registro_presu'];
      $ejecutar_presupuesto=mysqli_query($conexion,$consultar_presupuesto);
      $resultado_presupuesto=mysqli_fetch_array($ejecutar_presupuesto);

    echo    "<td>".$resultado_presupuesto['anho_presupuesto']."</td>
                   

          <td><a href='../editar/editar_presupuesto_entidad.php?nro_registro=".$columna['nro_registro']."'<center><img src='../img/editar.png' width='20' heigth='20'></center></a></td> 

           <td><a href='../eliminar/eliminar_presupuesto_entidad.php?nro_registro=".$columna['nro_registro']."'<center><img src='../img/borrar.png' width='20' heigth='20'></center></a></td> 

              
              </tr>";           


         
      }





?>