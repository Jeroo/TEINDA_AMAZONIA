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
                <h5 class="center">Agregar Libro</h5>
                <br/>
                <br/>
                <div class="row">
                <form  enctype="multipart/form-data" class="col s12" name="formAgregar" id="formAgregar" method="post" action="../controladores/ControladorAgregar.php">
                  <div class="row">
                     <div class="input-field col s12 m6 l6 xl6" style="border-radius: 20px; border: solid">
                      Cargar Imagen de Portada:<input name="fichero_portada" type="file" />
                  
                   </div>
                  </div> 
                  <div class="row">
                    <div class="input-field col s12 m6 l6 xl6">
                      <input id="titulo" type="text" name="titulo" class="validate">
                      <label for="titulo">Título</label>
                    </div>
                    <div class="input-field col s12 m3 l3 xl3">
                        <input id="autor" name="autor" type="text" class="validate">
                      <label for="autor">Autor</label>
                    </div>
                    <div class="input-field col s12 m3 l3 xl3">
                        <input id="editorial" name="editorial" type="text" class="validate">
                      <label for="editorial">Editorial</label>
                    </div>
                  </div>
                  <div class="row">               
                    <div class="input-field col s12 m4 l4 xl4">
                      <i class="material-icons prefix">monetization_on</i>
                      <input value="" name="precio" id="precio" type="text" class="validate">
                      <label for="precio">Precio</label>
                    </div>
                     <div class="input-field col s12 m4 l4 xl4">
                         <input value="" id="cantidad" name="cantidad" type="text" class="validate">
                      <label for="cantidad">Cantidad</label>
                    </div>
                    <div class="input-field col s4 m4 l4 xl4">
                        <input value="" name="anioPublicacion" id="anioPublicacion" type="text" size="4" class="validate">
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
                                    
                                     echo "<option value=\"$row[id]\">".
                                             
                                             $row['categoria'];


                                     echo '</option>';
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
                         <input type="hidden" name="categoria" id="categoria" value="">

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
                                    
                                     echo "<option value=\"$row[id]\">".
                                             
                                             $row['formato'];


                                     echo '</option>';
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
                        <input type="hidden" name="formato" id="formato" value="">
                    </div>
                    <div class="col s12 m4 l4 xl4 action-checkbox">
                       <!--input class="action-select" type="checkbox" id="recomendado" name="recomendado" /-->
                       <label for="">Libro Recomendado?</label>
                       <!-- Switch -->
                        <div class="switch">
                          <label>
                            No
                            <input  type="checkbox" id="chkrecomendado" >
                            <span class="lever"></span>
                            Si
                          </label>
                        </div>
                       <input  type="hidden" id="recomendado" name="recomendado" value="0">
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
  
  
