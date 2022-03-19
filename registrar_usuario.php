<?php

//recibimos las variables enviadas por el formulario
//$id=$_POST['id'];
$dni=$_POST["dni_usuario"];
$nombre=$_POST["nombre_usuario"];
$apellido=$_POST["apellido_usuario"];
$direccion=$_POST["direccion_usuario"];
$telefono=$_POST["telefono_usuario"];
$correo=$_POST["correo_usuario"];
$usuario=$_POST["usuario"];
$contraseña=$_POST["contraseña"];
$estado = 'ACTIVO';
$tipo =$_POST['tipo_usuario'];
$nombreimagen=$_FILES['imagen']['name'];
$ruta=$_FILES['imagen']['tmp_name'];
$destino="Imagen_Usuarios/".$nombreimagen;
copy($ruta,$destino);
//$fecha
include("conexion.php");
//conectamos a la base
$link=conectarse();
//insertamos los registros almacenados en la variables 
$instruccion ="INSERT into tb_usuario(id_tipo_usuario, dni_usuario, estado_usuario, nombre_usuario, apellido_usuario, direccion_usuario, telefono_usuario, correo_usuario, usuario_usuario, contrasenia_usuario,imagen_usuario)
values('$tipo','$dni','$estado', '$nombre','$apellido','$direccion','$telefono','$correo', '$usuario', '$contraseña','$destino')";
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
	echo "<a href=\"register.php\">Retornar</a>";
}
?>