<?php //if(isset($usuario)) { ?>
<div class="main">
	<div class="width">
		<a href="<?php echo base_url().'index.php/gestor_contenidos/panel_admin/' ?>">Regresar a panel de administración</a>
		<div class="[ full ]">
			<?php 
				if(isset($success)){
					echo '<p class="success">'.$success.'</p>';
				} else if(isset($error)){
					echo '<p class="error">'.$error.'</p>';
				}
			?>
			<div class="editar-anuncios" class="[ full ]">
				<h3>Editar anuncio con id: <?php echo $anuncio['id_anuncio']; ?></h3>
				
				<?php 
				$atributos = array('class' => '[ js-validate-anuncio ]');
				echo form_open_multipart('index.php/gestor_contenidos/editar_anuncio/'.$anuncio['id_anuncio'], $atributos);
				?>
					<fieldset class="">
						<label for="anuncio" >Contenido slider</label>
						<textarea type="text" name="anuncio" class="[ full ]"><?php echo $anuncio['contenido']; ?></textarea>
					</fieldset>
					<fieldset class="">
						<label for="url_anuncio" >URL</label>
						<input type="text" name="url_anuncio" class="[ full ]" value="<?php echo $anuncio['url']; ?>">
					</fieldset>
					<fieldset class="center">
						<label for="fecha_inicial" >Fecha inicial</label>
						<input type="text" name="fecha_inicial" class="datepicker [ full ]" value="<?php echo $anuncio['fecha_inicial']; ?>">
					</fieldset>
					<fieldset class=" center">
						<label for="fecha_final" >Fecha final</label>
						<input type="text" name="fecha_final" class="datepicker [ full ]" value="<?php echo $anuncio['fecha_final']; ?>">
					</fieldset>
					<fieldset class="">
						<?php if ($anuncio['activo'] == 't') { ?>
							<input type="checkbox" name="activo" checked>
						<?php } else { ?>
							<input type="checkbox" name="activo">
						<?php } ?>
						<label for="activo" >¿Está activo?</label>
						
					</fieldset>
					<div class="[ clearfix ]">
						<fieldset class="">
							<label for="url_img" >Imagen actual: <?php echo $anuncio['url_img']; ?></label><br />
							<input type="hidden" name="url_img_anterior" value="<?php echo $anuncio['url_img']; ?>">
							<input type="checkbox" name="subir_img">
							<label for="subir_img" >¿Subir otra imagen?</label><br />
							<img src="<?php echo base_url().$anuncio['url_img']; ?>" class="[ full ] img_actual">
						</fieldset>
						<fieldset class="columna xmall-6 cargar_img hide">
							<p>Restricciones de imagen</p>
							<ul>
								<li>Los formatos permitidos son JPEG y PNG</li>
								<li>El tamaño máximo de la imagen es de 500 KB</li>
								<li>Se recomienda utilizar imágenes de 940 x 420 pixeles</li>
							</ul>
							<input type="file" name="userfile" size="20" />
							<input type="hidden" name="id_usuario" value="<?php echo $anuncio['id_usuario'] ?>">
						</fieldset>
					</div><!-- .clearfix -->
					<div class="clear"></div>
					<div class="[ text-center ]">
						<input type="submit" value="Modificar anuncio" class="boton" />
					</div><!-- .text-center -->
				</form>
				
			</div>
		</div>
	</div>
</div>

<?php // } else { header('Location: '.base_url().'index.php/login'); } ?>
