<?php require 'headermin.view.php'; ?>

<?php if($_SESSION['id']):?>
<main>
	<div class="contenedor">
		<h2 class="blanco">Modificar publicación</h2>
		<?php foreach($posts as $post): ?> 
		<form action="editarPubBd.php" method="post" enctype="multipart/form-data" class="formulario" id="formulario" name="formulario">
			<div class="contenedor-inputs">
				<input type="hidden" name="id" value="<?php echo $post[0]?>">

				<input type="text" name="titulo" placeholder="Titulo de la imagen" value = "<?php echo $post['titulo'];?>" required>

                <input type="text" name="TipoPub" placeholder="Tipo de Publicación" value = "<?php echo $post['TipoPub'];?>" required>

                <input type="file" name="thumb">
				
				<input type="hidden" name="thumb-guardada" value="<?php echo $post['thumb']; ?>">

                <textarea name="texto" placeholder="Descripción de la imagen" required><?php echo $post['texto']; ?></textarea>

			</div>
			<input type="submit" class="btn" value="Modificar">
		</form>
		<?php endforeach; ?> 
	</div>
</main>
<?php endif;?>

<?php if($_SESSION['id']):?>

<?php endif;?>

<?php require 'footer.php'; ?>