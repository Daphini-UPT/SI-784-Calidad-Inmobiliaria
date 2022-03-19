<?php 
include('header.php');
include("conexion.php");
include("seguridad.php");

// ESTO RECEPCIONA EL ID DEL USUARIO
$id = $_GET['id'];
//conectamos a la base
$link=conectarse();
//insertamos los registros almacenados en la variables 
$instruccion ="SELECT * from tb_inmueble WHERE id_inmueble='$id' ";

$query_tipo_inmueble="select * from tb_tipo_inmueble";
    $resultado_tipo_inmueble=mysqli_query($link,$query_tipo_inmueble);

//confirmacion que se ejecuto la sentencia sql
$rs=mysqli_query($link,$instruccion) or die("Fallo en la consulta");
$n=mysqli_num_rows($rs);


?>


<!-- banner -->
<div class="inside-banner">
  <div class="container"> 
    <span class="pull-right"><a href="index.php">Inicio</a> / Editar Datos</span>
    <h2>Editar Inmueble</h2>
</div>
</div>
<!-- banner -->

<form class="needs-validation" action="editar_inmueble_datos.php" method="post" enctype="multipart/form-data">
<div class="container">
<div class="spacer">
<div class="row register">
  <div class="col-lg-6 col-lg-offset-3 col-sm-6 col-sm-offset-3 col-xs-12 ">
  <?php 
    While($campo=mysqli_fetch_array($rs)){
      ?>
                <input readonly id="id_inmueble" value="<?php echo $campo['id_inmueble'];?> " type="text" class="form-control"  name="id">
                <!-- esto es el combo box -->
                <label for="titulo">Tipo de Inmueble: </label>
                    <select class="form-control" name="tipinm">
                        <?php
                        if($resultado_tipo_inmueble)
                        while($campo_tipo_inmueble=mysqli_fetch_assoc($resultado_tipo_inmueble))
                        {
                            $nombre=$campo_tipo_inmueble["descripcion_tipo_inmueble"];
                            $id=$campo_tipo_inmueble["id_tipo_inmueble"];
                            echo "<option value=".$id.">".$nombre."</option>\n";
                        }
                        //mysqli_close($link);
                        ?>
                
                <input readonly value="<?php echo $campo['id_usuario'];?> "type="text" class="form-control" placeholder="Ingrese su Precio" name="id_usuario" id="id_usuario">
                <input value="<?php echo $campo['nombre_inmueble'];?> " type="text" class="form-control" placeholder="Ingrese su Nombre" name="titulo" id="titulo">
                
                <label>Foto</label> <br>
                <img src="images/properties/<?php echo $campo['imagen_inmueble'];?>" width="150px" height="150px">
                <input type="file" name="imagen" id="imagen" size="70">

                <input value="<?php echo $campo['precio_inmueble'];?> "type="text" class="form-control" placeholder="Ingrese su Precio" name="precio" id="precio">
                <input value="<?php echo $campo['estado_inmueble'];?> " type="text" class="form-control" placeholder="Ingrese su Estado" name="estado" id="estado">
                <input value="<?php echo $campo['ubicacion_inmuebles'];?> " type="text" class="form-control" placeholder="Ingrese su Ubicacion" name="ubicacion" id="ubicacion">
                <input value="<?php echo $campo['fecha_disponibilidad_inmueble'];?> " type="text" class="form-control" placeholder="Ubicacion" name="fecha"  id="fecha">
                <textarea  name="descripcion" class="form-control" cols="70" rows="5" id="descripcion" > <?php echo $campo["descripcion_inmueble"];?> </textarea>

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

