<?php 

require 'admin/config.php';
require 'funciones.php';

session_start();
if($_SESSION['type']>0){
    
    
    $conexion = conexion($bd_config);
    if (!$conexion) {
        header('Location: error.php');
    }

    $posts = obtener_post_por_iduser($conexion, $_SESSION['id']);

    // if (!$posts) {
    //     header('Location: error.php');
    // }

    require 'views/perfil.view.php';
}else header('Location: index.php');
?>