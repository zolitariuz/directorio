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
			<div class="editar-avisos" class="columna xmall-12">
				<h3>Editar aviso con id: <?php echo $aviso['id_aviso']; ?></h3>
				
				<form method="POST" action="<?php echo base_url().'index.php/gestor_contenidos/editar_aviso/'.$aviso['id_aviso']; ?>" class="columna xmall-12">
				<fieldset class="columna xmall-12">
					<label for="aviso" >Contenido aviso (máximo 140 caracteres)</label>
					<textarea type="text" name="aviso" class="columna xmall-12"><?php echo $aviso['contenido']; ?></textarea>
				</fieldset>
				<fieldset class="columna xmall-12 center"> 
					<label for="vigencia" >Vigencia</label>
					<input type="text" name="vigencia" class="datepicker columna xmall-12" value="<?php echo $aviso['vigencia']; ?>">
				</fieldset>
				<fieldset class="columna xmall-12"> 
					<label for="url_aviso" >URL de aviso</label><br />
					<input type="text" name="url_aviso" value="<?php echo $aviso['url']; ?>">
				</fieldset>
				<fieldset class="columna xmall-12"> 
					<label for="activo" >¿Está activo?</label><br />
					<?php if ($aviso['activo'] == 't') { ?>
						<input type="checkbox" name="activo" checked>
					<?php } else { ?>
						<input type="checkbox" name="activo">
					<?php } ?>
				</fieldset>
				<input type="hidden" name="id_usuario" value="<?php echo $aviso['id_usuario'] ?>">
				<input type="submit" value="Modificar aviso">
			</form>
				
			</div>
		</div>
	</div>
</div>

<?php // } else { header('Location: '.base_url().'index.php/login'); } ?>