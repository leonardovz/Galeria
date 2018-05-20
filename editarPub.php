<?php 
session_start();

require 'admin/config.php';
require 'funciones.php';
if(isset($_SESSION['type'])){
$id= $_POST['id'];
$conexion = conexion($bd_config);
if (!$conexion) {
	header('Location: error.php');
}

$posts = obtener_post_por_id($conexion, $id);

if (!$posts) {
	header('Location: error.php');
}

require 'views/editarPub.view.php';
}else header('Location: index.php');
?>