<?php
function conectarse()

{

if(!($link = mysqli_connect("127.0.0.1:3306","root","","db_inmobiliaria")))
{
	echo"error conectando a la base de datos.";
	exit();

}
return $link;
}

?>
