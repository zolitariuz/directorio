<?php if(isset($usuario)) { ?>

<div class="main">
	<a href="<?php echo base_url().'index.php/gestor_contenidos/panel_admin/' ?>" class="margin-bottom">Regresar a panel de administración</a>
	<div class="width">
		<div class="full">
			<?php 
				if(isset($success)){
					echo '<p class="success">'.$success.'</p>';
				} else if(isset($error)){
					echo '<p class="error">'.$error.'</p>';
				}
			?>
			<form method="POST" action="<?php echo base_url().'index.php/gestor_contenidos/agregar_usuario' ?>" class="columna xmall-12 center crea-aviso">
				<fieldset class="columna xmall-6">
					<label for="usuario" >Nombre de usuario</label>
					<input type="text" name="usuario" class="columna xmall-12">
				</fieldset>
				<fieldset class="columna xmall-6">
					<label for="password" >Contraseña</label>
					<input type="text" name="password" class="columna xmall-12">
				</fieldset>
				<fieldset class="columna xmall-6">
					<label for="nombre" >Nombre</label>
					<input type="text" name="nombre" class="columna xmall-12">
				</fieldset>
				<fieldset class="columna xmall-6">
					<label for="apellidos" >Apellidos</label>
					<input type="text" name="apellidos" class="columna xmall-12">
				</fieldset>
				<fieldset class="columna xmall-6 url_aviso"> 
					<label for="nombre" >Tipo de usuario</label>
					<select name="rol" class="columna xmall-12">
						<option value="admin">Administrador</option>
						<option value="editor">Editor</option>
					</select>
				</fieldset>
				<fieldset class="columna xmall-10 center"> 
					<input type="hidden" name="id_usuario" value="<?php echo $usuario['id_usuario'] ?>">
					<input type="submit" value="Agregar usuario" class="columna xmall-3 block center boton">
				</fieldset>
			</form>
		</div>
	</div>
</div>

<?php } else { header('Location: '.base_url().'index.php/login'); } ?>