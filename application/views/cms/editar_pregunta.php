<?php //if(isset($usuario)) { ?>

<div class="main">
	<div class="width">
		
		<a href="<?php echo base_url().'index.php/gestor_contenidos/panel_admin/' ?>">Regresar a panel de administración</a>
	
		<div class="full">
			<?php 
				if(isset($success)){
					echo '<p class="success">'.$success.'</p>';
				} else if(isset($error)){
					echo '<p class="error">'.$error.'</p>';
				}
			?>
			<div class="editar-preguntas" class="columna xmall-12">
				<h3>Editar pregunta con id: <?php echo $pregunta['id_pregunta']; ?></h3>
				
				<form method="POST" action="<?php echo base_url().'index.php/gestor_contenidos/editar_pregunta/'.$pregunta['id_pregunta']; ?>" class="columna xmall-12">
				<fieldset class="columna xmall-12"> 
					<label for="pregunta" >Pregunta</label>
					<input type="text" name="pregunta" value="<?php echo $pregunta['pregunta']; ?>" class="columna xmall-12">
				</fieldset>
				<fieldset class="columna xmall-12 center"> 
					<label for="vigencia" >Vigencia</label>
					<input type="text" name="vigencia" class="datepicker columna xmall-12" value="<?php echo $pregunta['vigencia']; ?>">
				</fieldset>
				<fieldset class="columna xmall-12"> 
					<label for="activo" >¿Está activo?</label><br />
					<?php if ($pregunta['activo'] == 't') { ?>
						<input type="checkbox" name="activo" checked>
					<?php } else { ?>
						<input type="checkbox" name="activo">
					<?php } ?>
				</fieldset>
				<input type="hidden" name="id_usuario" value="<?php echo $pregunta['id_usuario']; ?>">
				<input type="submit" value="Modificar pregunta">
			</form>
				
			</div>
		</div>
	</div>
</div>

<?php  //} else { header('Location: '.base_url().'index.php/login'); } ?>