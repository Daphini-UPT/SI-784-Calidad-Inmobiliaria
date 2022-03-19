<?php include'header.php';?>
<!-- banner -->
<div class="inside-banner">
  <div class="container"> 
    <span class="pull-right"><a href="#">Home</a> / Contact Us</span>
    <h2>Historial de Reserva de Inmuebles</h2>
</div>
</div>
<!-- banner -->


<div class="container">
    
    
    <div class="spacer">
        <div class="row contact">
			
        <table class="table table-striped table-hover">
		  <tr>
		 	<td>Nombre Arrendador</td>
			<td>Apellido Arrendador</td>
			<td>Nombre Inmueble</td>
		    <td>Fecha Reserva</td>
		    <td>Inicio de Reserva</td>
		    <td>Final de Reserva</td>
		  </tr>
		  <tr>
		  <?php 
			include("conexion.php");
			$id = $_SESSION['id_usuario'];
			$link = conectarse();
			$instruccion = "SELECT a.*,b.nombre_usuario,b.apellido_usuario,c.nombre_inmueble
			FROM tb_reserva AS a
			INNER JOIN tb_usuario AS b ON a.id_usuario=b.id_usuario
			INNER JOIN tb_inmueble AS c ON a.id_inmueble=c.id_inmueble where c.id_usuario='$id'";
			$rs=mysqli_query($link,$instruccion) or die("Fallo en la consulta");
			$n=mysqli_num_rows($rs);
			while($campo=mysqli_fetch_array($rs))
			{
		    ?>
			<td><?php echo $campo["nombre_usuario"]?></td>
			<td><?php echo $campo["apellido_usuario"];?></td>
			<td><?php echo $campo["nombre_inmueble"];?></td>
		    <td><?php echo $campo["fecha_reserva"];?></td>
		    <td><?php echo $campo["fecha_inicio_reserva"];?></td>
		    <td><?php echo $campo["fecha_fin_reserva"];?></td>
		  </tr>
		  <?php
		        }
		            mysqli_close($link);
		        ?>
			</table>
            
        </div>
    </div>
</div>


<?php include'footer.php';?>