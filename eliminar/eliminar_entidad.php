<?php

  include('../conexion/conexion.php');

  $nro_registro_entidad = $_GET['nro_registro_entidad'];


  $eliminar_entidad = "UPDATE  `entidades` SET  `eliminar_registro` = '0' WHERE nro_registro_entidad =".$nro_registro_entidad;
  $query_presu_entidad = mysqli_query($conexion, $eliminar_entidad);
  mysqli_close($conexion);
  

  header ("location: ../consulta/visualizar_entidad.php");





?>