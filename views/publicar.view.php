<?php require 'headermin.view.php';?>
<main>
	<div class="contenedor">
		<h2 class="blanco">Publicar</h2>
		<form action="publicar.php" method="post" enctype="multipart/form-data" class="formulario" id="formulario" name="formulario">
			<div class="contenedor-inputs">
			
				<input type="text" name="titulo" placeholder="Titulo de la imagen" required>

                <input type="text" name="TipoPub" placeholder="Tipo de Publicación" required>

                <input type="file" name="thumb"required>

                <textarea name="texto" placeholder="Descripción de la imagen" required></textarea>

			</div>
			<input type="submit" class="btn" value="Publicar">
		</form>
	</div>
</main>

<?php require 'footer.php'; ?>