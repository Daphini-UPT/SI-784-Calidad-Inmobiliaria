<?php
session_start();
include("conexion.php");
if((isset($_POST['usuario'])) && (isset($_POST['contrasenia']))){
    $usuario = $_POST['usuario'];
    $password = $_POST['contrasenia'];
}
$link = conectarse();
$sql = "SELECT * FROM tb_usuario WHERE usuario_usuario = '$usuario' AND contrasenia_usuario = '$password'";
$rs = mysqli_query($link, $sql);
$campo = mysqli_fetch_assoc($rs);

if (mysqli_num_rows($rs)> 0){
    echo  "Sesion inciada</center>";
    $_SESSION["autenticado"] = "SI";
    $_SESSION["user"]="SI";
    session_name("logingUsuario");
    $_SESSION['nombre_usuario'] = $campo['id_tipo_usuario'];
    $_SESSION['id_usuario'] = $campo['id_usuario'];
    $_SESSION['ultimoAcceso']=date("Y-n-j H:i:s");
    header("Location: index.php");
    

}
else{

    header("Location: index.php?errousuario=si");
   
}
mysqli_free_result($rs);
mysqli_close($link);
?>