<?php include'header.php';?>
<!-- banner -->
<div class="inside-banner">
  <div class="container"> 
    <h2>Reportes</h2>
</div>
</div>
<!-- banner -->

<div class="container">
<div class="spacer">
<div class="row contact">
  <div class="col-lg-6 col-sm-6 ">
        <h3><p style="background:#72B70F;color:white; padding:15px; border:3px solid #396B37; border-radius:10px;">Reporte General</p></h3>
  	<table class="table table-striped">
		  <tr>
		    <td>N°</td>
		    <td>INMUEBLE</td>
		    <td>USUARIO</td>
		    <td>FECHA RESERVA</td>
		    <td>MONTO RESERVA</td>
		  </tr>
		  <tr>
		  <?php 
			include("conexion.php");
			$id = $_SESSION['id_usuario'];
			$link = conectarse();
			$instruccion_arendador= "SELECT id_tipo_usuario FROM tb_usuario WHERE id_tipo_usuario=1";
			$rs_arrendador=mysqli_query($link,$instruccion_arendador) or die("Fallo en la consulta");
			$instruccion_arrendatario= "SELECT id_tipo_usuario FROM tb_usuario WHERE id_tipo_usuario=2";
			$rs_arrendatario=mysqli_query($link,$instruccion_arrendatario) or die("Fallo en la consulta");
			$instruccion_agente= "SELECT id_tipo_usuario FROM tb_usuario WHERE id_tipo_usuario=3";
			$rs_agente=mysqli_query($link,$instruccion_agente) or die("Fallo en la consulta");
			$n_agente=mysqli_num_rows($rs_agente);
			$n_arrendador=mysqli_num_rows($rs_arrendador);
			$n_arrendatario=mysqli_num_rows($rs_arrendatario);
			$instruccion = "SELECT a.*,b.nombre_usuario,b.apellido_usuario,c.nombre_inmueble
			FROM tb_reserva AS a
			INNER JOIN tb_usuario AS b ON a.id_usuario=b.id_usuario
			INNER JOIN tb_inmueble AS c ON a.id_inmueble=c.id_inmueble ";
			$rs=mysqli_query($link,$instruccion) or die("Fallo en la consulta");
			$n=mysqli_num_rows($rs);
			while($campo=mysqli_fetch_array($rs))
			{
		    ?>
			<td><?php echo $campo["id_inmueble"]?></td>
			<td><?php echo $campo["nombre_inmueble"];?></td>
			<td><?php echo $campo["nombre_usuario"]; echo $campo["apellido_usuario"]; ?></td>
		    <td><?php echo $campo["fecha_reserva"];?></td>
		    <td><?php echo $campo["monto_reserva"];?></td>
		  	</tr>
		  	<?php
		    }
		    mysqli_close($link);
		    ?>
	</table>
	<a type="button" href="generar_reporte.php" class="btn btn-primary">Generar Reporte</a><hr>
	<br>
        </div>
  <div class="col-lg-6 col-sm-6 ">

  <h3><p style="background:#72B70F;color:white; padding:15px; border:3px solid #396B37; border-radius:10px;">Reporte ingreso de Usuarios</p></h3>
           <canvas id="myChart"></canvas>
			<script src="chart.js"></script>
			<script>
			var ctx = document.getElementById('myChart').getContext('2d');
			var chart = new Chart(ctx, {
			    type: 'doughnut',
			    data:{
				datasets: [{
					data: ['<?php echo $n_agente ?>', '<?php echo $n_arrendador ?>','<?php echo $n_arrendatario ?> '],
					backgroundColor: ['red', 'green','blue'],
					label: 'Reporte de Usuarios'}],
					labels: ['Agentes','Arrendador','Arrendatario']},
			    options: {responsive: true}
			});
			</script>   
</div>
</div>
</div>





<?php include'footer.php';?>