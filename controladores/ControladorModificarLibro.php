<?php

 include '../modelos/conexion.php';

  if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    
    if(isset($_POST['update']))
    {	

            $id = mysqli_real_escape_string($mysqli, $_POST['id']);

            $name = mysqli_real_escape_string($mysqli, $_POST['name']);
            $age = mysqli_real_escape_string($mysqli, $_POST['age']);
            $email = mysqli_real_escape_string($mysqli, $_POST['email']);	

            // checking empty fields
            if(empty($name) || empty($age) || empty($email)) {	

                    if(empty($name)) {
                            echo "<font color='red'>Name field is empty.</font><br/>";
                    }

                    if(empty($age)) {
                            echo "<font color='red'>Age field is empty.</font><br/>";
                    }

                    if(empty($email)) {
                            echo "<font color='red'>Email field is empty.</font><br/>";
                    }		
            } else {	
                    //updating the table
                    $result = mysqli_query($mysqli, "UPDATE users SET name='$name',age='$age',email='$email' WHERE id=$id");

                    //redirectig to the display page. In our case, it is index.php
                    header("Location: index.php");
            }
    }
    

?>
