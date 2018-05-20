<?php 

require 'admin/config.php';
require 'funciones.php';    
    
$conexion = conexion($bd_config);

if (!$conexion) {
    header('Location: error.php');
}

session_start();
if(!$_SESSION['type']){//verifica si ya inició sesion
    //utiliza el metodo post para lllamarse a si misma e iniciar sesión
    $name=$_POST['nameU'];
    $pass=$_POST['pass'];
    if(!(is_null($name) || is_null($pass))){ //ver si son nullos
        $verificar=password_verify($pass, obtener_pass($name,$conexion));   //verifica la contraseña     
        if($verificar==1){
            $_SESSION['user'] = $name;
            $_SESSION['name'] = obtener_nombre($name,$conexion);
            $_SESSION['type'] = obtener_tipo($name,$conexion);
            $_SESSION['id']   = obtener_usuarioid($name,$conexion);
            header('Location: index.php');
        }else echo '<script language="javascript">alert("Usuario o contraseña incorrecta");</script>';//falta un mensaje de que es incorrecto

    }

    $posts = obtener_post($galeria_config['post_por_pagina'], $conexion);

    // if (!$posts) {
    //     header('Location: error.php');
    // }

    require 'views/login.view.php';
    
}else header('Location: index.php');
?>