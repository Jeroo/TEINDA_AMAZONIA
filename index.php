<?php

   
    session_start();

    
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
  <title>Tienda AMAZONIA</title>
  <link rel="shortcut icon" type="image/png" href="resources/img/logo.PNG"/>
  <link rel="shortcut icon" type="image/png" href="resources/img/logo.PNG"/>
  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="./resources/css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="./resources/css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
</head>
<body>
  <nav class="light-blue lighten-1" role="navigation">
    <div class="nav-wrapper container">
      <a id="logo-container" href="../index.php" class="brand-logo">AMAZONIA</a>
      <ul class="right hide-on-med-and-down">
        
       <?php
       
         if (!isset($_SESSION['login_user'])) { //not logged in

                 echo "<li><a href='#'><i class='material-icons'>account_circle</i></a></li>";

            }else {
                
                $login = $_SESSION['login_user'];
                echo "<li><a href='#'>$login</a></li>";

            }
       ?>
       
        <li><a href="#"><i class="material-icons">shopping_cart</i></a></li>
        <li><a href="./controladores/ControladorLogOut.php"><i class="material-icons">exit_to_app</i></a></li>
      
        
      </ul>
        

      <ul id="nav-mobile" class="side-nav">
         <?php
       
         if (!isset($_SESSION['login_user'])) { //not logged in

                echo "<li><a href='#'><i class='material-icons'>account_circle</i></a></li>";

            }else {
                
                $login = $_SESSION['login_user'];
                echo "<li><a href='#'>$login</a></li>";

            }
       ?>
        <li><a href="#"><i class="material-icons">shopping_cart</i></a></li>
        <li><a href="#"><i class="material-icons">exit_to_app</i></a></li>
      </ul>
      <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
    </div>
  </nav>

  <div class="section no-pad-bot" id="index-banner">
    <div class="container">
      <br><br>
     
      <h1 class="header center orange-text"> <img src="./resources/img/logo.PNG" alt=""/></h1>
      <div class="row center">
        <h5 class="header col s12 light">Tienda de Ventas de Libros AMAZONIA</h5>
      </div>
      
      <div class="row center">
         <h2 class="center light-blue-text"><i class="material-icons">group</i></h2>
         <a href="./vistas/tienda.php" id="download-button" class="btn-large waves-effect waves-light orange">
        
           
            <h5 class="center">Clientes</h5>
        
        </a>
         <?php
       
         if (!isset($_SESSION['login_user'])) { //not logged in

                echo "<a href='./vistas/login.php' id='download-button' class='btn-large waves-effect waves-light orange'><h5 class='center'>Administrador</h5></a>";

            }else {
                
                 echo "<a href='./vistas/administracion.php' id='download-button' class='btn-large waves-effect waves-light orange'><h5 class='center'>Administrador</h5></a>";


            }
       ?>
         
      </div>
      <br>
      <br>

    </div>
  </div>
<div class="container">
    <div class="section">

      <!--   Icon Section   -->
      <div class="row">
        <div class="col s12 m4">
          <div class="icon-block hide">
            <h2 class="center light-blue-text"><i class="material-icons">flash_on</i></h2>
            <h5 class="center"></h5>

            <p class="light">We did most of the heavy lifting for you to provide a default stylings that incorporate our custom components. Additionally, we refined animations and transitions to provide a smoother experience for developers.</p>
          </div>
        </div>

        <div class="col s12 m4">
          <div class="icon-block hide">
            <h2 class="center light-blue-text"><i class="material-icons">group</i></h2>
            <h5 class="center">User Experience Focused</h5>

            <p class="light">By utilizing elements and principles of Material Design, we were able to create a framework that incorporates components and animations that provide more feedback to users. Additionally, a single underlying responsive system across all platforms allow for a more unified user experience.</p>
          </div>
        </div>

        <div class="col s12 m4">
          <div class="icon-block hide">
            <h2 class="center light-blue-text"><i class="material-icons">settings</i></h2>
            <h5 class="center">Easy to work with</h5>

            <p class="light">We have provided detailed documentation as well as specific code examples to help new users get started. We are also always open to feedback and can answer any questions a user may have about Materialize.</p>
          </div>
        </div>
      </div>

    </div>
    <br><br>
  </div>

 <footer class="page-footer light-blue lighten-1 footer">
    <div class="container">
      <div class="row">
        <div class="col l6 s12">
          <h5 class="white-text">Tienda Libros AMAZONIA</h5>
          <p class="grey-text text-lighten-4">
              
              Portal de ventas de libros AMAZONIA, donde podra comprar sus libros de interes.
              
          </p>
        </div>
        <div class="col l3 s12">
          <h5 class="white-text">Libros</h5>
          <ul>
            <li><a class="white-text" href="#!">Listado Libros</a></li>
            <li><a class="white-text" href="#!">Administración</a></li>
          </ul>
        </div>
        <!--div class="col l3 s12">
          <h5 class="white-text">Connect</h5>
          <ul>
            <li><a class="white-text" href="#!">Link 1</a></li>
            <li><a class="white-text" href="#!">Link 2</a></li>
            <li><a class="white-text" href="#!">Link 3</a></li>
            <li><a class="white-text" href="#!">Link 4</a></li>
          </ul>
        </div-->
      </div>
    </div>
    <div class="footer-copyright">
      <div class="container">
      Copyright © 2018 AMAZONIA, Todos los derechos reservados.
      </div>
    </div>
  </footer>

  <!--  Scripts-->
  <script src="./resources/js/jquery-2.1.1.min.js"></script>
  <script src="./resources/js/materialize.js"></script>
  <script src="./resources/js/init.js"></script>

  </body>
</html>