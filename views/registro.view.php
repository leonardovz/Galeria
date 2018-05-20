<?php require 'headermin.view.php'; ?>


<main>
	<div class="contenedor">
		<h2 class="blanco">Registro</h2>
		<form action="registro.php" method="post" class="formulario" id="formulario" name="formulario">
			<div class="contenedor-inputs">
				<input type="text" name="nameU" placeholder="Nombre de Usuario Unico" required>

				<input type="text" name="nombre" placeholder="Ingresa Tu nombre" required>
				
				<input type="text" name="apellidos" placeholder="Apellidos" required>
				
				<input type="password" name="pass" placeholder="Contraseña" required>

				<input type="password" name="rpass" placeholder="Reescribe la contraseña" required>
				
				<select name="nivel" id="nivel">
					<option value="admin">Administrador</option>
					<option value="user">Usuario</option>
				</select>
			</div>
			<input type="submit" class="btn" value="Registrar">
		</form>
	</div>
</main>


<?php require 'footer.php'; ?>