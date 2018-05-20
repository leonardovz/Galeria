<?php session_start();
$hoy = date_default_timezone_set('America/Mexico_City');

require 'admin/config.php';
require 'funciones.php';

$conexion = conexion($bd_config);
if (!$conexion) {
	header('Location: ../error.php');
}

session_start();
if($_SESSION['type']>0){
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$titulo = $_POST['titulo'];
	$TipoPub = $_POST['TipoPub'];
	$texto = $_POST['texto'];
	$thumb = $_FILES['thumb']['name'];
	$iduser = $_SESSION['id'];
	$date = date('Y-m-d');

	$archivo_subido = $galeria_config['carpeta_imagenes'] . $_FILES['thumb']['name'];
	move_uploaded_file($_FILES['thumb']['tmp_name'], $archivo_subido);

	$subir = "INSERT INTO `articulos`(`titulo`, `TipoPub`, `fecha`, `texto`, `thumb`, `iduser`) VALUES ('$titulo','$TipoPub','$date','$texto','$thumb','$iduser');";

	$statement = $conexion->prepare($subir);

	$statement->execute();
	$statement-> fetchall();
	echo '<script language="javascript">alert("Publicacion Correctamente Creada");</script>';
	header('Location: perfil.php');
}

require 'views/publicar.view.php';
}else header('Location: index.php');
?>