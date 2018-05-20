<?php 

require 'admin/config.php';
require 'funciones.php';

session_start();
if($_SESSION['type']==2){

    $conexion = conexion($bd_config);
    if (!$conexion) {
        header('Location: error.php');
    }
    
    
    
    $usuario=$_POST['nameU'];
    $nombre=$_POST['nombre'];
    $apellidos=$_POST['apellidos'];
    $pass=$_POST['pass'];
    $rpass=$_POST['rpass'];
    $tipo=$_POST['nivel'];
    //nuevo usuario
    if(!(is_null($usuario) || is_null($nombre) || is_null($apellidos) || is_null($pass) || is_null($rpass))){ //validar que no son nullos
        if($pass===$rpass){
            guardar_usuario($usuario, $nombre, $apellidos, password_hash($pass, PASSWORD_BCRYPT), $tipo, $conexion);
            //echo '<script language="javascript">alert("Usuario '.$usuario.' registrado exitosamente");</script>';
        }else echo '<script language="javascript">alert("Las contraseñas no coinciden");</script>';//falta un mensaje de que es incorrecto
    }

    
    
    $posts = obtener_post($galeria_config['post_por_pagina'], $conexion);

    if (!$posts) {
        header('Location: error.php');
    }

    require 'views/registro.view.php';
    
}else header('Location: index.php');

?>