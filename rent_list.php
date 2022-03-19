<?php include'header.php';?>


<!-- banner -->
<div class="inside-banner">
  <div class="container"> 
    <span class="pull-right"><a href="index.php">INICIO</a> / RENTA</span>
    <h2>RENTA</h2>
</div>
</div>
<!-- banner -->
<?php
include("conexion.php");
$link=conectarse();
$query_tipoinmueble="select * from tb_tipo_inmueble";
$resultado_tipoinmueble=mysqli_query($link,$query_tipoinmueble);

$instruccion ="select * from tb_inmueble";
?>

<div class="container">
<div class="properties-listing spacer">

<div class="row">
<div class="col-lg-3 col-sm-4 ">

  <div class="search-form"><h4><span class="glyphicon glyphicon-search"></span> Buscar por</h4>
    <input type="text" class="form-control" placeholder="Búsqueda de Propiedades">
    <div class="row">
            <div class="col-lg-5">
              <select class="form-control">                
                <option>Renta</option>
              </select>
            </div>
            <div class="col-lg-7">
              <select class="form-control">
                <option>Precio</option>
                <option>S/. 150,000 - S/. 200,000</option>
                <option>S/. 200,000 - S/. 250,000</option>
                <option>S/. 250,000 - S/. 300,000</option>
                <option>S/. 300,000 - más</option>
              </select>
            </div>
          </div>

          <div class="row">
          <div class="col-lg-12">

              <select class="form-control" name="tipoinmueble">
              <?php
                if($resultado_tipoinmueble)
                while($campo_tipoinmueble=mysqli_fetch_assoc($resultado_tipoinmueble))
                {
                    $nombre=$campo_tipoinmueble["descripcion_tipo_inmueble"];
                    $id=$campo_tipoinmueble["id_tipo_inmueble"];
                    echo "<option value=".$id.">".$nombre."</option>\n";
                }
                mysqli_close($link);
                ?>
              </select>
              </div>
          </div>
          <button class="btn btn-primary">Buscar</button>

  </div>
</div>


<div class="hot-properties hidden-xs">
<!-- <h4>Hot Properties</h4>
<div class="row">
                <div class="col-lg-4 col-sm-5"><img src="images/properties/1.jpg" class="img-responsive img-circle" alt="properties"></div>
                <div class="col-lg-8 col-sm-7">
                  <h5><a href="property-detail.php">Integer sed porta quam</a></h5>
                  <p class="price">S/. 300,000</p> </div>
              </div>
<div class="row">
                <div class="col-lg-4 col-sm-5"><img src="images/properties/1.jpg" class="img-responsive img-circle" alt="properties"></div>
                <div class="col-lg-8 col-sm-7">
                  <h5><a href="property-detail.php">Integer sed porta quam</a></h5>
                  <p class="price">S/. 300,000</p> </div>
              </div>

<div class="row">
                <div class="col-lg-4 col-sm-5"><img src="images/properties/1.jpg" class="img-responsive img-circle" alt="properties"></div>
                <div class="col-lg-8 col-sm-7">
                  <h5><a href="property-detail.php">Integer sed porta quam</a></h5>
                  <p class="price">S/. 300,000</p> </div>
              </div>

<div class="row">
                <div class="col-lg-4 col-sm-5"><img src="images/properties/1.jpg" class="img-responsive img-circle" alt="properties"></div>
                <div class="col-lg-8 col-sm-7">
                  <h5><a href="property-detail.php">Integer sed porta quam</a></h5>
                  <p class="price">S/. 300,000</p> </div>
              </div>

</div>-->


</div>

<div class="col-lg-9 col-sm-8">
<div class="sortby clearfix">
<div class="pull-left result">Resultados:</div>
  <div class="pull-right">
  <select class="form-control">
  <option>Ordenar por</option>
  <option>Precio: menor a mayor</option>
  <option>Precio: mayor a menor</option>
</select></div>

</div>
<div class="row">
<?php

  $link=conectarse();
  $rs=mysqli_query($link,$instruccion) or die("Fallo en la consulta");
  $n=mysqli_num_rows($rs);
  while($campo=mysqli_fetch_array($rs))
  {
    
  ?>
    
     <!-- properties -->
      <div class="col-lg-4 col-sm-6">
      <div class="properties">
        <div class="image-holder"><img src="images/properties/<?php echo $campo["imagen_inmueble"];?>" class="img-responsive" alt="properties" width="1000px" heigh="644">
          <div class="status sold"><?php echo $campo["estado_inmueble"];?></div>
        </div>
        <h4><a href="property-detail.php"><?php echo $campo["nombre_inmueble"];?></a></h4>
        <p class="price">Precio: S/. <?php echo " ".$campo["precio_inmueble"];?></p>        
        <a class="btn btn-primary" href="Inmueble_Detalle.php?id=<?php echo $campo["id_inmueble"];?>">Ver detalles</a>
      </div>
      </div>
      <!-- properties -->
  <?php
  }
  mysqli_close($link);
  ?>

    
</div>


<!--<div class="center">
<ul class="pagination">
          <li><a href="#">«</a></li>
          <li><a href="#">1</a></li>
          <li><a href="#">2</a></li>
          <li><a href="#">3</a></li>
          <li><a href="#">4</a></li>
          <li><a href="#">5</a></li>
          <li><a href="#">»</a></li>
        </ul>
</div>-->

</div>
</div>
</div>
</div>
</div>

<?php include'footer.php';?>