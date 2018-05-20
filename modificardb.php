<?php
require 'admin/config.php';
require 'funciones.php';
$conexion = conexion($bd_config);
if (!$conexion) {
    header('Location: error.php');
}


session_start();
if($_SESSION['type']==2 && $_SESSION['id']>0){    
    $idU=$_SESSION['id'];    
    $user=$_SESSION['usuario'];
    $pass=$_POST['pass'];
    $rpass=$_POST['rpass'];
    $pass_hash=password_hash($pass, PASSWORD_BCRYPT);
    $Nombres=$_POST['nombre'];
    $Apellidos=$_POST['apellidos'];
    $tipoUser=$_POST['nivel'];
    if(!(is_null($idU) || is_null($user) || is_null($Nombres) || is_null($Apellidos) || is_null($pass) || is_null($rpass))){  
        if($pass===$rpass){
            $sql = "UPDATE userssis SET password='$pass_hash', Nombres='$Nombres', Apellidos='$Apellidos', tipoUser='$tipoUser' WHERE id='$idU'";
            $stmt = $conexion->prepare($sql);
            $stmt->execute(); 
            $_SESSION['id']=0;
            header('Location: adminusuarios.php');
        }else header('Location: modificar.php');
    }else header('Location: modificar.php');
}
?>