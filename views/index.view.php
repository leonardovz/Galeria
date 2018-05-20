<?php 
session_start();
if ($_SESSION['type']) {
    require 'headermin.view.php';
}else {
    require 'header.php'; 
}
?>

    <section class="main">
    <?php if (!$_SESSION['type']): ?>
        <section class="acerca-de" id="acerca-de">
            <div class="contenedor">
                <div class="foto">
                    <img src="img/acerca-de.jpg" alt="">
                </div>
                <article> 
                    <h3>Acerca de</h3>
                    <p>Aqui podras encontrar las mejores imagenes.</p>
                    <br>
                    <p>Gracias a esta tecnologia podremos compartir nuestras fotografias con amigos familiares y otras personas! te invitamos a ingresar al Sitio y compartir nuestros posts</p>
                </article>
            </div>
        </section>
        
        <section class="Busqueda" id="Busqueda">
                <h3 class="titulo">Publicaciones</h3>
                <!-- <div class="Buscar">
                    <input type="text" placeholder="Buscar"><i><img src="img/search.png" alt=""></i>
                </div> -->
        </section>
    <?php endif; ?> 
    
        <section class="galeria" id="galeria">
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
                
                <img src ="imagenes/<?php echo $post[5];?>" alt="">

                <div class="abajo">
                    <p class="descripcion"><?php
                    for ($i=0; $i < 42; $i++) { 
                        echo $post['texto'][$i];
                    } echo '...'; ?>
                   </p>
                    <?php if ($_SESSION['id']!=$post[6] || isset($_SESSION['type'])): ?>
                    <a href="vista.php?id=<?php echo $post[0];?>">Ver publicación</a>
                    <?php endif;?>
                    
                    <?php if ($_SESSION['id']!=$post[6]&& !isset($_SESSION['type'])): ?> 
                    <p class="descripcion"><a href="#">Necesitas estar Registrado si quieres Ver las Publicaciones</a></p>
                    <?php endif;?>
                </div>
            </div>
            <?php endforeach; ?>
        </section>
    </section>
    <!-- HOla aqui esta la paginacion -->
    <?php 
        $totalArticulos = $conexion->query('SELECT count(*) FROM articulos;');
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

<?php require 'footer.php'; ?>