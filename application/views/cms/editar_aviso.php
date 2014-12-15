<?php //if(isset($usuario)) { ?>

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
			<div class="editar-avisos" class="columna xmall-12">
				<h3 class="text-center margin-bottom">Editar aviso con id: <?php echo $aviso['id_aviso']; ?></h3>
				<form method="POST" action="<?php echo base_url().'index.php/gestor_contenidos/editar_aviso/'.$aviso['id_aviso']; ?>" class="[ js-validate-aviso ]">
					<fieldset class="">
						<label for="aviso" >Contenido aviso (máximo 140 caracteres)</label>
						<textarea type="text" name="aviso" class="[ full ]"><?php echo $aviso['contenido']; ?></textarea>
					</fieldset>
					<fieldset class="">
						<label for="fecha_inicial" >Fecha inicial</label>
						<input type="text" name="fecha_inicial" class="datepicker [ full ]" value="<?php echo $aviso['fecha_inicial']; ?>">
					</fieldset>
					<fieldset class="">
						<label for="fecha_final" >Fecha final</label>
						<input type="text" name="fecha_final" class="datepicker [ full ]" value="<?php echo $aviso['fecha_final']; ?>">
					</fieldset>
					<fieldset class="">
						<label for="url_aviso" >URL de aviso</label><br />
						<input class="[ full ]" type="text" name="url_aviso" value="<?php echo $aviso['url']; ?>">
					</fieldset>
					<fieldset class="">
						<label for="activo" >¿Está activo?</label><br />
						<?php if ($aviso['activo'] == 't') { ?>
							<input type="checkbox" name="activo" checked>
						<?php } else { ?>
							<input type="checkbox" name="activo">
						<?php } ?>
						Sí
					</fieldset>
					<input type="hidden" name="id_usuario" value="<?php echo $aviso['id_usuario'] ?>">
					<div class="[ text-center ]">
						<button type="submit">Modificar aviso</button>
					</div><!-- .text-center -->

				</form>
			</div>
		</div>
	</div>
</div>

<?php // } else { header('Location: '.base_url().'index.php/login'); } ?>
