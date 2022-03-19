<?php 
include('header.php');
include("conexion.php");
    $link=conectarse();
    $query_tipo_usuario="SELECT * from tb_tipo_usuario WHERE id_tipo_usuario = 1 OR id_tipo_usuario = 2 ";
    $resultado_tipo_usuario=mysqli_query($link,$query_tipo_usuario);
?>


<!-- banner -->
<div class="inside-banner">
  <div class="container"> 
    <span class="pull-right"><a href="index.php">Inicio</a> / Registrarse</span>
    <h2>Registrarse</h2>
</div>
</div>
<!-- banner -->

<form class="needs-validation" action="registrar_usuario.php" method="post" enctype="multipart/form-data">
<div class="container">
<div class="spacer">
<div class="row register">
  <div class="col-lg-6 col-lg-offset-3 col-sm-6 col-sm-offset-3 col-xs-12 ">
  
                <select class="form-control" name="tipo_usuario">
                     <?php
                        if($resultado_tipo_usuario)
                        while($campo_tipo_usuario=mysqli_fetch_assoc($resultado_tipo_usuario))
                        {
                            $nombre=$campo_tipo_usuario["descripcion_tipo_usuario"];
                            $id=$campo_tipo_usuario["id_tipo_usuario"];
                            echo "<option value=".$id.">".$nombre."</option>\n";
                        }
                        mysqli_close($link);
                ?>
                <input type="text" class="form-control" placeholder="Ingrese su DNI" name="dni_usuario">
                <input type="text" class="form-control" placeholder="Ingrese su Nombre" name="nombre_usuario">
                <input type="text" class="form-control" placeholder="Ingrese su Apellido" name="apellido_usuario">
                <input type="text" class="form-control" placeholder="Ingrese su Nro Celular" name="telefono_usuario">
                <input type="text" class="form-control" placeholder="Ingrese su correo" name="correo_usuario">
                <textarea rows="6" class="form-control" placeholder="Direccion" name="direccion_usuario"></textarea>

                <input type="text" class="form-control" placeholder="Ingrese su usuario" name="usuario">

                <input type="password" class="form-control" placeholder="Contraseña" name="contraseña">
                <input type="password" class="form-control" placeholder="Confirmar contraseña" name="contraseña1">
                <label>Foto</label>
                <input type="file" name="imagen" size="70">
               
      <button type="submit" class="btn btn-success" name="Submit">Registrarse</button>
      </div>
  </div>
  </div>  
  </div>

  </form>
              

    
<?php 
include('footer.php');
?>

