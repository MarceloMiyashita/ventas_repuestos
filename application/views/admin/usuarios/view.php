<p><strong>Nombres:</strong> <?php echo $usuario->nombres; ?></p>
<p><strong>Apellidos:</strong> <?php echo $usuario->apellidos; ?></p>
<p><strong>Telefono:</strong> <?php echo $usuario->telefono; ?></p>
<p><strong>Email:</strong> <?php echo $usuario->email; ?></p>
<p><strong>Usuario:</strong> <?php echo $usuario->username; ?></p>
<p><strong>Rol:</strong> <?php echo get_record("roles","id=".$usuario->rol_id)->nombre; ?></p>
<?php if ($usuario->sucursal_id): ?>
	<p><strong>Sucursal:</strong> <?php echo get_record("sucursales","id='$usuario->sucursal_id'")->nombre; ?></p>
	<?php else: ?>
		<p><strong>Sucursal:</strong> General</p>
<?php endif ?>
