<?php

     require_once './cabeza.php';
     require_once '../modelos/conexion.php';

     if (session_status() == PHP_SESSION_NONE) {
         session_start();
     }

     if (!isset($_SESSION['login_user'])) { //not logged in

         //redirect to homepage
         header("Location: ../index.php");
         die();

     }
     
   
 ?>
<?php

  //getting id from url
    $id = $_GET['id'];
   

    //selecting data associated with this particular id

    $result = mysqli_query($mysqli, "SELECT titulo,autor,editorial,aniopublicacion,precio,cantidadstock,librorecomendado,idcategoria,idformato FROM libros WHERE id=$id");
   
    while($res = mysqli_fetch_array($result))
    {
        
                       
            $titulo = $res['titulo'];
            $autor = $res['autor'];
            $editorial= $res['editorial'];
            $precio = $res['precio'];
            $cantidad = $res['cantidadstock'];
            $anioPublicacion= $res['aniopublicacion'];
            $categoria = $res['idcategoria'];
            $formato = $res['idformato'];
            $recomendado = $res['librorecomendado'];
    }
 ?>

 <ul id="slide-out" class="side-nav fixed">
    <li><div class="user-view">
      <div>
        <img src="../resources/img/logo.PNG" alt=""/>
      </div>
     
    </div></li>
    <li><a href="#!"><i class="material-icons">menu</i>Menú</a></li>
    
    <li><div class="divider"></div></li>
    <li><a class="subheader"><i class="material-icons">home</i>Inicio</a></li>
    <li><a class="waves-effect"><i class="material-icons">assignment</i>Reportes</a></li>
  </ul>
  <a href="#" data-activates="slide-out" class="button-collapse"><i class="material-icons">menu</i></a>
 <div class="container">
    <div class="section">

      <!--   Icon Section   -->
      <div class="row">
        <div class="col s12 m12 l12 xl12">
            
            <div class="card blue-grey darken-1">
            <div class="card-content white-text">
               <div class="icon-block">
                <h2 class="center light-blue-text"><i class="material-icons">view_list</i></h2>
                <h5 class="center">Modificar Libro</h5>
                <br/>
                 <br/>
                <div class="row">
                  <form  enctype="multipart/form-data" class="col s12" name="formAgregar" id="formAgregar" method="post" action="../controladores/ControladorModificarLibro.php">
                   <input  id="id" name="id" type="hidden" value=<?php echo $_GET['id'];?>>
                 <div class="row">
                     <div class="input-field col s12 m6 l6 xl6" style="border-radius: 20px; border: solid">
                      Cargar Imagen de Portada:<input name="fichero_portada" type="file" />
                  
                   </div>
                  </div> 
                  <div class="row">
                    
                    <div class="input-field col s12 m6 l6 xl6">
                      <input id="titulo" type="text" name="titulo" class="validate" value="<?php echo $titulo;?>">
                      <label for="titulo">Título</label>
                    </div>
                    <div class="input-field col s12 m3 l3 xl3">
                        <input id="autor" name="autor" type="text" class="validate" value="<?php echo $autor;?>">
                      <label for="autor">Autor</label>
                    </div>
                    <div class="input-field col s12 m3 l3 xl3">
                        <input id="editorial" name="editorial" type="text" class="validate" value="<?php echo $editorial;?>">
                      <label for="editorial">Editorial</label>
                    </div>
                  </div>
                  <div class="row">               
                    <div class="input-field col s12 m4 l4 xl4">
                      <i class="material-icons prefix">monetization_on</i>
                      <input  name="precio" id="precio" type="text" class="validate" value="<?php echo $precio;?>">
                      <label for="precio">Precio</label>
                    </div>
                     <div class="input-field col s12 m4 l4 xl4">
                         <input  id="cantidad" name="cantidad" type="text" class="validate" value="<?php echo $cantidad;?>">
                      <label for="cantidad">Cantidad</label>
                    </div>
                    <div class="input-field col s4 m4 l4 xl4">
                        <input name="anioPublicacion" id="anioPublicacion" type="text" class="validate" value="<?php echo $anioPublicacion;?>">
                      <label for="anioPublicacion">Año Públicación</label>
                    </div>
                  </div>
                  <div class="row">               
                    <div class="input-field col s12 m4 l4 xl4">

                        <select id="stlcategoria">
                          <option value="" disabled selected>Seleccione...</option>
                          <?php 
                           
                            $sql = "SELECT * FROM categorias;";
                            $resultado = mysqli_query($mysqli,$sql);

                            if($resultado)
                              {

                                 while($row = mysqli_fetch_array($resultado))
                                  {
                                                                         
                                    if($categoria == $row['id'])
                                    {
                                          echo "<option selected='selected' value=\"$row[id]\">".
                                             
                                             $row['categoria'];


                                     echo "</option><input type=\"hidden\" name=\"categoria\" id=\"categoria\" value=\"$row[id]\">";
                                    }
                                    else
                                    {
                                          echo "<option value=\"$row[id]\">".
                                             
                                             $row['categoria'];


                                           echo '</option>';
                                    }
                                  }

                                }
                              else
                              {
                                  echo "no se puedo ejecutar la consulta hay un error en la base de datos<br />";
                                  echo mysqli_error($mysqli);
                              }
                          
                          ?>  
                        </select>
                        <label>Categoria</label>
                        

                    </div>
                     <div class="input-field col s12 m4 l4 xl4">
                        <select id="stlformato">
                          <option value="" disabled selected>Seleccione...</option>
                            <?php 
                           
                            $sql = "SELECT * FROM formatos;";
                            $resultado = mysqli_query($mysqli,$sql);

                            if($resultado)
                              {

                                 while($row = mysqli_fetch_array($resultado))
                                  {
                                    if($formato == $row['id'])
                                    {
                                          echo "<option selected='selected' value=\"$row[id]\">".
                                             
                                             $row['formato'];


                                     echo "</option><input type=\"hidden\" name=\"formato\" id=\"formato\" value=\"$row[id]\">";
                                   
                                    }
                                    else
                                    {
                                          echo "<option value=\"$row[id]\">".
                                             
                                             $row['formato'];


                                           echo '</option>';
                                    }
                                    
                                  }

                                }
                              else
                              {
                                  echo "no se puedo ejecutar la consulta hay un error en la base de datos<br />";
                                  echo mysqli_error($mysqli);
                              }
                          
                          ?> 
                        </select>
                        <label>Formato</label>
                       
                    </div>
                    <div class="col s12 m4 l4 xl4 action-checkbox">
                       <!--input class="action-select" type="checkbox" id="recomendado" name="recomendado" /-->
                       <label for="">Libro Recomendado?</label>
                       <!-- Switch -->
                        <div class="switch">
                          <label>
                            No
                            <?php 
                            
                            
                               
                               if ($recomendado == "1") {
                                  
                                   echo '<input  type="checkbox" id="chkrecomendado" checked="checked">';
                                   
                               } else {
                                   
                                   echo '<input  type="checkbox" id="chkrecomendado">';
                               }
                            
                            
                            ?>
                           
                            <span class="lever"></span>
                            Si
                          </label>
                        </div>
                       <input  type="hidden" id="recomendado" name="recomendado" value="<?php echo $recomendado;?>">
                    </div>
                  </div>

                </form>
              </div>
              </div>
            </div>
            <div class="card-action">
              <a class="waves-effect waves-light btn" id="btnGuardar"><i class="material-icons left">save</i>Guardar</a>
              <a class="waves-effect waves-light btn red" id="btnCancelar" href='administracion.php'><i class="material-icons left">cancel</i>Cancelar</a>
              
            </div>
          </div>
         
        </div>       
      </div>
    </div>
    <br>
    <br>
  </div>


 <div class="row hide">
     <div class="col s12 m12 l12 xl12">
        <?php
    
             require_once './pie.php';
          ?>
     </div>
         
 </div>  
  
  
