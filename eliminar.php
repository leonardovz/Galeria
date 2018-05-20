<?php 

require 'admin/config.php';
require 'funciones.php';

$conexion = conexion($bd_config);
if (!$conexion) {
    header('Location: error.php');
}   

session_start();
if($_POST['id']>0){
    $nombreUser=obtener_usuarioid($_SESSION['user'], $conexion);
    if($_POST['id']!=$nombreUser){
        $identificador=$_POST['id'];
        $sql = "DELETE FROM userssis WHERE id = '$identificador'";
        $stmt = $conexion->prepare($sql);
        $stmt->execute();        
        header('Location: adminusuarios.php');
    }else header('Location: adminusuarios.php?val=1');
}else header('Location:index.php');

?>