<?php

  include('../conexion/conexion.php');

  $nro_registro = $_GET['nro_registro'];


  $eliminar_presu_entidad = "UPDATE  `presupuesto_asignado` SET  `eliminar_registro` = '0' WHERE nro_registro =".$nro_registro;
  $query_presu_entidad = mysqli_query($conexion, $eliminar_presu_entidad);
  mysqli_close($conexion);
  

  header ("location: ../consulta/visualizar_presupuesto_entidad.php");





?>