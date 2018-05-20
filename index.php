<?php 
require 'admin/config.php';
require 'funciones.php';

session_start();
    $conexion = conexion($bd_config);
    if (!$conexion) {
        header('Location: error.php');
    }

    $posts = obtener_post($galeria_config['post_por_pagina'], $conexion);

    // if (!$posts) {
    //     header('Location: error.php');
    // }

require 'views/index.view.php';

?>