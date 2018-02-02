   <?php
    
        require_once './cabeza.php';
        require_once '../modelos/conexion.php';
        
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    ?>


  <div class="container">
    <div class="section">

      <!--   Icon Section   -->
      <div class="row">
        <div class="col s12 m12 l12 xl12">
         <table>
             <thead>
                  <tr>
                      <th>Listado de Libros en Venta</th>
                  </tr>
              </thead>
              <tbody>
                  
                    <?php
                  
                  $sql = "SELECT l.id, f.formato,c.categoria,l.titulo,l.autor,l.editorial,l.aniopublicacion,l.precio,l.cantidadstock,l.librorecomendado  FROM libros l left join categorias c on c.id=l.idcategoria left join formatos f on f.id=l.idformato where l.cantidadstock > 0 order by l.librorecomendado desc;";
                  $resultado = mysqli_query($mysqli,$sql);
                  
                  if($resultado)
                    {

                       while($row = mysqli_fetch_array($resultado))
                        {
                           if ($row['librorecomendado'] == 1) {
                               
                               
                                echo '<tr><td><div class="card" style="width: 80%;height: 100%">' .
                                    "<div class='parent card-image waves-effect waves-block waves-light'><img src=\"../resources/img/$row[id].jpg\" alt=\"Portada del libro $row[titulo]\" style='width: 30%;height: 20%'><h4 class='ribbon'>Recomendado</h4></div>" .
                                    "<div class='card-content'><span class='card-title activator grey-text text-darken-4'><b>Título: </b>$row[titulo]  <b> Precio: </b>$row[precio]<i class='material-icons right'>more_vert</i></span><p><a href='../controladores/ControladorCarrito.php?id=$row[id]' class='waves-effect waves-light btn'>Comprar</a></p></div>".
                                    "<div class='card-reveal'>".
                                    "<span class='card-title grey-text text-darken-4'>$row[titulo]<i class='material-icons right'>close</i></span>".
                                    "<img src=\"../resources/img/$row[id].jpg\" alt=\"Portada del libro $row[titulo]\" style='width: 30%;height: 30%'>".
                                    "<p><b>Título:</b> $row[titulo]</p>".
                                    "<p><b>Autor:</b> $row[autor]</p>".
                                    "<p><b>Categoria:</b> $row[categoria]</p>".
                                    "<p><b>Formato:</b> $row[formato]</p>".
                                    "<p><b>Editorial:</b> $row[editorial]</p>".
                                    "<p><b>Precio:</b> $row[precio]</p>".
                                    "<p><b>Cantidad Disponible:</b> $row[cantidadstock]</p>".
                                    "<p><b>Año Públicación:</b> $row[aniopublicacion]</p>".
                                    "<p><b>Libro Recomendado 10% de descuento</b></p>".
                                    
                                        
                                        
                                    "</div>"
                            
                                   
                                       ;


                                echo ' </div></td></tr>';
                               
                           } else {
                               
                                  echo '<tr><td><div class="card" style="width: 80%;height: 100%">' .
                                    "<div class='card-image waves-effect waves-block waves-light'><img src=\"../resources/img/$row[id].jpg\" alt=\"Portada del libro $row[titulo]\" style='width: 30%;height: 20%'></div>" .
                                    "<div class='card-content'><span class='card-title activator grey-text text-darken-4'><b>Título: </b>$row[titulo]  <b> Precio: </b>$row[precio]<i class='material-icons right'>more_vert</i></span><p><a href='../controladores/ControladorCarrito.php?id=$row[id]' class='waves-effect waves-light btn'>Comprar</a></p></div>".
                                    "<div class='card-reveal'>".
                                    "<span class='card-title grey-text text-darken-4'>$row[titulo]<i class='material-icons right'>close</i></span>".
                                    "<img src=\"../resources/img/$row[id].jpg\" alt=\"Portada del libro $row[titulo]\" style='width: 30%;height: 30%'>".
                                    "<p><b>Título:</b> $row[titulo]</p>".
                                    "<p><b>Autor:</b> $row[autor]</p>".
                                    "<p><b>Categoria:</b> $row[categoria]</p>".
                                    "<p><b>Formato:</b> $row[formato]</p>".
                                    "<p><b>Editorial:</b> $row[editorial]</p>".
                                    "<p><b>Precio:</b> $row[precio]</p>".
                                    "<p><b>Cantidad Disponible:</b> $row[cantidadstock]</p>".
                                    "<p><b>Año Públicación:</b> $row[aniopublicacion]</p>".
                                    
                                        
                                        
                                    "</div>"
                            
                                   
                                       ;


                                echo ' </div></td></tr>';
                           }
                          
                        }

                      }
                    else
                    {
                        echo "no se puedo ejecutar la consulta hay un error en la base de datos<br />";
                        echo mysqli_error($mysqli);
                    }
                    
                      //mysql_close($mysqli);
                 ?>                         
                
                  <!--tr>
                      <td>
                            <div class="card" style="width: 80%;height: 100%">
                                
                                <div class="card-image waves-effect waves-block waves-light">
                                  <img src="../resources/img/10.jpg" alt="" style="width: 30%;height: 20%"/>
                                </div>
                                <div class="card-content"><span class="card-title activator grey-text text-darken-4">Card Title<i class="material-icons right">more_vert</i></span><p><a href="#">Comprar</a></p></div>
                                <div class="card-reveal">
                                  <span class="card-title grey-text text-darken-4">Card Title<i class="material-icons right">close</i></span>
                                  <p>Here is some more information about this product that is only revealed once clicked on.</p>
                                </div>
                            </div>
                      </td>
                  </tr-->
                 
                  
              </tbody>
       
             
         </table>
        </div>
      </div>

    </div>
    <br><br>
  </div>

     
    <?php
    
        require_once './pie.php';
    ?>