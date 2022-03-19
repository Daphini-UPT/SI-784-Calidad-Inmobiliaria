<?php 
   //recibimos las variables enviadas por el formulario
$id=$_POST["id_usuario"];
$dni=$_POST["dni_usuario"];
$nombre=$_POST["nombre_usuario"];
$apellido=$_POST["apellido_usuario"];
$direccion=$_POST["direccion_usuario"];
$telefono=$_POST["telefono_usuario"];
$correo=$_POST["correo_usuario"];
$usuario=$_POST["usuario_usuario"];
$descripcion=$_POST["descripcion_usuario"];
$contraseña=$_POST["contraseña"];
$estado = 'ACTIVO';
$tipo=$_POST["tipo_usuario"];
//$nombreimagen=$_FILES['imagen']['name'];

include("conexion.php");
include("fun.php");
//conectamos a la base
$link=conectarse();

$imagen=$_FILES['imagen'];
$nombreimagen=$imagen['name'];


if($nombreimagen != '')
{
	$imagen_temporal =$imagen['tmp_name'];
	is_image($imagen_temporal) or die('<p>El archivo subido no es valido</p>');
	list($dest,$nombreimagen) =rename_file("Imagen_Usuarios/$nombreimagen");
	move_uploaded_file($imagen_temporal, $dest) or die("<p>No se pudo Copiar el archivo</p>");
}
$query_imagen = $nombreimagen ?", imagen_usuario = 'Imagen_Usuarios/$nombreimagen'":'';
//$ruta=$_FILES['imagen']['tmp_name'];

//copy($ruta,$destino);
//$fecha

//insertamos los registros almacenados en la variables 
$instruccion ="UPDATE tb_usuario SET id_tipo_usuario='$tipo', dni_usuario='$dni', estado_usuario='$estado' ,nombre_usuario='$nombre',apellido_usuario='$apellido',direccion_usuario='$direccion',telefono_usuario='$telefono',correo_usuario='$correo' , usuario_usuario='$usuario' , contrasenia_usuario='$contraseña' , descripcion_usuario='$descripcion' $query_imagen
WHERE id_usuario='$id'";
//confirmacion que se ejecuto la sentencia sql
$rs=mysqli_query($link,$instruccion) or die("Fallo en la consulta");
if($rs==1){
	echo "<br>";
	//Mensaje
	echo "<script language='javascript'>";
	echo "window.alert('El registro fue insertado con Exito')";
	echo "</script>";
	echo "<hr>";
	echo "<br>";
	//echo "<center>";
	echo "<a href=\"perfil.php\">Retornar</a>";
	//echo "</center>";

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