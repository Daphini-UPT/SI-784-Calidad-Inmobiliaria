<?php include'header.php';?>
<!-- banner -->
<div class="inside-banner">
  <div class="container"> 
    <span class="pull-right"><a href="#">Inicio</a> / Alquilar</span>
    <h2>Alquilar</h2>
</div>
</div><?php
$idinmueble =$_GET['id'];
include("conexion.php");
$link=conectarse();
$query_tipoinmueble="select * from tb_tipo_inmueble";
$resultado_tipoinmueble=mysqli_query($link,$query_tipoinmueble);
$instruccion ="SELECT * from tb_inmueble WHERE id_inmueble = '$idinmueble'";
$instruccion2 ="SELECT * from tb_inmueble";


?>
<!-- banner -->


<div class="container">
<div class="properties-listing spacer">

<div class="row">
<div class="col-lg-3 col-sm-4 hidden-xs">

<div class="hot-properties hidden-xs">
<h4>Inmuebles Populares</h4>
<div class="row">
    <?php

   
    $rs=mysqli_query($link,$instruccion2) or die("Fallo en la consulta");
    $n=mysqli_num_rows($rs);
    while($campo=mysqli_fetch_array($rs))
    {
      
    ?>
      
      <!-- properties -->

          <div class="col-lg-4 col-sm-5"><img src="images/properties/<?php echo $campo["imagen_inmueble"];?>" class="img-responsive img-circle" alt="properties"/></div>
          <div class="col-lg-8 col-sm-7">
          </div>
          <h4><a href="property-detail.php"><?php echo $campo["nombre_inmueble"];?></a></h4>
          <p class="price">Precio: S/. <?php echo " ".$campo["precio_inmueble"];?></p>        
        

        <!-- properties -->
    <?php
    }
    mysqli_close($link);
    ?>
</div>
<div class="row">
                
              </div>

<div class="row">
  
              </div>

<div class="row">
           
              </div>

</div>



<div class="anuncios">
  <h4>Anuncios</h4>
  <img src="images/advertisements.jpg" class="img-responsive" alt="advertisement">

</div>

</div>

<div class="col-lg-9 col-sm-8 ">
<?php

$link=conectarse();
$rs=mysqli_query($link,$instruccion) or die("Fallo en la consulta");
$n=mysqli_num_rows($rs);
while($campo=mysqli_fetch_array($rs))
{
  
?>
<h2><?php echo $campo["nombre_inmueble"];?></h2>
<div class="row">
  <div class="col-lg-8">
  <div class="property-images">
    <!-- Slider Starts -->
<div id="myCarousel" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators hidden-xs">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1" class=""></li>
        <li data-target="#myCarousel" data-slide-to="2" class=""></li>
        <li data-target="#myCarousel" data-slide-to="3" class=""></li>
      </ol>
      <div class="carousel-inner">
        <!-- Item 1 -->
        <div class="item active">
          <img src="images/properties/<?php echo $campo["imagen_inmueble"];?>" class="properties" alt="properties" />
        </div>
        <!-- #Item 1 -->

        <!-- Item 2 -->
        
        <!-- #Item 2 -->

        <!-- Item 3 -->
        
        <!-- #Item 3 -->

        <!-- Item 4 -->
        
        <!-- # Item 4 -->
      </div>
      <a class="left carousel-control" href="#myCarousel" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
      <a class="right carousel-control" href="#myCarousel" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
    </div>
<!-- #Slider Ends -->

  </div>
  



  <div class="spacer"><h4><span class="glyphicon glyphicon-th-list"></span>Detalles del Inmueble</h4>
    <p class="descripcion"> <?php echo " ".$campo["descripcion_inmueble"];?></p>        
 
  </div>
  <div><h4><span class="glyphicon glyphicon-map-marker"></span> Location</h4>
  
<div class="well"><iframe width="100%" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d948.4793471990607!2d-70.24273156981019!3d-18.02903711221285!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x915acf26d114aefd%3A0xae5bf415955cbf9e!2sChechosdrinks!5e0!3m2!1ses!2spe!4v1635039297734!5m2!1ses!2spe"></iframe></div>
  </div>

  </div>
  <div class="col-lg-4">
  <div class="col-lg-12  col-sm-6">
<div class="property-info">

    <p class="price">S/.<?php echo $campo["precio_inmueble"];?></p>
      <p class="area"><span class="glyphicon glyphicon-map-marker"></span><?php echo $campo["ubicacion_inmuebles"];?></p>
      <!-- #Header Starts 
      <div class="profile">
      <span class="glyphicon glyphicon-user"></span> Detalles del Arrendador
      <p>Juan Perez<br>987654321</p>
      </div>
      -->
</div>
<!-- #Header Starts 
    <h6><span class="glyphicon glyphicon-home"></span>Disponibilidad</h6>
    <div class="listing-detail">
    <span data-toggle="tooltip" data-placement="bottom" data-original-title="Habitacion">5</span> <span data-toggle="tooltip" data-placement="bottom" data-original-title="Sala">2</span> <span data-toggle="tooltip" data-placement="bottom" data-original-title="Cochera">2</span> <span data-toggle="tooltip" data-placement="bottom" data-original-title="">1</span> </div>
-->
</div>
<div class="col-lg-12 col-sm-6 ">
<div class="enquiry">
  <h6><span class="glyphicon glyphicon-envelope"></span>Hacer un consulta al Arrendador</h6>
  <form role="form">
                <input type="text" class="form-control" placeholder="Nombre Completo"/>
                <input type="text" class="form-control" placeholder="juanperez@gmail.com"/>
                <input type="text" class="form-control" placeholder="Tú número"/>
                <textarea rows="6" class="form-control" placeholder="Qué tienes en mente?"></textarea>
      <button type="submit" class="btn btn-primary" name="Submit">Enviar Mensaje</button>


      </form>
<br>
      <a class="btn btn-primary" href="reserva.php?id=<?php echo $campo["id_inmueble"];?>">RESERVAR</a>
 </div>         
</div>
  </div>
</div>
</div>
</div>
</div>
</div>
<?php
    }
    mysqli_close($link);
    ?>
<?php include'footer.php';?>