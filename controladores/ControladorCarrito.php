<?php

    
     include '../modelos/conexion.php';
     include '../modelos/libro.php';
     if (session_status() == PHP_SESSION_NONE) {
       session_start();
     }

     //getting id of the data from url
    $id = $_GET['id'];
    
    $resultado = mysqli_query($mysqli, "SELECT l.id, f.formato,c.categoria,l.titulo,l.autor,l.editorial,l.aniopublicacion,l.precio,l.cantidadstock,l.librorecomendado  FROM tiendadb.libros l left join tiendadb.categorias c on c.id=l.idcategoria left join tiendadb.formatos f on f.id=l.idformato where l.cantidadstock > 0 and l.id = $id order by l.librorecomendado desc;");
    if (count($_SESSION['carrito']) <= 0) {
    
         $_SESSION['carrito'] = array(); 
     }
    
    
    $object = new Libro();
    
    
    if($resultado)
    {

        while($row = mysqli_fetch_array($resultado))
        {
            
            $object->id = $row['id'];
            $object->titulo = $row['titulo'];
            $object->autor = $row['autor'];
            $object->precio = $row['precio'];
            
            $object->cantidadStock = $row['cantidadstock'];
            $object->editorial = $row['editorial'];
           
            $object->anioPublicacion = $row['aniopublicacion'];
            
            
            array_push($_SESSION['carrito'],$object);

        }


    }
   
    
    $_SESSION["countCarrito"] = count($_SESSION['carrito']);
    
     echo("<script>javascript:alert('Libro Agregado al Carrrito');window.location='../vistas/tienda.php';</script>");

     
    
     
?>