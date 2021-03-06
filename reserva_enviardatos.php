<?php include'header.php';?>
<!-- banner -->
<div class="inside-banner">
  <div class="container"> 
    <span class="pull-right"><a href="index.php">INICIO</a> / RESERVA</span>
    <h2>RESERVA</h2>
</div>
</div>
<!-- banner -->
<?php
       include("conexion.php");
       $link=conectarse();
       $dni=$_POST['dni'];
       $id=$_POST['idinmueble'];
       $query_usuario="select * from tb_usuario where dni_usuario='$dni'";
       $resultado_usuario=mysqli_query($link,$query_usuario) or die("Fallo en la consulta");
       
       $query_inmueble="select * from tb_inmueble where id_inmueble='$id'";
       $resultado_inmueble=mysqli_query($link,$query_inmueble) or die("Fallo en la consulta");


       ?>


<div class="container">
<div class="properties-listing spacer">


    <div class="row g-5">
      <div class="col-md-5 col-lg-4 order-md-last">
        <!--<h4 class="d-flex justify-content-between align-items-center mb-3">
          <span class="text-primary">Your cart</span>
          <span class="badge bg-primary rounded-pill">3</span>
        </h4>-->
        <ul class="list-group mb-3">
          <li class="list-group-item d-flex justify-content-between lh-sm">
            <div>
            <?php
            while($campo1=mysqli_fetch_array($resultado_inmueble))
            {
              ?>
              <h6 class="my-0" name="nombre" id="nombre"><?php echo $campo1["nombre_inmueble"];?></h6>
              <small class="text-muted" name="descripcion" id="descripcion"><?php echo $campo1["descripcion_inmueble"];?></small>
            </div>
              

            <span class="text-muted">Comision del 10% del total</span>
          </li>        
          <li class="list-group-item d-flex justify-content-between">
            <span>Total por noche (PEN)</span>
            <strong><?php echo $campo1["precio_inmueble"];?></strong>
          </li>
        </ul>
        <?php }
        mysqli_close($link);?>

       

        
      </div>
      <div class="col-md-7 col-lg-8">
        <h4 class="mb-3">Datos para Reserva</h4>
        <form class="needs-validation"  action="registrar_reserva.php" method="post">

          <div class="row g-3">

          <?php
            while($campo=mysqli_fetch_array($resultado_usuario))
            {
              ?>
              <div class="col-sm-6">
                <label for="id" class="form-label">ID</label>
                <input type="text" class="form-control" id="id" name="id" placeholder="" readonly value="<?php echo $campo["id_usuario"];?>" >
              </div>
              <br>
              <div class="col-sm-2">
              </div>
          </div>
             

          <div class="row g-3">
          
            <div class="col-sm-6">
              <label for="firstName" class="form-label">Nombres</label>
              <input type="text" class="form-control" id="nombre" name="nombre" readonly placeholder="" value="<?php echo $campo["nombre_usuario"];?>">
            </div>

            <div class="col-sm-6">
              <label for="lastName" class="form-label">Apellidos</label>
              <input type="text" class="form-control" id="apellido" name="apellido" readonly placeholder="" value="<?php echo $campo["apellido_usuario"];?>">
 
            </div>

            <div class="col-sm-12">
              <label for="email" class="form-label">Correo Elestronico</label>
              <input type="email" class="form-control" id="email" name="email" readonly placeholder="you@example.com" value="<?php echo $campo["correo_usuario"];?>">
              
            </div>

            <div class="col-sm-12">
              <label for="address" class="form-label">Direcci??n</label>
              <input type="text" class="form-control" id="direccion" name="direccion" readonly placeholder="1234 Main St" required="" value="<?php echo $campo["direccion_usuario"];?>">
              
            </div>
            
            
            

          </div>
          <div class="row gy-3">
            <div class="col-md-6">
              <label for="cc-name" class="form-label">Fecha Llegada</label>
              <input type="date" class="form-control" id="fllegada" name="fllegada" required="">
            
            </div>

            <div class="col-md-6">
              <label for="cc-number" class="form-label">Fecha Salida</label>
              <input type="date" class="form-control" id="fsalida" name="fsalida" required="">
            
            </div>



          <h4 class="mb-3">Pago</h4>

          <div class="my-3">
            <div class="form-check">
              <input id="credit" name="paymentMethod" type="radio" class="form-check-input" checked="" required="">
              <label class="form-check-label" for="credit">Tajeta de Credito</label>
            </div>
            <!--<div class="form-check">
              <input id="debit" name="paymentMethod" type="radio" class="form-check-input" required="">
              <label class="form-check-label" for="debit">Tarjeta de D??bito</label>
            </div>
            <div class="form-check">
              <input id="paypal" name="paymentMethod" type="radio" class="form-check-input" required="">
              <label class="form-check-label" for="paypal">PayPal</label>
            </div>-->
          </div>

          <div class="row gy-3">
            <div class="col-md-6">
              <label for="cc-name" class="form-label">Nombre en la tarjeta</label>
              <input type="text" class="form-control" id="ccnombre" name="ccnombre" placeholder="" required="">
              <small class="text-muted">Nombre completo</small>
              <div class="invalid-feedback">
              Nombre completo como se muestra en la tarjeta
              </div>
            </div>

            <div class="col-md-6">
              <label for="cc-number" class="form-label">Numero de Tarjeta de Cr??dito</label>
              <input type="text" class="form-control" id="ccnume" name="ccnume" placeholder="" required="">
              <div class="invalid-feedback">
                Se requiere el n??mero de la tarjeta de cr??dito
              </div>
            </div>

            <div class="col-md-3">
              <label for="cc-expiration" class="form-label">Vencimiento</label>
              <input type="text" class="form-control" id="expiracion" name="expiracion" placeholder="" required="">
              <div class="invalid-feedback">
              Fecha de vencimiento requerida
              </div>
            </div>

            <div class="col-md-3">
              <label for="cc-cvv" class="form-label">CVV</label>
              <input type="text" class="form-control" id="cccvv" name="cccvv" placeholder="" required="">
              <input type="hidden" class="form-control" id="idinmueble" name="idinmueble" value="<?php echo $id;?>" required="">
              <div class="invalid-feedback">
                Se requiere c??digo de seguridad
              </div>
            </div>
          </div>
          <?php
            }
            
            ?>

          <hr class="my-4">

          <button class="w-100 btn btn-primary btn-lg" type="submit">Reservar</button>
        </form>
      </div>
    </div>


</div>
</div>
<?php include'footer.php';?>