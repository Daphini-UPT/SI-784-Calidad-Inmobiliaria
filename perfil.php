<?php 
include('headerperfil.php');
include("conexion.php");
session_start();
// ESTO RECEPCIONA EL ID DEL USUARIO se tiene que cambiar
$id = $_SESSION['id_usuario'];
//conectamos a la base
$link=conectarse();
//insertamos los registros almacenados en la variables 
$instruccion ="SELECT * from tb_usuario WHERE id_usuario='$id' ";

$query_tipo_usuario="select * from tb_tipo_usuario";
    $resultado_tipo_usuario=mysqli_query($link,$query_tipo_usuario);

//confirmacion que se ejecuto la sentencia sql
$rs=mysqli_query($link,$instruccion) or die("Fallo en la consulta");
$n=mysqli_num_rows($rs);


?>
<?php 
    While($campo=mysqli_fetch_array($rs)){
      ?>
<div id="perfil">
    <link rel="stylesheet" href="assets/bootstrap/css/estiloPerfil.css" />


	<!-- Capa do Perfil -->
	<div class="header">
		<!-- Botão "Alterar Fundo" -->
		
	</div>

	<!-- Avatar do Utilizador -->
	<div class="avatar">
		<img src="<?php echo $campo['imagen_usuario'];?>" width="150px" height="150px">	
	</div>

	
   
	<!-- Título do Perfil -->
	<div class="tituloperfil">
		<!-- Nombre de Utilizador -->
		<h1><?php echo $campo['nombre_usuario'];?> <?php echo $campo['apellido_usuario'];?></h1>
		<div class="bigbriefing">
			<!-- Briefing do Candidato -->
			<p>
                <b>Ciudad:</b>Tacna <b>|</b>
				<b>Direccion:</b><?php echo $campo['direccion_usuario'];?> <b>
			
			</p>
		</div>
		
	</div><br/>

	<div class="infocandidato">
		<form method="POST" action="form_editar_perfil.php" class="mui-form">

			<h1 class="title-2">Sobre el Usuario</h1>
            <div class="bigbriefing">
			<!-- Briefing do Candidato -->
			<p>
				<b><?php echo $campo['descripcion_usuario'];?></b>
			
			</p>
		    </div>
			<h1 class="title-2">Informacion del Usuario</h1>

		
            <div class="bigbriefing">
			<!-- Briefing do Candidato -->
			<p>
                 <b>Nombre: </b> <b><?php echo $campo['nombre_usuario'];?> <?php echo $campo['apellido_usuario'];?></b> <br>
				<b>Telefono: </b> <b><?php echo $campo['telefono_usuario'];?> </b> <br>
                <b>Correo: </b><?php echo $campo['correo_usuario'];?><b></b>
			
			</p>
		    </div>
		
		

            <center>
			<button class="mui-btn mui-btn--raised">Editar Perfil</button>
            </center>
		</form>
	</div>

	<br/><br/>
	<?php } mysqli_close($link); ?>
</div>


<?php include('footer.php');?>