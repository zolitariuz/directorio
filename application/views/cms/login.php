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
		<form action="" method="POST"> 
			<label for="usuario">Usuario</label>
			<input type="text" name="usuario">
			<label for="usuario">Contraseña</label>
			<input type="password" name="password">
			<input type="submit" value="Entrar">
		</form>

	</div>
</div>