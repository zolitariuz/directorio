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
			<div class="editar-preguntas" class="columna xmall-12">
				<h3 class="text-center margin-bottom">Editar pregunta con id: <?php echo $pregunta['id_pregunta']; ?></h3>
				<form method="POST" action="<?php echo base_url().'index.php/gestor_contenidos/editar_pregunta/'.$pregunta['id_pregunta']; ?>" class="[ js-validate-pregunta ]">
					<fieldset class="">
						<label for="pregunta" >Pregunta</label>
						<input type="text" name="pregunta" value="<?php echo $pregunta['pregunta']; ?>" class="columna xmall-12">
					</fieldset>
					<fieldset class="">
						<label for="fecha_inicial" >Fecha inicial</label>
						<input type="text" name="fecha_inicial" class="datepicker columna xmall-12" value="<?php echo $pregunta['fecha_inicial']; ?>">
					</fieldset>
					<fieldset class="">
						<label for="fecha_final" >Fecha final</label>
						<input type="text" name="fecha_final" class="datepicker columna xmall-12" value="<?php echo $pregunta['fecha_final']; ?>">
					</fieldset>
					<fieldset class="">
						<label for="activo" >¿Está activo?</label><br />
						<?php if ($pregunta['activo'] == 't') { ?>
							<input type="checkbox" name="activo" checked>
						<?php } else { ?>
							<input type="checkbox" name="activo">
						<?php } ?>
						Sí
					</fieldset>
					<input type="hidden" name="id_usuario" value="<?php echo $pregunta['id_usuario']; ?>">
					<div class="[ text-center ]">
						<button type="submit">Modificar pregunta</button>
					</div><!-- .text-center -->
				</form>
			</div>
		</div>
	</div>
</div>

<?php  } else { header('Location: '.base_url().'index.php/login'); } ?>
