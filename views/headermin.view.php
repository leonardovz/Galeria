<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i" rel="stylesheet">
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>Galeria</title>
</head>
<body>
    <span id="arriba" class="Tope">
        <img src="img/3.jpg" class="imgcircle" > 
    </span>
    <header>
		<nav class="navbar-default">
			<div class="container-fluid">

				<!-- Encabezado de nuestro Menu -->
				<div class="navbar-header" >
					<a href="index.php" class="navbar-brand">Publica Tu foto</a>

					<!-- Boton hamburguesa, solo visible en dispositivos moviles -->
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#btn-colapsar">
						<span class="sr-only">Navegacion</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
				</div>

				<!-- Elementos del Menu -->
				<!-- Links y formulario -->
				<div class="collapse navbar-collapse" id="btn-colapsar">
					<ul class="nav navbar-nav">
						<li><a href="perfil.php">Mi perfil</a></li>
						<li><a href="publicar.php">Publicar</a></li>
					</ul>

					<!-- Formulario de Busqueda -->
					<!-- <form class="navbar-form navbar-nav" action="buscar.php" role="search">
						<div class="form-group">
							<input type="text" class="form-control" placeholder="Buscar">
							<button type="submit" class="btn btn-default">Buscar</button>
                        </div>
                    </form> -->
                    <ul class="nav navbar-nav navbar-right">
						<li><a href="perfil.php"><?php session_start(); echo $_SESSION['user'].", ".tipo_sesion($_SESSION['type'])?></a></li>
						<li>
							<a href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="img/user.png" style="width: 20px;"><span class="caret"></span></a>
							<ul class="dropdown-menu">
								<li><a href="perfil.php">Perfil</a></li>
								<?php if ($_SESSION['type']==2): ?>
								<li><a href="registro.php">Agregar Usuario</a></li>
								<li><a href="adminusuarios.php">Modificar Usuario</a></li>
								<?php endif;?>
								<li><a href="cerrarSesion.php">Cerrar Sesion</a></li>
							</ul>
						</li>
                    </ul>
                    
				</div>
			</div>	
		</nav>
	</header>