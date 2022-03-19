
<!DOCTYPE html>
<html lang="en">
<head>
<title>Vivir en Tacna</title>
<meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

 	<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.css" />
  <link rel="stylesheet" href="assets/style.css"/>
  <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
	<script src="assets/bootstrap/js/bootstrap.js"></script>
  <script src="assets/script.js"></script>

 

  
<!-- Owl stylesheet -->
<link rel="stylesheet" href="assets/owl-carousel/owl.carousel.css">
<link rel="stylesheet" href="assets/owl-carousel/owl.theme.css">
<script src="assets/owl-carousel/owl.carousel.js"></script>
<!-- Owl stylesheet -->


<!-- slitslider -->
    <link rel="stylesheet" type="text/css" href="assets/slitslider/css/style.css" />
    <link rel="stylesheet" type="text/css" href="assets/slitslider/css/custom.css" />
    <script type="text/javascript" src="assets/slitslider/js/modernizr.custom.79639.js"></script>
    <script type="text/javascript" src="assets/slitslider/js/jquery.ba-cond.min.js"></script>
    <script type="text/javascript" src="assets/slitslider/js/jquery.slitslider.js"></script>
<!-- slitslider -->

</head>

<body>


<!-- Header Starts -->
<div class="navbar-wrapper">

        <div class="navbar-inverse" role="navigation">
          <div class="container">
            <div class="navbar-header">


              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>

            </div>


            <!-- Nav Starts -->
            <div class="navbar-collapse  collapse">
              <ul class="nav navbar-nav navbar-right">
               <li class="active"><a href="index.php">Inicio</a></li>
                <li><a href="about.php">Acerca de nosotros </a></li>
                <li><a href="agentes.php">Agentes</a></li>         
                <li><a href="contact.php">Contacto</a></li>
                <?php
                error_reporting(0);
                session_start();
                
                if(!isset($_SESSION['autenticado'])){
                  ?>
                  
                  <li><button class="btn btn-success"data-toggle="modal" data-target="#loginpop">Iniciar Sesion</button></li>
                <?php
                }
                else{
                  if ($_SESSION['nombre_usuario'] == 1) {
                    ?>
                      <li><a href="gestionarinmuebles.php">Gestionar Inmuebles</a></li>
                      <li><a href="perfil.php">Perfil</a></li>
                      <li><a href="historialreserva.php">Reservas</a></li>
                      <li><a href="cerrarsesion.php">Cerrar Sesion</a></li>
                    <?php
                  }
                  else if($_SESSION['nombre_usuario'] == 2 ) {
                    ?>

                      <li><a href="historialreserva.php">Reservas</a></li>
                      <li><a href="perfil.php">Perfil</a></li>
                      <li><a href="cerrarsesion.php">Cerrar Sesion</a></li>
                    <?php
                  }
                  else if($_SESSION['nombre_usuario'] == 4) {
                    ?>
                      <li><a href="verificar_inmueble.php">Verificar Inmuebles</a></li>
                      <li><a href="reportes.php">Reportes</a></li>
                      <li><a href="perfil.php">Perfil</a></li>
                      <li><a href="gestionar_agentes.php">Gestionar Agentes</a></li> 
                      <li><a href="historialreserva.php">Reservas</a></li>
                      <li><a href="cerrarsesion.php">Cerrar Sesion</a></li>
                    <?php
                  }
                }
             ?>
                    
                </div>
                      </div>
                    </div>
                    
                </div>
              </ul>
            </div>
            <!-- #Nav Ends -->

          </div>
        </div>

    </div>
<!-- #Header Starts -->


<!-- Modal -->

  <div id="loginpop" class="modal fade">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="row">
        <form id="forml" name="forml" method="post" action="control.php">
          <div class="col-sm-6 login">
          <h4>Iniciar Sesion</h4>
            <form class="" role="form">
                <div class="form-group">
                  <label class="sr-only" for="exampleInputEmail2">Usuario</label>
                  <input type="text" class="form-control" id="exampleInputEmail2" placeholder="Ingrese su usuario" name="usuario" >
                </div>
                <div class="form-group">
                  <label class="sr-only" for="exampleInputPassword2">Contraseña</label>
                  <input type="password" class="form-control" id="exampleInputPassword2" placeholder="Ingrese su contraseña" name="contrasenia">
                </div>
                <div class="checkbox">
                  <label>
                    <input type="checkbox"> Recordarme
                  </label>
                </div>
                <button type="submit" class="btn btn-success">Iniciar Sesion</button>
             </form>          
          </div>
        </form>
          <div class="col-sm-6">
            <h4>Nuevo Usuario? Registrese</h4>
            <p>Únase hoy y manténgase actualizado con todas las ofertas de propiedades que están en arrendamiento..</p>
            <button type="submit" class="btn btn-info"  onclick="window.location.href='register.php'">Registrarse</button>
          </div>

        </div>
      </div>
    </div>
  </div>


<!-- /.modal -->


<div class="container">

<!-- Header Starts -->
<div class="header">
<a href="index.php"><img src="images/logo1.png" alt="Realestate"></a>

              <ul class="pull-right">
                   
                <li><a href="rent_list.php">Alquilar</a></li>
                <li><a href="gestionarinmuebles.php">Rentar</a></li>

              </ul>
</div>
<!-- #Header Starts -->
</div>