<?php


$tipinm=$_POST['tipinm'];
$nombre=$_POST['titulo'];

$precio=$_POST['precio'];
$estado="INACTIVO";
$ubicacion=$_POST['ubicacion'];
$fecha=$_POST['fecha'];
$descripcion=$_POST['descripcion'];
$idusuario=$_POST['id_usuario'];


$nombreimagen=$_FILES['imagen']['name'];
$ruta=$_FILES['imagen']['tmp_name'];
//$destino="images/properties/".$nombreimagen;
$destino="imageninmuebles/".$nombreimagen;
copy($ruta,$destino);

include("conexion.php");
//$idusuario = $_SESSION['id_usuario'];
//conectamos a la bd
$link=conectarse();
//insertamos los registros almacenados en las variables
$instruccion="insert into tb_inmueble (id_tipo_inmueble, id_usuario, nombre_inmueble, imagen_inmueble, precio_inmueble, estado_inmueble, ubicacion_inmuebles, fecha_disponibilidad_inmueble, descripcion_inmueble) values ('$tipinm', '$idusuario', '$nombre', '$nombreimagen', '$precio', '$estado', '$ubicacion', '$fecha', '$descripcion')";

//mysqli_query($link,$instruccion);

//confirmacion que se ejecuto la sentencia sql
$rs=mysqli_query($link,$instruccion) or die("Fallo en la consulta");
mysqli_close($link);
if($rs==1)
{
    echo "<br>";
    //mensaje
    echo "windows.alert('El registro fue insertado con exito')";
    echo "</script>";
    echo "<hr>";
    echo "<br>";
    echo "<a href=\"rent_list.php\">Retornar</a>";
}
else{
    echo "<br>";
    //mensaje
    echo "<script language='javascript'>";
    echo "windows.alert('error al insertar el registro')";
    echo "</script>";
    echo "<br>";
    echo "<br>";

echo "<a href=\"reserva.php\"> Retornar</a>";
}
?>