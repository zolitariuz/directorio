<?php if(isset($usuario)) { ?>

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
			<form class="crea-aviso js-validate-aviso" method="POST" action="<?php echo base_url().'index.php/gestor_contenidos/agregar_aviso' ?>">
				<fieldset class="">
					<label for="aviso" >Aviso nuevo (máximo 140 caracteres)</label>
					<textarea type="text" name="aviso" class="full" required maxlength="140"></textarea>
				</fieldset>
				<fieldset class="columna xmall-12 center"> 
					<label for="fecha_inicial" >Fecha inicial</label>
					<input type="text" name="fecha_inicial" class="datepicker columna xmall-12" required value="<?php echo $anuncio['fecha_inicial']; ?>">
				</fieldset>
				<fieldset class="columna xmall-12 center"> 
					<label for="fecha_final" >Fecha final</label>
					<input type="text" name="fecha_final" class="datepicker columna xmall-12" required value="<?php echo $anuncio['fecha_final']; ?>">
				</fieldset>
				<fieldset class="">
					<input type="checkbox" name="link_aviso"> ¿Tiene link?
				</fieldset>
				<fieldset class=" url_aviso hide">
					<label for="url_aviso" >URL de aviso: </label>
					<input type="text" name="url_aviso" value="-" class="full">
				</fieldset>
				<fieldset class="">
					<input type="hidden" name="id_usuario" value="<?php echo $usuario['id_usuario'] ?>">
					<button type="submit" value="" class="block boton chico right">Agregar aviso</button>
				</fieldset>
			</form>
			<hr>
			<form class="crea-pregunta js-validate-pregunta" method="POST" action="<?php echo base_url().'index.php/gestor_contenidos/agregar_pregunta' ?>">
				<fieldset class="">
					<label class="block" for="pregunta">Pregunta nueva</label><br />
					<input type="text" name="pregunta" class=" columna xmall-12" required>
				</fieldset>
				<fieldset class="columna xmall-12 center"> 
					<label for="fecha_inicial" >Fecha inicial</label>
					<input type="text" name="fecha_inicial" class="datepicker columna xmall-12" required value="<?php echo $anuncio['fecha_inicial']; ?>">
				</fieldset>
				<fieldset class="columna xmall-12 center"> 
					<label for="fecha_final" >Fecha final</label>
					<input type="text" name="fecha_final" class="datepicker columna xmall-12" required value="<?php echo $anuncio['fecha_final']; ?>">
				</fieldset>
				<fieldset class="">
					<input type="hidden" name="id_usuario" value="<?php echo $usuario['id_usuario'] ?>">
					<button type="submit" value="" class="block boton chico right">Agregar pregunta</button>
				</fieldset>
			</form>
			<hr>
			<?php
			$atributos = array('class' => 'crea-anuncio js-validate-anuncio');
			echo form_open_multipart('index.php/gestor_contenidos/agregar_anuncio/'.$aviso['id_aviso'], $atributos);
			?>
				<fieldset class="">
					<label class="block" for="pregunta" >Anuncio nuevo</label>
					<input type="text" name="anuncio" class=" columna xmall-12" required>
				</fieldset>
				<fieldset class="columna xmall-12 center"> 
					<label for="fecha_inicial" >Fecha inicial</label>
					<input type="text" name="fecha_inicial" class="datepicker columna xmall-12" required value="<?php echo $anuncio['fecha_inicial']; ?>">
				</fieldset>
				<fieldset class="columna xmall-12 center"> 
					<label for="fecha_final" >Fecha final</label>
					<input type="text" name="fecha_final" class="datepicker columna xmall-12" required value="<?php echo $anuncio['fecha_final']; ?>">
				</fieldset>
				<fieldset class="">
					<input type="checkbox" name="link_anuncio"> ¿Tiene link?
				</fieldset>
				<fieldset class=" url_anuncio hide">
					<label class="block" for="url_anuncio" >URL de anuncio </label>
					<input type="text" name="url_anuncio" value="-" class=" columna xmall-12">
				</fieldset>
				<fieldset class="">
					<p>Restricciones de imagen</p>
					<ul class="inside margin-bottom">
						<li>Los formatos permitidos son JPEG y PNG</li>
						<li>El tamaño máximo de la imagen es de 500 KB</li>
						<li>Se recomienda utilizar imágenes de 940 x 420 pixeles</li>
					</ul>
					<input type="hidden" name="id_usuario" value="<?php echo $usuario['id_usuario'] ?>">
					<input class="margin-bottom" type="file" name="userfile"  />
					<div class="clear"></div>
					<button type="submit" value="" class="block boton chico right">Agregar anuncio</button>
				</fieldset>
			</form>
		</div><!-- columna xmall-6 center -->
	</div>
</div>

<?php } else { header('Location: '.base_url().'index.php/login'); } ?>
