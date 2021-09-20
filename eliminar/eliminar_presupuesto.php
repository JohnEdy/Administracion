<?php

  include('../conexion/conexion.php');

  $numero_registro_presu = $_GET['numero_registro_presu'];


  $eliminar_entidad = "UPDATE  `presupuesto` SET  `eliminar_registro` = '0' WHERE numero_registro_presu =".$numero_registro_presu;
  $query_presu_entidad = mysqli_query($conexion, $eliminar_entidad);
  mysqli_close($conexion);
  

  header ("location: ../consulta/visualizar_presupuesto.php");





?>