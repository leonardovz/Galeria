<? require 'headermin.view.php'; ?>
<div class="main">
    <div class="perfiles">
        <div class="textos">
            <h1 class="perfil">Bienvenido</h1>
            <h3 class = "nombre"><?php session_start();
                echo $_SESSION['name'];?></h3>
        </div>
        <div class="Sesiones">
            <a href="publicar.php" class= "sesion">Crear Publicación</a>
        </div>
    </div>

    <div class="main">
        <h2>Publicaciones</h2>
        <section class="galeria" id="galeria">
        <?php if($posts): ?>
            <?php foreach($posts as $post): ?>
            <div class="foto">
                <div class="arriba">
                    <h3 class ="titulo"><?php echo $post[1];?></h3>
                    <h4 class = "fecha"><?php echo $post[3];?></h4>
                    <p class ="autor">
                    <?php
                        $conexion = conexion($bd_config);
                        $sentencia = $conexion->prepare("SELECT Nombres, Apellidos FROM userssis WHERE id = $post[6]");
                        $sentencia->execute();
                        $Variables = $sentencia->fetchAll();
                        echo $Variables[0][0] . ' '. $Variables[0][1];
                    ?></p>
                </div>
                <a href="vista.php?id=<?php echo $post[0];?>"><img src ="imagenes/<?php echo $post[5];?>" alt=""></a>

                <div class="abajo">
                    <p class="descripcion"><?php
                    for ($i=0; $i < 42; $i++) { 
                        echo $post['texto'][$i];
                    } echo '...'; ?>
                   </p>
                   <a href="vista.php?id=<?php echo $post[0];?>">Ver publicación</a>
                </div>
            </div>
            <?php endforeach; ?>
        <?php  endif; ?>
        <?php if(!$posts): ?>
                   <h3>No se Encontro ningun Registro en la base de datos</h3>
        <?php endif; ?>
        </section>
    </section>
    <!-- HOla aqui esta la paginacion -->
    <?php 
        session_start();
        $totalArticulos = $conexion->query("SELECT count(*) FROM articulos WHERE iduser = ".  $_SESSION['id']);
        $totalArticulos= $totalArticulos->fetch();
        $numero_paginas = ceil($totalArticulos[0]/ $galeria_config['post_por_pagina']); 
    ?>
<section class="paginacion">
	<ul>
		<?php if (pagina_actual() === 1): ?>
			<li class="disabled">&laquo;</li>
		<?php else: ?>
			<li><a href="index.php?p=<?php echo pagina_actual() - 1 ?>">&laquo;</a></li>
		<?php endif; ?>

		<?php for($i = 1; $i <= $numero_paginas; $i++): ?>
			<?php if (pagina_actual() === $i): ?>
				<li class="active">
					<?php echo $i; ?>
				</li>
			<?php else: ?>
				<li><a href="index.php?p=<?php echo $i; ?>"><?php echo $i; ?></a></li>
			<?php endif; ?>

		<?php endfor; ?>

		<?php if(pagina_actual() == $numero_paginas): ?>
			<li class="disabled">&raquo;</li>
		<?php else: ?>
			<li><a href="index.php?p=<?php echo pagina_actual() + 1; ?>">&raquo;</a></li>
		<?php endif; ?>
	</ul>
</section>
    </div>
</div>
<?php require 'footer.php';?>