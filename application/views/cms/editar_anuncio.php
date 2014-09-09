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
			<div class="editar-anuncios" class="columna xmall-12">
				<h3>Editar anuncio con id: <?php echo $anuncio['id_anuncio']; ?></h3>
				
				<?php 
				$atributos = array('class' => 'columna xmall-12');
				echo form_open_multipart('index.php/gestor_contenidos/editar_anuncio/'.$anuncio['id_anuncio'], $atributos);
				?>
					<fieldset class="columna xmall-12">
						<label for="anuncio" >Contenido slider</label>
						<textarea type="text" name="anuncio" class="columna xmall-12"><?php echo $anuncio['contenido']; ?></textarea>
					</fieldset>
					<fieldset class="columna xmall-12"> 
						<label for="url_anuncio" >URL</label>
						<input type="text" name="url_anuncio" value="<?php echo $anuncio['url']; ?>">
					</fieldset>
					<fieldset class="columna xmall-12 center"> 
						<label for="vigencia" >Vigencia</label>
						<input type="text" name="vigencia" class="datepicker columna xmall-12" value="<?php echo $anuncio['vigencia']; ?>">
					</fieldset>
					<fieldset class="columna xmall-12"> 
						<label for="activo" >¿Está activo?</label><br />
						<?php if ($anuncio['activo'] == 't') { ?>
							<input type="checkbox" name="activo" checked>
						<?php } else { ?>
							<input type="checkbox" name="activo">
						<?php } ?>
					</fieldset>
					<fieldset class="columna xmall-6">
						<p>Restricciones de imagen</p>
						<ul>
							<li>Los formatos permitidos son JPEG y PNG</li>
							<li>El tamaño máximo de la imagen es de 500 KB</li>
							<li>Se recomienda utilizar imágenes de 940 x 420 pixeles</li>
						</ul>
						<input type="file" name="userfile" size="20" />
						<input type="hidden" name="id_usuario" value="<?php echo $anuncio['id_usuario'] ?>">
						
					</fieldset>	
					<fieldset class="columna xmall-6"> 
						<label for="url_img" >Imagen actual: <?php echo $anuncio['url_img']; ?></label>
						<img src="<?php echo base_url().$anuncio['url_img']; ?>" class="columna xmall-12">
					</fieldset>
					<input type="submit" value="Modificar anuncio" class="columna xmall-4 block center boton" />
				</form>
				
			</div>
		</div>
	</div>
</div>

<?php // } else { header('Location: '.base_url().'index.php/login'); } ?>