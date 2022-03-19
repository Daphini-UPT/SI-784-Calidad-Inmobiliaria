<?php 
include("../conexion.php");
//recibimos las variables enviadas por el formulario
$nombre=$_POST["nombre"];
$apellido=$_POST["apellidoa"];
$correo=$_POST["correo"];
$telefono=$_POST["telefono"];
$descripcion=$_POST["descripcion"];
$nombreimagen=$_FILES['imagen']['name'];
$ruta=$_FILES['imagen']['tmp_name'];
$destino="../Imagen_agentes/".$nombreimagen;
copy($ruta,$destino);

//incluir modulo de conexion 

//abrir la conexion con el servidor de base de datos
$link=conectarse();
//insertamos los registros almacenados en las variables
$instruccion ="insert into tb_usuario(id_tipo_usuario,imagen_usuario,nombre_usuario,apellido_usuario,telefono_usuario,correo_usuario,descripcion_usuario)
values(3,'$nombreimagen','$nombre','$apellido','$telefono','$correo','$descripcion')";
$rs=mysqli_query($link,$instruccion);
if ($rs== 1 ) {
    header('Location: ../gestionar_agentes.php?mensaje=registrado'); 
} else {
    header('Location: ../gestionar_agentes.php?mensaje=error');
    exit();
}
?>