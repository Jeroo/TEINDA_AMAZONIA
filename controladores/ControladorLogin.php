<?php

    
   include '../modelos/conexion.php';

   session_start();
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $usuario = mysqli_real_escape_string($mysqli,$_POST['usuario']);
      $clave = mysqli_real_escape_string($mysqli,$_POST['clave']); 
      
      $sql = "SELECT id FROM tiendalibros.usuarios WHERE usuario = '$usuario' and clave = '$clave'";
      $result = mysqli_query($mysqli,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
     // $active = $row['active'];
      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count == 1) {
         //session_register("usuario");
         $_SESSION['login_user'] = $usuario;
         
         header("location: ../vistas/tienda.php");
         
      }else {
         header("location: ../vistas/login.php");
      }
   }
?>