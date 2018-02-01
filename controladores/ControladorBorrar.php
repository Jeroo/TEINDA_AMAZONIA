<?php

    
     include '../modelos/conexion.php';


     //getting id of the data from url
     $id = $_GET['id'];

     //deleting the row from table
    $result = mysqli_query($mysqli, "DELETE FROM libros WHERE id=$id");

     //redirecting to the display page (index.php in our case)
    header("location: ../vistas/administracion.php");
     
?>