d<?php 
session_start();
require 'admin/config.php';
require 'funciones.php';
$idImagen =$_POST['id'];
$iduser = $_SESSION['id'];

$conexion = conexion($bd_config);
if (!$conexion) {
    header('Location: error.php');
}   

if($idImagen>0){
    $identificador=$_POST['id'];
    $sql = "DELETE FROM articulos WHERE id = '$identificador' AND iduser = $iduser";
    echo $sql;
	$stmt = $conexion->prepare($sql);
	$stmt->execute();
    header('Location: perfil.php');
}
else header('Location:index.php');
?>