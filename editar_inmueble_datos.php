<?php

$id = $_POST["id"];
$idusu=$_POST["id_usuario"];
$tipinm=$_POST['tipinm'];
$nombre=$_POST['titulo'];
$precio=$_POST['precio'];
$estado=$_POST['estado'];
$ubicacion=$_POST['ubicacion'];
$fecha=$_POST['fecha'];
$descripcion=$_POST['descripcion'];
//$idusuario=1;

//$nombreimagen=$_FILES['imagen']['name'];

include("conexion.php");
include("fun.php");
//conectamos a la base
$link=conectarse();


$imagen=$_FILES['imagen'];
$imagen_nombre=$imagen['name'];
if($imagen_nombre != '')
{
	$imagen_temporal =$imagen['tmp_name'];
	is_image($imagen_temporal) or die('<p>El archivo subido no es valido</p>');
	list($dest,$imagen_nombre) =rename_file("imageninmuebles/$imagen_nombre");
	move_uploaded_file($imagen_temporal, $dest) or die("<p>No se pudo Copiar el archivo</p>");
}

//$query_imagen = $imagen_nombre ?", imagen_inmueble = 'imageninmuebles/$imagen_nombre'":'';
$query_imagen = $imagen_nombre ?", imagen_inmueble = '$imagen_nombre'":'';

$instruccion ="UPDATE tb_inmueble SET id_tipo_inmueble='$tipinm', id_usuario='$idusu', nombre_inmueble='$nombre' ,precio_inmueble='$precio',estado_inmueble='$estado',
ubicacion_inmuebles='$ubicacion',fecha_disponibilidad_inmueble='$fecha',descripcion_inmueble='$descripcion' $query_imagen
WHERE id_inmueble='$id'";
//confirmacion que se ejecuto la sentencia sql
$rs=mysqli_query($link,$instruccion) or die("Fallo en la consulta");
if($rs==1){
	header("Location: index.php");

}

else 
{
	echo "<br>";
	//mensaje
	echo "<script language = 'javascript'>";
	echo "window.alert('Error al insertar el registro')";
	echo "</script>";
	echo "<br>";
	echo "<br>";
	//echo "<center>";
	echo "<a href=\"form_editar_usuario.php\">Retornar</a>";
}

?> 