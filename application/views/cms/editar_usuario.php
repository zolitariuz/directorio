<?php if(isset($_SESSION['id_usuario'])) { ?>
<div class="main">
	<div class="width">
		<div class="columna xmall-6 center">
			<?php
				if(isset($success)){
					echo '<p class="success">'.$success.'</p>';
				} else if(isset($error)){
					echo '<p class="error">'.$error.'</p>';
				}
			?>

			<form class="crea-aviso js-validate" method="POST" action="<?php echo base_url().'index.php/gestor_contenidos/editar_usuario' ?>">
				<fieldset class="">
					<label class="block" for="usuario" >Nombre de usuario</label>
					<input type="text" name="usuario" class=" columna xmall-12" value="<?php echo trim($usuario['usuario']) ?>">
				</fieldset>
				<fieldset class="">
					<label class="block" for="nombre" >Nombre</label>
					<input type="text" name="nombre" class=" columna xmall-12" value="<?php echo trim($usuario['nombre']) ?>">
				</fieldset>
				<fieldset class="">
					<label class="block" for="apellidos" >Apellidos</label>
					<input type="text" name="apellidos" class=" columna xmall-12" value="<?php echo trim($usuario['apellidos']) ?>">
				</fieldset>
				<fieldset class="">
					<label class="block" for="password" >Password</label>
					<input type="password" name="password" class=" columna xmall-12" value="<?php echo trim($usuario['password']) ?>">
				</fieldset>
				<fieldset class="url_aviso">
					<label class="block" for="nombre" >Tipo de usuario</label>
					<select name="rol" class=" columna xmall-12">
						<option value="admin" <?php echo ($usuario['is_admin'] == 't') ? 'selected' : ''; ?>>Administrador</option>
						<option value="editor" <?php echo ($usuario['is_admin'] == 'f') ? 'selected' : ''; ?>>Editor</option>
					</select>
				</fieldset>
				<fieldset class="">
					<input type="hidden" name="id_usuario" value="<?php echo $usuario['id_usuario'] ?>">
					<button type="submit" class="block boton chico right">Editar usuario</button>
				</fieldset>
			</form>
		</div><!-- columna xmall-6 center -->
	</div>
</div>

<?php } else { header('Location: '.base_url().'index.php/login'); } ?>