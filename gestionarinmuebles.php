<?php 
include('header.php');
include("seguridad.php");
?>
<!-- banner -->
<div class="inside-banner">
  <div class="container"> 
    <span class="pull-right"><a href="#">Home</a> / Contact Us</span>
    <h2>Nuevos Inmuebles</h2>
</div>
</div>
<!-- banner -->
<?php
include("conexion.php");
$id = $_SESSION['id_usuario'];
$link=conectarse();
$query_tipo_inmueble="select * from tb_tipo_inmueble";
$resultado_tipo_inmueble=mysqli_query($link,$query_tipo_inmueble);

$query_usuario="select * from tb_usuario where id_usuario='$id'";
$resultado_usuario=mysqli_query($link,$query_usuario) or die("Fallo en la consulta");

//$rs=mysqli_query($link,$instruccion) or die("Fallo en la consulta");
//$n=mysqli_num_rows($rs);

?>

    <div class="container">
        <div class="spacer">
            <div class="row contact">
            
                <div class="col-lg-6 col-sm-6 ">
                    <form action="agregar_inmuebles.php" method="post" enctype="multipart/form-data">
                        <input name="titulo" type="text" class="form-control" placeholder="Titulo">

                        <?php
                            while($campo1=mysqli_fetch_array($resultado_usuario))
                            {
                            ?>
                                <input readonly name="id_usuario" value="<?php echo $campo1['id_usuario'];?>" type="text" class="form-control">
                                
                            <?php
                            }
                            ?>
                        

                        
                        
                        Tipo Inmueble: <br>
                        <select class="form-control" name="tipinm" >
                        <?php
                            if($resultado_tipo_inmueble)
                                while($campo_tipo_inmueble=mysqli_fetch_assoc($resultado_tipo_inmueble)){
                                    $nombre=$campo_tipo_inmueble['descripcion_tipo_inmueble'];
                                    $id=$campo_tipo_inmueble['id_tipo_inmueble'];
                                    echo "<option value=".$id.">".$nombre."</option>\n";
                                }
                        ?>

                        <input type="file" name="imagen" size="70">

                        <input name="precio" type="text" class="form-control" placeholder="Precio [S/.]">

                        <input name="ubicacion" type="text" class="form-control" placeholder="Ubicacion">

                        <div class="row gy-3">
                            <div class="col-md-6">
                            <label for="cc-name" class="form-label">Fecha de Disponibilidad</label>
                            <input type="date" class="form-control" id="fecha" name="fecha" required="">
                        </div>
                        </div>
                        
                        <textarea name="descripcion" class="form-control" cols="70" rows="5" id="descripcion" placeholder="Descripcion" ></textarea>
                    
                        <button type="submit" class="btn btn-success" name="Submit">Agregar Inmueble</button>
                    </form>
                </div>
                <div class="col-lg-6 col-sm-6">
                    <ul class="pull-left">
                        <h3>Lista de Inmuebles</h3>
                    </ul>
                    <table class="table table-bordered table-striped mb-0" >
                        <tr>
                            <td>Nombre</td>
                            <td>Tipo de Apartemento</td>
                            <td>Imagen</td>
                            <td>Precio</td>
                            <td>Direccion</td>
                            <td>Fecha</td>
                            <td>Editar</td>
                        </tr>
                        <tr>
                        <?php 
                            $id1 = $_SESSION['id_usuario'];
                            $instruccion = "SELECT * FROM tb_inmueble where id_usuario='$id1'";
                            $rs=mysqli_query($link,$instruccion) or die("Fallo en la consulta");
                            $n=mysqli_num_rows($rs);
                            while($campo=mysqli_fetch_array($rs))
                            {
                            ?>
                            <td><?php echo $campo["nombre_inmueble"];?></td>
                            <td><?php echo $campo["id_tipo_inmueble"];?></td>
                            <td><img src="images/properties/<?php echo $campo["imagen_inmueble"];?>" width="150" height="150"></td>
                            <td><?php echo $campo["precio_inmueble"];?></td>
                            <td><?php echo $campo["ubicacion_inmuebles"];?></td>
                            <td><?php echo $campo["fecha_disponibilidad_inmueble"];?></td>
                            <td>
                                <a href="form_editar_inmueble.php?id=<?php echo $campo['id_inmueble']?>">  
                                <img src="images/iconos/editar.png">
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


<?php 
include('footer.php');
?>