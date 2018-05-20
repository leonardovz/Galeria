<? require 'headermin.view.php'; ?>

<div class="container">
		<div class="row">
			<div class="col-md-12">
				<table class="table table-hover table-condensed">
					<thead>
						<tr>
							<th>#</th>
							<th>Usuario</th>
							<th>Nombre(s)</th>
							<th>Apellido(s)</th>
							<th>Tipo</th>
							<th>Modificar</th>
							<th>Eliminar</th>
						</tr>
					</thead>
                    <?php $result=obtener_usuarios($conexion); foreach($result as $registro):?>
                    <tr>
                        <th scope="row"><?php echo $registro['id']?></th>
                        <td><?php echo $registro['nameU']?></td>
                        <td><?php echo $registro['Nombres']?></td>
                        <td><?php echo $registro['Apellidos']?></td>
                        <td><?php echo $registro['tipoUser']?></td>
                        <td>                            
                            <form action="modificar.php" method="post">
                                <input name="id" type="hidden" value="<?php echo $registro['id']?>">
                                <input class = "btn btn-danger" type="submit" value="Eliminar">
                            </form>
                        </td>
                        <td>
                            <form action="eliminar.php" method="post">
                                <input name="id" type="hidden" value="<?php echo $registro['id']?>">
                                <input type="submit" value="Eliminar">
                            </form>
                        </td>
                    </tr>
                    <?php endforeach;?>
				</table>
			</div>
		</div>
	</div>

<?php require 'footer.php';?>