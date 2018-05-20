<?php 

function conexion($bd_config){
	try {
		$conexion = new PDO('mysql:host=localhost;dbname='.$bd_config['basedatos'], $bd_config['usuario'], $bd_config['pass']);
		return $conexion;
	} catch (PDOException $e) {
		return false;
	}
}

function limpiarDatos($datos){
	$datos = trim($datos);
	$datos = stripslashes($datos);
	$datos = htmlspecialchars($datos);
	return $datos;
}

function pagina_actual(){
	return isset($_GET['p']) ? (int)$_GET['p'] : 1;
}

function obtener_post($post_por_pagina, $conexion){
	$inicio = (pagina_actual() > 1) ? pagina_actual() * $post_por_pagina - $post_por_pagina : 0;
	$sentencia = $conexion->prepare("SELECT SQL_CALC_FOUND_ROWS * FROM articulos LIMIT $inicio, $post_por_pagina");
	$sentencia->execute();
	return $sentencia->fetchAll();
}

function obtener_pass($nombre, $conexion){
    $sentencia = $conexion->prepare("SELECT password FROM userssis WHERE nameU=\"$nombre\"");
    $sentencia->execute();
    if ($fila = $sentencia->fetch()) {  
        return $fila[0];      
    }else return 0;
}

function obtener_tipo($nombre, $conexion){
    $sentencia = $conexion->prepare("SELECT tipoUser FROM userssis WHERE nameU=\"$nombre\"");
    $sentencia->execute();
    if ($fila = $sentencia->fetch()) {  
        if($fila[0]=='user'){
            return 1;
        }else if($fila[0]=='admin')return 2;
    }else return 0;
}

function obtener_nombre($nombre, $conexion){
    $sentencia = $conexion->prepare("SELECT nombres, apellidos FROM userssis WHERE nameU=\"$nombre\"");
    $sentencia->execute();
    if ($fila = $sentencia->fetch()) {        
        return ($fila[0]." ".$fila[1]);
    }else return "null";
}

function obtener_usuario($id, $conexion){
    $sentencia = $conexion->prepare("SELECT nombres FROM userssis WHERE id=".$id);
    $sentencia->execute();
    if ($fila = $sentencia->fetch()) {        
        return ($fila[0]);
    }else return "null";
}

function obtener_nombre_usuario($id, $conexion){
    $sentencia = $conexion->prepare("SELECT nameU FROM userssis WHERE id=".$id);
    $sentencia->execute();
    if ($fila = $sentencia->fetch()) {        
        return ($fila[0]);
    }else return "null";
}


function obtener_usuarios($conexion){
    $statement = $conexion->prepare("SELECT * FROM userssis");
    $statement ->execute();
    return $result = $statement->fetchAll();
}

function obtener_datos_usuario($id, $conexion){
    $statement = $conexion->prepare("SELECT * FROM userssis WHERE id=".$id);
    $statement ->execute();
    return $result = $statement->fetchAll();
}

function tipo_sesion($tipo){
    switch ($tipo){
        case 1:
            return "Usuario";
            break;
        case 2:
            return "Administrador";
            break;
        default:
            return "Anonimo";
            break;
    }
}

function guardar_usuario($usuario, $nombre, $apellidos, $pass, $nivel, $conexion){
    $sentencia = $conexion->prepare("SELECT id FROM userssis WHERE nameU=".$usuario);
    $sentencia->execute();
    if (!$sentencia->fetch()) {       
        $query="INSERT INTO userssis (nameU, password, Nombres, Apellidos, tipoUser) VALUES ('$usuario', '$pass', '$nombre', '$apellidos', '$nivel')";
        $sentencia = $conexion->prepare($query);
        $sentencia -> execute();  
        echo '<script language="javascript">alert("Usuario: '.$usuario.' registrado exitosamente");</script>';

    }else 
    echo '<script language="javascript">alert("El usuario: '.$usuario.' ya existe");</script>';
}

function modificar_usuario($id, $nombre, $apellidos, $pass, $nivel, $conexion){
    echo '<script language="javascript">alert("'.'nommmms);</script>';
    $query="UPDATE userssis SET password=$pass, Nombres=$nombre, Apellidos=$apellidos, tipoUser=$nivel WHERE id=$id";
    echo '<script language="javascript">alert("'.$query.');</script>';
    $sentencia = $conexion->prepare($query);
    $sentencia -> execute();    
}

function numero_paginas($post_por_pagina, $conexion){
	$total_post = $conexion->prepare('SELECT FOUND_ROWS() as total');
	$total_post->execute();
	$total_post = $total_post->fetch()['total'];
	$numero_paginas = ceil($total_post / $post_por_pagina);
	return $numero_paginas;
}

function id_articulo($id){
	return (int)limpiarDatos($id);
}

function obtener_post_por_id($conexion, $id){
	$resultado = $conexion->query("SELECT * FROM articulos WHERE id = $id LIMIT 1");
	$resultado = $resultado->fetchAll();
	return ($resultado) ? $resultado : false;
}
function obtener_post_por_iduser($conexion, $iduser){
	$resultado = $conexion->query("SELECT * FROM articulos WHERE iduser = $iduser");
	$resultado = $resultado->fetchAll();
	return ($resultado) ? $resultado : false;
}
function obtener_usuarioid($id, $conexion){
    $sentencia = $conexion->prepare("SELECT id FROM userssis WHERE nameU='$id'");
    $sentencia->execute();
    if ($fila = $sentencia->fetch()) {        
        return ($fila[0]);
    }else return "null";
}

function fecha($fecha){
	$timestamp = strtotime($fecha);
	$meses = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'];

	$dia = date('d', $timestamp); 
	$mes = date('m', $timestamp) - 1;
	$year = date('Y', $timestamp);

	$fecha = "$dia de " . $meses[$mes] . " del $year";
	return $fecha;
}


?>