<?php

error_reporting(0);
session_start();
ob_start();


 include('../conexion/conexion.php');

 $nombre_usuario  = $_POST['nombre_usuario'];
 $contrasena_usuario = $_POST['contrasena_usuario'];


@mysqli_query($conexion, "SET NAMES 'utf8'");
 
 if ($nombre_usuario=="" || $contrasena_usuario==""){

    echo "<script>alert('HAY CAMPOS VACÍOS...')</script>";
    header("refresh: 0.5; url = ../index.php");
 }
 else {


  //$conexion=mysqli_connect("localhost","root","","contabilidad_risaralda");

  // Consulta en la tabla de usuarios si el usiario existe y con la contraseña ingresada en el formulario de inicio_sesion
  $nombre_usuario = $_POST['nombre_usuario'];
  $contrasena_usuario = $_POST['contrasena_usuario'];
  
  $consulta = mysqli_query($conexion, "SELECT * FROM usuarios WHERE nombre_usuario='$nombre_usuario' and contrasena_usuario='$contrasena_usuario'") or die("Error: no consulta");
  

  if (mysqli_fetch_array($consulta)>0) {
   
    // Si el usuario y contraseña son correctos se inicia la sesion, se autentica el usuario y se redirecciona a la pagina de inicio.
    // crea una sesión o reanuda la actual basada en un identificador de sesión pasado mediante una petición GET o POST.
   
    $_SESSION["nombre_usuario"]= $nombre_usuario;

    header("location: ../control/inicio.php");
    
  } 

// Mensaje de Error  porque los datos del  usuario no se encuentran o no esta registrado.
  
  else{
      $_SESSION["nombre_usuario"]<>$nombre_usuario || $_SESSION["contrasena_usuario"]<> $contrasena_usuario;
     echo "<script>alert('Datos incorrectos')</script>";

      header("location: ../index.php");

    
  
 

}

}
?>