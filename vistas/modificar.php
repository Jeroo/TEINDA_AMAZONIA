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
     
      $id = $_GET['id'];
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
          <div class="icon-block">
            <h2 class="center light-blue-text"><i class="material-icons">view_list</i></h2>
            <h5 class="center">Modificar el libro</h5>
            <form name="form1" method="post" action="/controladores/ControladorModificarLibro.php">
                    <table border="0">
                            <tr> 
                                    <td>ID</td>
                                    <td><input type="text" name="name" value="<?php echo $id;?>"></td>
                            </tr>
                            <tr> 
                                    <td>Age</td>
                                    <td><input type="text" name="age" value="<?php echo $age;?>"></td>
                            </tr>
                            <tr> 
                                    <td>Email</td>
                                    <td><input type="text" name="email" value="<?php echo $email;?>"></td>
                            </tr>
                            <tr>
                                    <td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
                                    <td><input type="submit" name="update" value="Update"></td>
                            </tr>
                    </table>
             </form>
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
