<div class="main">
	<div class="modal-wrapper">
		<div class="modal">
			<div class="modal-content">
				<h1 class="block columna xmall-12">
					<a href="<?php echo base_url() ?>">
						<img class="img-full" src="<?php echo base_url() ?>assets/img/logo-tramites.png" alt="">
					</a>
				</h1>

				<?php
				// Mostrar error en caso de credenciales inválidas
				// o campos vacíos
				if (!is_null($error)) {
					echo '<p class="margin-bottom">'.$error.'</p>';
				}

				?>
				<form action="" method="POST" class="js-login-form">
					<label for="usuario" class="block text-center highlight">Usuario</label>
					<input type="text" name="usuario" class="full margin-bottom" required autofocus>
					<label for="usuario" class="block text-center highlight">Contraseña</label>
					<input type="password" name="password" class="full margin-bottom" required>
					<button class="block boton chico center" type="submit">entrar</button>
				</form>
			</div>
		</div>
	</div>
</div>