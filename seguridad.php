<?php

if (!isset($_SESSION)) {
  //Inicio la sesion
  session_start();
}

  //Comprueba que el usuario esta autenticado
  if($_SESSION['autenticado']!="SI"){
    header("Location: index.php");
    exit();
    }


?>