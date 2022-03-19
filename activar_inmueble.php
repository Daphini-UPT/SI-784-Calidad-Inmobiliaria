<?php 
$id = $_GET["id"];
$estado = "DISPONIBLE";
include("conexion.php");
//conectamos a la base
$link=conectarse();
//insertamos los registros almacenados en la variables 
$instruccion ="UPDATE tb_inmueble SET estado_inmueble='$estado' WHERE id_inmueble='$id'";
//confirmacion que se ejecuto la sentencia sql
$rs=mysqli_query($link,$instruccion) or die("Fallo en la consulta");
if($rs==1){
	header("location: verificar_inmueble.php");
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
	echo "<a href=\"verificar_inmueble.php\">Retornar</a>";
}

?> 