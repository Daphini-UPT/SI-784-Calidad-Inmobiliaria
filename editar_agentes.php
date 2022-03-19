<?php
include("conexion.php");
$link=conectarse();
if  (isset($_GET['id'])) {
  $id = $_GET['id'];
  $query = "SELECT * FROM tb_usuario WHERE id_tipo_usuario=3 and id_usuario=$id;";
  $result = mysqli_query($link,$query);
  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_array($result);
    $nombre = $row['nombre_usuario'];
    $apellido = $row['apellido_usuario'];
    $correo = $row['correo_usuario'];
    $numero = $row['telefono_usuario'];
    $descripcion = $row['descripcion_usuario'];
    $imagen = $row['imagen_usuario'];
  }
}
include("header.php");
?>
<!-- banner -->
<div class="inside-banner">
  <div class="container"> 
    <h2>Editar Agentes</h2>
</div>
</div>
<!-- banner -->
<div class="container">
<div class="spacer">
<div class="row contact" >
  <form action="editar_agentes_mante.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="ida" class="form-control" value="<?php echo $id; ?>" >
                <input type="text" name="nombrea" class="form-control" value="<?php echo $nombre; ?>" >
				        <input type="text" name="apellidoa" class="form-control" value="<?php echo $apellido; ?>">
                <input type="text" name="correoa" class="form-control" value="<?php echo $correo; ?>">
                <input type="text" name="telefonoa" class="form-control" value="<?php echo $numero; ?>">
                <textarea rows="6" name="descripciona"  class="form-control" ><?php  echo $descripcion; ?> </textarea>
				        Imagen <br>
                <img src="Imagen_agentes/<?php echo $imagen;?>"  width="150px" height="150px"><br>
                <label for="imagen">Modificar imagen</label>
		            <input type="file" name="imagena" id="imagen" >  
                <input type="submit" class="btn btn-success"  value="Actualizar"/>
                </button>
	</form>
</div>
</div>
</div>
<?php include('footer.php');?>