<?php 

require 'admin/config.php';
require 'funciones.php';

session_start();
if($_SESSION['type']==2){
    if($_GET['val']==1){
        echo '<script language="javascript">alert("No puedes eliminarte a ti mismo");</script>';
    }

    $conexion = conexion($bd_config);
    if (!$conexion) {
        header('Location: error.php');
    }

    $posts = obtener_post($galeria_config['post_por_pagina'], $conexion);

    if (!$posts) {
        header('Location: error.php');
    }

    require 'views/adminUsuarios.view.php';
}else header('Location: index.php');

?>