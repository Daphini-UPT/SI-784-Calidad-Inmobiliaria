<?php 
include('header.php');
include("conexion.php");
// ESTO RECEPCIONA EL ID DEL USUARIO se tiene que cambiar
$id=$_SESSION['id_usuario'];
//conectamos a la base
$link=conectarse();
//insertamos los registros almacenados en la variables 
$instruccion ="SELECT * from tb_usuario WHERE id_usuario='$id' ";

$query_tipo_usuario="select * from tb_tipo_usuario";
    $resultado_tipo_usuario=mysqli_query($link,$query_tipo_usuario);

//confirmacion que se ejecuto la sentencia sql
$rs=mysqli_query($link,$instruccion) or die("Fallo en la consulta");
$n=mysqli_num_rows($rs);


?>


<!-- banner -->
<div class="inside-banner">
  <div class="container"> 
    <span class="pull-right"><a href="index.php">Inicio</a> / Editar Datos</span>
    <h2>Editar Datos</h2>
</div>
</div>
<!-- banner -->

<form class="needs-validation" action="enviar_editar_usuario.php" method="post" enctype="multipart/form-data">
<div class="container">
<div class="spacer">
<div class="row register">
  <div class="col-lg-6 col-lg-offset-3 col-sm-6 col-sm-offset-3 col-xs-12 ">
  <?php 
    While($campo=mysqli_fetch_array($rs)){
      ?>
                <input readonly id="id_usuario" value="<?php echo $campo['id_usuario'];?> " type="text" class="form-control"  name="id_usuario">
                <!-- esto es el combo box -->
                <label for="titulo">Tipo de usuario: </label>
                    <select class="form-control" name="tipo_usuario">
                        <?php
                        if($resultado_tipo_usuario)
                        while($campo_tipo_usuario=mysqli_fetch_assoc($resultado_tipo_usuario))
                        {
                            $nombre=$campo_tipo_usuario["descripcion_tipo_usuario"];
                            $id=$campo_tipo_usuario["id_tipo_usuario"];
                            echo "<option value=".$id.">".$nombre."</option>\n";
                        }
                        //mysqli_close($link);
                        ?>
                
                <input id="dni_usuario" value="<?php echo $campo['dni_usuario'];?> " type="text" class="form-control" placeholder="Ingrese su DNI" name="dni_usuario">
                <input value="<?php echo $campo['nombre_usuario'];?> " type="text" class="form-control" placeholder="Ingrese su Nombre" name="nombre_usuario" id="nombre_usuario">
                <input value="<?php echo $campo['apellido_usuario'];?> "type="text" class="form-control" placeholder="Ingrese su Apellido" name="apellido_usuario" id="apellido_usuario">
                <input value="<?php echo $campo['telefono_usuario'];?> " type="text" class="form-control" placeholder="Ingrese su Nro Celular" name="telefono_usuario" id="telefono_usuario">
                <input value="<?php echo $campo['correo_usuario'];?> " type="text" class="form-control" placeholder="Ingrese su correo" name="correo_usuario" id="correo_usuario">
                <input value="<?php echo $campo['direccion_usuario'];?> " type="text" class="form-control" placeholder="Direccion" name="direccion_usuario"  id="direccion_usuario">
                <input value="<?php echo $campo['usuario_usuario'];?> " type="text" class="form-control" placeholder="Ingrese su usuario" name="usuario_usuario" id="usuario_usuario">
                <textarea  rows="6" class="form-control" placeholder="Ingrese una breve descripción de usted" name="descripcion_usuario"><?php echo $campo['descripcion_usuario'];?></textarea>

                <input value="<?php echo $campo['contrasenia_usuario'];?> " type="password" class="form-control" placeholder="Contraseña" name="contraseña" id="contraseña">
                <input value="<?php echo $campo['contrasenia_usuario'];?> "type="password" class="form-control" placeholder="Confirmar contraseña" name="contraseña1" id="contraseña1">
                <label>Foto</label> <br>
                <img src="<?php echo $campo['imagen_usuario'];?>" width="150px" height="150px">
                <input type="file" name="imagen" size="70" > 
                
                <br>
                
                <?php } mysqli_close($link); ?>

      <button type="submit" class="btn btn-success" name="Submit">Actualizar</button>
      </div>
  </div>
  </div>  
  </div>

  </form>
              

    
<?php 
include('footer.php');
?>

