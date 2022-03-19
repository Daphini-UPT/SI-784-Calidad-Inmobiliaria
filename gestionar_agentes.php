<?php
include("seguridad.php"); 
include ('header.php');
?>
<!-- banner -->
<div class="inside-banner">
  <div class="container"> 
    <h2>Gestionar Agentes</h2>
</div>
</div>
<!-- banner -->


<div class="container">
<div class="spacer">
<div class="row contact">
  <div class="col-lg-6 col-sm-6 ">
  <form action="Controlador/agregar_agentes.php" method="post" enctype="multipart/form-data">
                <input type="text" name="nombre" class="form-control" placeholder="Nombres ">
				<input type="text" name="apellidoa" class="form-control" placeholder="Apellidos">
                <input type="text" name="correo" class="form-control" placeholder="Correo Electronico">
                <input type="text" name="telefono" class="form-control" placeholder="Numero de Contacto">
                <textarea rows="6" name="descripcion"  class="form-control" placeholder="Descripcion"></textarea>
				Imagen <br>
				<input type="file" name="imagen" size="70">
	  			<input type="submit" class="btn btn-success" value="Agregar" required>
	</form>
          


                
        </div>
  <div class="col-lg-6 col-sm-6 ">
  	<ul class="pull-left">
        <h3>Lista de agentes en la empresa</h3>
    </ul><br><br><br>
  	<table class="table table-striped">
		  <tr>
		  	<td>N°</td>
		    <td>Nombre</td>
		    <td>Correo</td>
		    <td>Contacto</td>
		    <td>Descripcion</td>
			<td>Imagen</td>
		    <td>Editar</td>
		  </tr>
		  <tr>
		  <?php 
			include("conexion.php");
			$link = conectarse();
			$instruccion = "SELECT * FROM tb_usuario WHERE id_tipo_usuario=3;";
			$rs=mysqli_query($link,$instruccion) or die("Fallo en la consulta");
			$n=mysqli_num_rows($rs);
			while($campo=mysqli_fetch_array($rs))
			{
		    ?>
			<td><?php echo $campo["id_usuario"];?></td>
		    <td><?php echo $campo["nombre_usuario"]; echo  $campo["apellido_usuario"];?></td>
		    <td><?php echo $campo["correo_usuario"];?></td>
		    <td><?php echo $campo["telefono_usuario"];?></td>
			<td><?php echo $campo["descripcion_usuario"];?></td>
		    <td><img src="Imagen_agentes/<?php echo $campo["imagen_usuario"];?>" width="100" height="100"></td>
		    <td>
				<a href="editar_agentes.php?id=<?php echo $campo['id_usuario']?>"> 	
			<img src="images/iconos/editar.png" >
			</td>
		  </tr>
		  <?php
		        }
		            mysqli_close($link);
		        ?>
	</table>
			</div>
</div>
</div>
</div>

<?php include'footer.php';?>