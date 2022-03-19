<!DOCTYPE html>
<?php
//incluir modulo de conexion 
include("conexion.php");
include("fphp/fun.php");

?>
<!DOCTYPE html>
<title>Editar</title>
<?php 
$link =conectarse();
$id = $_POST['ida'];
$nombre = $_POST['nombrea'];
$apellido = $_POST['apellidoa'];
$correo = $_POST['correoa'];
$telefono = $_POST['telefonoa'];
$descripcion = $_POST['descripciona'];

$imagen=$_FILES['imagena'];
$imagen_nombre=$imagen['name'];
if($imagen_nombre != '')
{
	$imagen_temporal =$imagen['tmp_name'];
	is_image($imagen_temporal) or die('<p>El archivo subido no es valido</p>');
	list($dest,$imagen_nombre) =rename_file("Imagen_agentes/$imagen_nombre");
	move_uploaded_file($imagen_temporal, $dest) or die("<p>No se pudo Copiar el archivo</p>");
}
$query_imagen = $imagen_nombre ?", imagen_usuario = '$imagen_nombre'":'';
$query="UPDATE tb_usuario SET nombre_usuario='$nombre', apellido_usuario='$apellido', correo_usuario= '$correo',telefono_usuario='$telefono',
descripcion_usuario='$descripcion' $query_imagen
WHERE id_usuario='$id'";
$result=mysqli_query($link,$query);
mysqli_close($link);
?>
<section>
<?php header("location: gestionar_agentes.php");?>
</section>
</div>
</body>
</html>
