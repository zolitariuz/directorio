<?php //if(isset($usuario)) { ?>

<div class="main">
	<div class="width">
		
		<a href="<?php echo base_url().'index.php/gestor_contenidos/panel_admin/'.$usuario["id_usuario"]; ?>">Regresar a panel de administración</a>
	
		<div class="full">
			<?php 
				if(isset($success)){
					echo '<p class="success">'.$success.'</p>';
				}
			?>
			<div class="editar-anuncios" class="columna xmall-12">
				<h3>Editar anuncio con id: <?php echo $aviso['id_aviso']; ?></h3>
				
				<form method="POST" action="<?php echo base_url().'index.php/gestor_contenidos/editar_anuncio' ?>" class="columna xmall-12">
					<fieldset class="columna xmall-12">
						<label for="anuncio" >Contenido slider</label>
						<textarea type="text" name="anuncio" class="columna xmall-12"><?php echo $anuncio['contenido']; ?></textarea>
					</fieldset>
					<fieldset class="columna xmall-12"> 
						<label for="tipo" >Tipo contenido</label>
						<input type="text" name="tipo" value="<?php echo $anuncio['tipo_contenido']; ?>">
					</fieldset>
					<fieldset class="columna xmall-12"> 
						<label for="url_anuncio" >URL</label>
						<input type="text" name="url_anuncio" value="<?php echo $anuncio['url']; ?>">
					</fieldset>
					<fieldset class="columna xmall-12"> 
						<label for="url_img" >URL de img</label>
						<input type="text" name="url_img" value="<?php echo $anuncio['url_img']; ?>">
					</fieldset>
					<fieldset class="columna xmall-12"> 
						<label for="url_img" >Imagen</label>
						<img src="<?php echo base_url().substr($anuncio['url_img'], 1, strlen($anuncio['url_img'])); ?>">
					</fieldset>
					<input type="hidden" name="id_usuario" value="<?php echo $anuncio['id_usuario'] ?>">
					<input type="submit" value="Modificar anuncio">
				</form>
				
			</div>
		</div>
	</div>
</div>

<?php // } else { header('Location: '.base_url().'index.php/login'); } ?>