<?php

$idusu=$_POST['id'];
$nombre=$_POST['nombre'];
$apellido=$_POST['apellido'];
$email=$_POST['email'];
$direccion=$_POST['direccion'];
$llegada=$_POST['fllegada'];
$salida=$_POST['fsalida'];
$idinmueble=$_POST['idinmueble'];

$pedazos_fecha1 = explode('-', $llegada);
$pedazos_fecha2 = explode('-', $salida);

$diaI=(int)$pedazos_fecha2[2];
$diaII=(int)$pedazos_fecha1[2];
echo $diaI;
echo " ";
echo $diaII;

$dias=(int)$diaI-(int)$diaII;
echo $dias;

include("conexion.php");
//conectamos a la bd
$link=conectarse();

$query_inmueble="select * from tb_inmueble where id_inmueble='$idinmueble'";
$resultado_inmueble=mysqli_query($link,$query_inmueble) or die("Fallo en la consulta");
while($campo1=mysqli_fetch_array($resultado_inmueble))
{
    $montof=$campo1["precio_inmueble"];
    

}
$montof=$dias*$montof;

$comision=$montof*0.1;
$montof=$montof+$comision;


//insertamos los registros almacenados en las variables
$instruccion="insert into tb_reserva (id_inmueble, id_usuario, fecha_reserva, fecha_inicio_reserva, monto_reserva, comision_reserva, fecha_fin_reserva) values ('$idinmueble', '$idusu', NOW(), '$llegada', '$montof','$comision' ,'$salida')";
//date(string $format, int $timestamp = time()): string

#$fecha=date(string $format, int $timestamp = time()): string;
//mysqli_query($link,$instruccion);
$rs=mysqli_query($link,$instruccion) or die("Fallo en la consulta1");

$consultaayuda="select * from tb_reserva where id_inmueble='$idinmueble' and  id_usuario='$idusu' and monto_reserva='$montof'";
$rs1=mysqli_query($link,$consultaayuda) or die("Fallo en la consulta2");
while($campo1=mysqli_fetch_array($rs1))
{
    $idreserva=$campo1['id_reserva'];
}

$instruccion2="insert into tb_transaccion (id_usuario,id_reserva, fecha_transaccion, monto_total_transaccion) values ('$idusu','$idreserva', NOW(), '$montof')";



//confirmacion que se ejecuto la sentencia sql
$rs2=mysqli_query($link,$instruccion2) or die("Fallo en la consulta3");
mysqli_close($link);
if($rs2==1)
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