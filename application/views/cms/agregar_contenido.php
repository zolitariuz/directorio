<?php if(isset($usuario)) { ?>

<div class="main">
	<a href="<?php echo base_url().'index.php/gestor_contenidos/panel_admin/' ?>" class="margin-bottom">Regresar a panel de administración</a>
	<div class="width">
		<div class="full">
			<?php 
				if(isset($success)){
					echo '<p class="success">'.$success.'</p>';
				} else if(isset($error)){
					echo '<p class="error">'.$error.'</p>';
				}
			?>
			<form method="POST" action="<?php echo base_url().'index.php/gestor_contenidos/agregar_aviso' ?>" class="columna xmall-10 center crea-aviso">
				<fieldset class="columna xmall-10 center">
					<label for="aviso" >Aviso nuevo (máximo 140 caracteres)</label>
					<textarea type="text" name="aviso" class="columna xmall-12"></textarea>
				</fieldset>
				<fieldset class="columna xmall-10 center"> 
					<label for="vigencia" >Vigencia</label>
					<input type="text" name="vigencia" class="datepicker columna xmall-12">
				</fieldset>
				<fieldset class="columna xmall-10 center"> 
					<input type="checkbox" name="link_aviso"> ¿Tiene link?
				</fieldset>
				<fieldset class="columna xmall-10 center url_aviso hide"> 
					<label for="url_aviso" >URL de aviso: </label>
					<input type="text" name="url_aviso" value="-" class="columna xmall-12">
				</fieldset>
				<fieldset class="columna xmall-10 center"> 
					<input type="hidden" name="id_usuario" value="<?php echo $usuario['id_usuario'] ?>">
					<input type="submit" value="Agregar aviso" class="columna xmall-4 block center boton">
				</fieldset>
			</form>
			
			<form method="POST" action="<?php echo base_url().'index.php/gestor_contenidos/agregar_pregunta' ?>" class="columna xmall-10 center crea-pregunta">
				<fieldset class="columna xmall-10 center">
					<label for="pregunta" >Pregunta nueva</label><br />
					<input type="text" name="pregunta" class="columna xmall-12">
				</fieldset>
				<fieldset class="columna xmall-10 center"> 
					<label for="vigencia" >Vigencia</label>
					<input type="text" name="vigencia" class="datepicker columna xmall-12">
				</fieldset>
				<fieldset class="columna xmall-10 center"> 
					<input type="hidden" name="id_usuario" value="<?php echo $usuario['id_usuario'] ?>">
					<input type="submit" value="Agregar pregunta" class="columna xmall-4 block center boton">
				</fieldset>
			</form>

			<?php 
			$atributos = array('class' => 'columna xmall-10 center crea-anuncio');
			echo form_open_multipart('index.php/gestor_contenidos/agregar_anuncio/'.$aviso['id_aviso'], $atributos);
			?>
				<fieldset class="columna xmall-10 center">
					<label for="pregunta" >Anuncio nuevo</label>
					<input type="text" name="anuncio" class="columna xmall-12">
				</fieldset>
				<fieldset class="columna xmall-10 center"> 
					<label for="vigencia" >Vigencia</label>
					<input type="text" name="vigencia" class="datepicker columna xmall-12">
				</fieldset>
				<fieldset class="columna xmall-10 center"> 
					<input type="checkbox" name="link_anuncio"> ¿Tiene link?
				</fieldset>
				<fieldset class="columna xmall-10 center url_anuncio hide"> 
					<label for="url_anuncio" >URL de anuncio </label>
					<input type="text" name="url_anuncio" value="-" class="columna xmall-12">
				</fieldset>
				<fieldset class="columna xmall-10 center">
					<p>Restricciones de imagen</p>
					<ul>
						<li>Los formatos permitidos son JPEG y PNG</li>
						<li>El tamaño máximo de la imagen es de 500 KB</li>
						<li>Se recomienda utilizar imágenes de 940 x 420 pixeles</li>
					</ul>
					<input type="hidden" name="id_usuario" value="<?php echo $usuario['id_usuario'] ?>">
					<input type="file" name="userfile" size="20" />
					<input type="submit" value="Agrega anuncio" class="columna xmall-4 block center boton" />
				</fieldset>				
			</form>
		</div>
	</div>
</div>

<?php } else { header('Location: '.base_url().'index.php/login'); } ?>