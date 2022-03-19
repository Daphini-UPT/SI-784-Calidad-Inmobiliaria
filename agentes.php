<?php include'header.php';?>
<!-- banner -->
<div class="inside-banner">
  <div class="container"> 
    <h2>Agentes</h2>
</div>
</div>


<div class="container">
<div class="spacer agents">

<div class="row">
  <div class="col-lg-8  col-lg-offset-2 col-sm-12">
      <?php 
        include("conexion.php");
        $link = conectarse();
        $instruccion = "SELECT * FROM tb_usuario WHERE id_tipo_usuario=3;";
        $rs=mysqli_query($link,$instruccion) or die("Fallo en la consulta");
        $n=mysqli_num_rows($rs);
        while($campo=mysqli_fetch_array($rs))
        {
		    ?>
      <div class="row">
        <div class="col-lg-2 col-sm-2 "><a href="#"><img src="Imagen_agentes/<?php echo $campo["imagen_usuario"];?>" class="img-responsive"  alt="agent name"></a></div>
        <div class="col-lg-7 col-sm-7 "><h4><?php echo $campo["nombre_usuario"];?></h4><p><?php echo $campo["descripcion_usuario"];?></p></div>
        <div class="col-lg-3 col-sm-3 "><span class="glyphicon glyphicon-envelope"></span> <a href="mailto:<?php echo $campo["correo_usuario"];?>"><?php echo $campo["correo_usuario"];?></a><br>
        <span class="glyphicon glyphicon-earphone"></span><?php echo $campo["telefono_usuario"];?></div>
      </div>
      <?php
        } 
        mysqli_close($link);
        ?>
  </div>
</div>


</div>
</div>

<?php include'footer.php';?>