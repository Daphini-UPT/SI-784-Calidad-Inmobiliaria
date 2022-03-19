<?php include'header.php';?>
<!-- banner -->
<div class="inside-banner">
  <div class="container"> 
    <span class="pull-right"><a href="index.php">INICIO</a> / RESERVA</span>
    <h2>RESERVA</h2>
</div>
</div>
<!-- banner -->
<?php include("conexion.php");
       $link=conectarse();
       $id=$_GET['id'];
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
        

        
      </div>
      <div class="col-md-7 col-lg-8">
        <h4 class="mb-3">Datos para Reserva</h4>
        <form class="needs-validation" action="reserva_enviardatos.php" method="post">

          <div class="row g-3">
              <div class="col-sm-6">
                <label for="dni" class="form-label">DNI</label>
                <input type="text" class="form-control" id="dni" name="dni" placeholder="" value="" required="">
                <input type="hidden" class="form-control" id="idinmueble" name="idinmueble" value="<?php echo $campo1["id_inmueble"];?>" >
              </div>
              <br>
              <?php }
        mysqli_close($link);?>
              <div class="col-sm-2">
                <button class="btn btn-primary " type="submit">Validar</button>
              </div>
          </div>
       </form>

       

        <form class="needs-validation" novalidate="">

          <div class="row g-3">

            <div class="col-sm-6">
              <label for="firstName" class="form-label">Nombres</label>
              <input type="text" class="form-control" id="firstName" readonly placeholder="" value="" required="">
            </div>

            <div class="col-sm-6">
              <label for="lastName" class="form-label">Apellidos</label>
              <input type="text" class="form-control" id="lastName" readonly placeholder="" value="" required="">
 
            </div>

            <div class="col-sm-12">
              <label for="email" class="form-label">Correo Elestronico</label>
              <input type="email" class="form-control" id="email" readonly placeholder="you@example.com">
              
            </div>

            <div class="col-sm-12">
              <label for="address" class="form-label">Dirección</label>
              <input type="text" class="form-control" id="address" readonly placeholder="1234 Main St" required="">
              
            </div>

          </div>
          <div class="row gy-3">
            <div class="col-md-6">
              <label for="cc-name" class="form-label">Fecha Llegada</label>
              <input type="date" class="form-control" id="datei" placeholder="" required="">
            
            </div>

            <div class="col-md-6">
              <label for="cc-number" class="form-label">Fecha Salida</label>
              <input type="date" class="form-control" id="dates" placeholder="" required="">
            
            </div>



          <h4 class="mb-3">Pago</h4>

          <div class="my-3">
            <div class="form-check">
              <input id="credit" name="paymentMethod" type="radio" class="form-check-input" checked="" required="">
              <label class="form-check-label" for="credit">Tajeta de Credito</label>
            </div>
            <!--<div class="form-check">
              <input id="debit" name="paymentMethod" type="radio" class="form-check-input" required="">
              <label class="form-check-label" for="debit">Tarjeta de Débito</label>
            </div>
            <div class="form-check">
              <input id="paypal" name="paymentMethod" type="radio" class="form-check-input" required="">
              <label class="form-check-label" for="paypal">PayPal</label>
            </div>-->
          </div>

          <div class="row gy-3">
            <div class="col-md-6">
              <label for="cc-name" class="form-label">Nombre en la tarjeta</label>
              <input type="text" class="form-control" id="cc-name" placeholder="" required="">
              <small class="text-muted">Nombre completo</small>
              <div class="invalid-feedback">
              Nombre completo como se muestra en la tarjeta
              </div>
            </div>

            <div class="col-md-6">
              <label for="cc-number" class="form-label">Numero de Tarjeta de Crédito</label>
              <input type="text" class="form-control" id="cc-number" placeholder="" required="">
              <div class="invalid-feedback">
                Se requiere el número de la tarjeta de crédito
              </div>
            </div>

            <div class="col-md-3">
              <label for="cc-expiration" class="form-label">Vencimiento</label>
              <input type="text" class="form-control" id="cc-expiration" placeholder="" required="">
              <div class="invalid-feedback">
              Fecha de vencimiento requerida
              </div>
            </div>

            <div class="col-md-3">
              <label for="cc-cvv" class="form-label">CVV</label>
              <input type="text" class="form-control" id="cc-cvv" placeholder="" required="">
              <div class="invalid-feedback">
                Se requiere código de seguridad
              </div>
            </div>
          </div>

          <hr class="my-4">

          <button class="w-100 btn btn-primary btn-lg" type="submit">Reservar</button>
        </form>
      </div>
    </div>


</div>
</div>
<?php include'footer.php';?>