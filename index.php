<?php 
include('header.php');

?>
<?php
include("conexion.php");
$link=conectarse();
$query_tipoinmueble="select * from tb_tipo_inmueble";
$resultado_tipoinmueble=mysqli_query($link,$query_tipoinmueble);

$instruccion ="select * from tb_inmueble";
?>

<div class="">
      

        <div id="slider" class="sl-slider-wrapper">
            <?php
          $rs=mysqli_query($link,$instruccion) or die("Fallo en la consulta");
          $n=mysqli_num_rows($rs);
          while($campo=mysqli_fetch_array($rs))
              {
                
          ?>
        <div class="sl-slider">
        
          <div class="sl-slide" data-orientation="horizontal" data-slice1-rotation="-25" data-slice2-rotation="-25" data-slice1-scale="2" data-slice2-scale="2">
            <div class="sl-slide-inner">
              <div class="bg-img bg-img-1"></div>
              <h2><a href="Inmueble_Detalle.php?id=<?php echo $campo["id_inmueble"];?>" ><?php echo $campo["nombre_inmueble"];?></a></h2>

  

              <blockquote>              
              <p class="ubicacion"> <?php echo " ".$campo["ubicacion_inmuebles"];?></p>
              <p>Siempre a tu alcance </p>
         
              <cite><p class="price">S/. <?php echo " ".$campo["precio_inmueble"];?></p> </cite>
              </blockquote>
            </div>
          </div>
                
       
          
        </div>
        <?php
      }
      mysqli_close($link);
      ?>
        
        <!-- /sl-slider -->

        <nav id="nav-dots" class="nav-dots">
          <span class="nav-dot-current"></span>
          <span></span>
          <span></span>
          <span></span>
          <span></span>
        </nav>

      </div><!-- /slider-wrapper -->
</div>



<div class="banner-search">
  <div class="container"> 
    <!-- banner -->
    <h3>Filtros</h3>
    <div class="searchbar">
      <div class="row">
        <div class="col-lg-6 col-sm-6">
          <input type="text" class="form-control" placeholder="Busque su inmueble">
          <div class="row">
         
            
            <div class="col-lg-3 col-sm-4">
              <select class="form-control">
                <option>Precio</option>
                <option>S/.500.00 - S/.600,00</option>
                <option>S/.700.00 - S/.800,00</option>
                <option>S/.900.00 - S/.1000,00</option>
                <option>S/.11000.00 + </option>
              </select>
            </div>
            <div class="col-lg-3 col-sm-4">
            <select class="form-control">
                <option>Casa</option>
                <option>Apartamento</option>
                <option>Mansion</option>
                <option>Espacio de oficina</option>
              </select>
              </div>
              <div class="col-lg-3 col-sm-4">
              <select class="form-control">
                <option>1 Húesped</option>
                <option>2 Húespedes</option>
                <option>3 Húespedes</option>
                <option>4 Húespedes</option>
                <option>5+ Húespedes</option>
         
              </select>
            </div>
              <div class="col-lg-3 col-sm-4">
              <button class="btn btn-success"  onclick="window.location.href='buysalerent.php'">Buscar</button>
              </div>
          </div>
          
          
        </div>
        <div class="col-lg-5 col-lg-offset-1 col-sm-6 ">
          <p>Únase ahora y manténgase actualizado con todas las ofertas de propiedades.</p>
          <button class="btn btn-info"   data-toggle="modal" data-target="#loginpop">Iniciar Sesion</button>        </div>
      </div>
    </div>
  </div>
</div>
<!-- banner -->
<div class="container">
  <div class="properties-listing spacer"> <a href="buysalerent.php" class="pull-right viewall">Mostrar todo</a>
    <h2>Propiedades destacadas</h2>

    <div id="owl-example" class="owl-carousel">
    <?php

      $link=conectarse();
      $rs=mysqli_query($link,$instruccion) or die("Fallo en la consulta");
      $n=mysqli_num_rows($rs);
      while($campo=mysqli_fetch_array($rs))
      {
        
      ?>
        
        <!-- properties --> 
        <div class="properties">
            <div class="image-holder"><img src="images/properties/<?php echo $campo["imagen_inmueble"];?>" class="img-responsive" alt="properties" >
              <div class="status sold"><?php echo $campo["estado_inmueble"];?></div>
            </div>
            <h4><a href="property-detail.php"><?php echo $campo["nombre_inmueble"];?></a></h4>
            <p class="price">Precio: S/. <?php echo " ".$campo["precio_inmueble"];?></p>        
            <a class="btn btn-primary" href="Inmueble_Detalle.php?id=<?php echo $campo["id_inmueble"];?>">Ver detalles</a>
          </div>
       
          <!-- properties -->
    
          <?php
      }
      mysqli_close($link);
      ?>
      
     
    </div>
  </div>
  <div class="spacer">
    <div class="row">
      <div class="col-lg-6 col-sm-9 recent-view">
        <h3>Acerca de Nosotros</h3>
        <p>Vivir en Tacna es una compañia inmobiliaria que reside en la ciudad de Tacna, Peru. Cuyo objetivo es facilitar las transacciones inmobiliarias de los ciudadanos de tacna de la manera mas rapida y segura posible.<br><a href="about.php">Motrar mas</a></p>
      
      </div>
      <!--
      <div class="col-lg-5 col-lg-offset-1 col-sm-3 recommended">
     
        <h3>Propiedades Redomendadas</h3>
        <div id="myCarousel" class="carousel slide">
          <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1" class=""></li>
            <li data-target="#myCarousel" data-slide-to="2" class=""></li>
            <li data-target="#myCarousel" data-slide-to="3" class=""></li>
          </ol>
         Carousel items 
          <div class="carousel-inner">
            <div class="item active">
              <div class="row">
                <div class="col-lg-4"><img src="images/properties/1.jpg" class="img-responsive" alt="properties"/></div>
                <div class="col-lg-8">
                  <h5><a href="#"> echo $campo["nombre_inmueble"];?></a></h5>
                  <p class="price">S/.300,000</p>
                  <a href="Inmueble_Detalle.php?id=hp echo $campo["id_inmueble"];?>"  class="more">Mas detalles</a> </div>

              </div>
            </div>
          </div>
        </div>
      </div>
      -->
  
    </div>
  </div>
</div>


<?php include'footer.php';?>