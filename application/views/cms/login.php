<div class="main">
	<?php 
	// Mostrar error en caso de credenciales inválidas 
	// o campos vacíos
	if ($this->form_validation->run()) {
		echo '<div class="error">'.$error.'</div>';
	} else {
		echo validation_errors();
	}
	?>
	<div class="width">
		<form action="" method="POST" class="columna xmall-6 block center"> 
			<label for="usuario" class="columna xmall-12">Usuario</label>
			<input type="text" name="usuario" class="columna xmall-12">
			<label for="usuario" class="columna xmall-12">Contraseña</label>
			<input type="password" name="password" class="columna xmall-12 margin-bottom">
			<input type="submit" value="Entrar" class="columna xmall-3 block center boton">
		</form>
	</div>
</div>