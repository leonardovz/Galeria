<?php require 'headermin.view.php'; session_start();?>


<main>
	<div class="contenedor">
		<h2 class="blanco">Modificar</h2>
		<form action="modificardb.php" method="post" class="formulario" id="formulario" name="formulario">
			<div class="contenedor-inputs">
				<input type="text" name="nameU" placeholder="Nombre de Usuario Unico" required value="<?php echo $_SESSION['dato_usuario'];?>" readonly="readonly">

				<input type="text" name="nombre" value="<?php echo $_SESSION['dato_nombre'];?>" placeholder="Ingresa Tu nombre" required>
				
				<input type="text" name="apellidos" value="<?php echo $_SESSION['dato_apellidos'];?>" placeholder="Apellidos" required>
				
				<input type="password" name="pass" value="" placeholder="Contraseña" required>

				<input type="password" name="rpass" placeholder="Reescribe la contraseña" required>
				
				<select name="nivel" id="nivel">
					<option value="admin" <?php if($_SESSION['dato_tipo']=="admin") echo "selected"?>>Administrador</option>
					<option value="user" <?php if($_SESSION['dato_tipo']=="user") echo "selected"?>>Usuario</option>
				</select>
			</div>
			<input type="submit" class="btn" value="Modificar">
			<a href="adminusuarios.php" class="btn">Cancelar</a>
		</form>
	</div>
</main>


<?php require 'footer.php'; ?>