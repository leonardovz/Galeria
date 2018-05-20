<?php require 'header.php'; ?>

<main>
	<div class="contenedor">
        <h2 class="blanco">Login</h2>
		<form action="login.php" method="POST" class="formulario" id="formulario" name="formulario">
			<div class="contenedor-inputs">
                <input type="text" name="nameU" placeholder="Nombre de Usuario" required>
                
                <input type="password" name="pass" placeholder="Contraseña" required>
			</div>
			<input type="submit" class="btn" value="Iniciar Sesión">
		</form>
		<br>
	</div>
</main>

<?php require 'footer.php';?> 