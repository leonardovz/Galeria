<?php
session_start();
if(isset($_SESSION['type'])){
    unset($_SESSION['type']);
    unset($_SESSION['user']);
    unset($_SESSION['name']);
    unset($_SESSION['id']);
    unset($_SESSION['dato_usuario']);
    unset($_SESSION['dato_nombre']);
    unset($_SESSION['dato_apellidos']);
    unset($_SESSION['dato_tipo']);
}
header('Location: index.php');
?>