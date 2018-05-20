<?php 

require 'admin/config.php';
require 'funciones.php';

$conexion = conexion($bd_config);
if (!$conexion) {
    header('Location: error.php');
}   
session_start();
if($_SESSION['type']==2){
    if($_POST['id']>0){
        $_SESSION['id']=$_POST['id'];
        $datos=obtener_datos_usuario($_SESSION['id'], $conexion);
        $_SESSION['dato_usuario']=$datos[0]['nameU'];
        $_SESSION['dato_nombre']=$datos[0]['Nombres'];
        $_SESSION['dato_apellidos']=$datos[0]['Apellidos'];
        $_SESSION['dato_tipo']=$datos[0]['tipoUser'];
    }else echo '<script language="javascript">alert("Las contraseñas no coinciden");</script>';
    if($_SESSION['id']>0){
        $posts = obtener_post($galeria_config['post_por_pagina'], $conexion);

        if (!$posts) {
            header('Location: error.php');
        }

        require 'views/modificar.view.php';


    }else header('Location:index.php');
}

?>