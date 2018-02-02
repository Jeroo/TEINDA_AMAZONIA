<?php

    //https://github.com/chapagain/crud-php-simple
   include '../modelos/conexion.php';

   if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      $id = mysqli_real_escape_string($mysqli, $_POST['id']);
    
      $titulo = mysqli_real_escape_string($mysqli,$_POST['titulo']);
      $autor = mysqli_real_escape_string($mysqli,$_POST['autor']);
      $editorial= mysqli_real_escape_string($mysqli,$_POST['editorial']);
      $precio = mysqli_real_escape_string($mysqli,$_POST['precio']);
      $cantidad = mysqli_real_escape_string($mysqli,$_POST['cantidad']);
      $anioPublicacion= mysqli_real_escape_string($mysqli,$_POST['anioPublicacion']);
      $categoria = mysqli_real_escape_string($mysqli,$_POST['categoria']);
      $formato = mysqli_real_escape_string($mysqli,$_POST['formato']);
      $recomendado = empty(mysqli_real_escape_string($mysqli,$_POST['recomendado'])) ? 0 : mysqli_real_escape_string($mysqli,$_POST['recomendado']);
      
      // checking empty fields
	
      if(empty($titulo) || empty($autor) || empty($editorial) || empty($precio) 
                || empty($cantidad) || empty($anioPublicacion) || empty($categoria) || empty($formato)) 
          
          {
				
		if(empty($titulo)) {
                    
                   echo "<font color='red'>El titulo no puede estar en blanco.</font><br/>";
		}
		
		if(empty($autor)) {
                    
                   echo "<font color='red'>El autor no puede estar en blanco.</font><br/>";
		}
                
                if(empty($editorial)) {
                    
                   echo "<font color='red'>La editorial no puede estar en blanco.</font><br/>";
		}
                
                if(empty($precio)) {
                    
                   echo "<font color='red'>El precio no puede estar en blanco.</font><br/>";
		}
                
                 if(empty($cantidad)) {
                    
                   echo "<font color='red'>El cantidad no puede estar en blanco.</font><br/>";
		}
                
                 if(empty($anioPublicacion)) {
                    
                   echo "<font color='red'>El Año Publicación no puede estar en blanco.</font><br/>";
		}
                
                 if(empty($categoria)) {
                    
                   echo "<font color='red'>La categoria no puede estar en blanco. $categoria</font><br/>";
		}
                
                 if(empty($formato)) {
                    
                   echo "<font color='red'>El formato no puede estar en blanco. $formato</font><br/>";
		}                
                
		
		//link to the previous page
		echo "<br/><a href='javascript:self.history.back();'>Volver</a>";
                
	} else { 
		
            
                $filename = $_FILES["fichero_portada"]["name"];
                $file_basename = substr($filename, 0, strripos($filename, '.')); // get file extention
                $file_ext = substr($filename, strripos($filename, '.')); // get file name
                $filesize = $_FILES["fichero_portada"]["size"];
                $allowed_file_types = array('.png','.jpg','.jpeg');
                $dir_subida = '../resources/img/';
                if (in_array($file_ext,$allowed_file_types) && ($filesize < 200000))
	        {	
		// Rename file
		//$newfilename = md5($file_basename) . $file_ext;
                $newfilename = $id . ".jpg";
		if (file_exists($dir_subida . $newfilename))
		{
			move_uploaded_file($_FILES["fichero_portada"]["tmp_name"], $dir_subida. $newfilename);
			echo "File uploaded successfully.";
		}
		else
		{		
			move_uploaded_file($_FILES["fichero_portada"]["tmp_name"], $dir_subida. $newfilename);
			echo "File uploaded successfully.";		
		}
                }
                elseif (empty($file_basename))
                {	
                        // file selection error
                      // echo("<script>javascript:alert('Seleccione la imagen');window.location='#';</script>");

                } 
                elseif ($filesize > 200000)
                {	
                        // file size error
                        echo "The file you are trying to upload is too large.";
                }
                else
                {
                        // file type error
                        echo "Only these file typs are allowed for upload: " . implode(', ',$allowed_file_types);
                        unlink($_FILES["file"]["tmp_name"]);
                }

                               
                
		$result = mysqli_query($mysqli, "UPDATE libros SET "
                        . "Titulo='$titulo',Autor='$autor',Editorial='$editorial',anioPublicacion='$anioPublicacion',Precio='$precio',CantidadStock='$cantidad',librorecomendado='$recomendado',idCategoria='$categoria',idFormato='$formato' "
                        . " WHERE id=$id");
                
                 if ($recomendado==1) {
                        
                        $result = mysqli_query($mysqli, "UPDATE libros SET "
                        . "librorecomendado='0'"
                        . " WHERE id<>$id");
                    }
		
                
		//display success message
		echo("<script>javascript:alert('Datos módificados correctamente!');window.location='../vistas/administracion.php';</script>");

              
		//echo "<br/><a href='index.php'>View Result</a>";
                //header("location: ../vistas/administracion.php");
	}
      
       
   }
   
    
?>