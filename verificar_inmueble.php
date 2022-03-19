<?php
include("seguridad.php"); 
include ('header.php');
?>
<!-- banner -->
<div class="inside-banner">
  <div class="container"> 
    <h2>Verificar Inmueble</h2>
</div>
</div>
<!-- banner -->


<div class="container">
<div class="spacer">
<div class="row contact">
        <h3>Lista de inmuebles sin registrar</h3>
    </ul><br><br><br>
  	<table class="table table-striped">
		  <tr>
		  	<td>N°</td>
		    <td>Nombre</td>
		    <td>precio</td>
		    <td>Direccion</td>
		    <td>Fecha</td>
			  <td>Imagen</td>
		    <td>Activar</td>
		  </tr>
		  <tr>
		  <?php 
			include("conexion.php");
			$link = conectarse();
			$instruccion = "SELECT * FROM tb_inmueble WHERE estado_inmueble='INACTIVO';";
			$rs=mysqli_query($link,$instruccion) or die("Fallo en la consulta");
			$n=mysqli_num_rows($rs);
			while($campo=mysqli_fetch_array($rs))
			{
		    ?>
			<td><?php echo $campo["id_inmueble"];?></td>
		    <td><?php echo $campo["nombre_inmueble"];?></td>
		    <td><?php echo $campo["precio_inmueble"];?></td>
		    <td><?php echo $campo["ubicacion_inmuebles"];?></td>
			<td><?php echo $campo["fecha_disponibilidad_inmueble"];?></td>
		    <td><img src="images/properties/<?php echo $campo["imagen_inmueble"];?>" width="100" height="100"></td>
		    <td>
				<a href="activar_inmueble.php?id=<?php echo $campo['id_inmueble']?>"> 	
			<img src="images/iconos/activar.png" >
			</td>
		  </tr>
		  <?php
		        }
		            mysqli_close($link);
		        ?>
	</table>      
  
</div>
</div>

<?php include'footer.php';?>