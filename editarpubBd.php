<?php session_start();
require 'admin/config.php';
require 'funciones.php';
$conexion = conexion($bd_config);
if (!$conexion) {
    header('Location: error.php');
}
if (isset($_POST)) {

    $idserch = $_POST['id'];
	$titulo = $_POST['titulo'];
	$TipoPub = $_POST['TipoPub'];
	$texto = $_POST['texto'];
    $iduser = $_SESSION['id'];
    
	$thumb_guardada = $_POST['thumb-guardada'];
	$thumb = $_FILES['thumb'];

	if (empty($thumb['name'])) {
		$thumb = $thumb_guardada;
	} else {
		$archivo_subido = '../' . $blog_config['carpeta_imagenes'] . $_FILES['thumb']['name'];
		move_uploaded_file($_FILES['thumb']['tmp_name'], $archivo_subido);
		$thumb = $_FILES['thumb']['name'];
	}

	
    $subir = "UPDATE `articulos` SET `titulo`='$titulo',`TipoPub`='$TipoPub',`texto`='$texto',`thumb`='$thumb',`iduser`='$iduser' WHERE id = '$idserch'";
    echo $iduser;
	$statement = $conexion->prepare($subir);

	$statement->execute();
	$statement-> fetchall();

	header('Location: perfil.php');
} 
?>