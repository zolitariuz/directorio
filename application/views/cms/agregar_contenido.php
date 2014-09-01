<?php if(isset($usuario)) { ?>

<div class="main">
	<div class="width">
		
		<a href="<?php echo base_url().'index.php/gestor_contenidos/panel_admin/'.$usuario["id_usuario"]; ?>">Regresar a panel de administración</a>
	
		<div class="full">
			<?php 
				if(isset($success)){
					echo '<p class="success">'.$success.'</p>';
				}
			?>
			<form method="POST" action="<?php echo base_url().'index.php/gestor_contenidos/agregar_aviso' ?>" class="columna xmall-12">
				<h3>Crea aviso</h3>
				<fieldset class="columna xmall-12">
					<label for="aviso" >Aviso nuevo</label>
					<textarea type="text" name="aviso" class="columna xmall-12"></textarea>
				</fieldset>
				<fieldset class="columna xmall-12"> 
					<input type="checkbox"> ¿Tiene link?
				</fieldset>
				<fieldset class="columna xmall-12"> 
					<label for="url_aviso" >URL de aviso</label>
					<input type="text" name="url_aviso" >
				</fieldset>
				<input type="hidden" name="usuario" value="<?php echo $usuario['nombre'] ?>">
				<input type="hidden" name="id_usuario" value="<?php echo $usuario['id_usuario'] ?>">
				<input type="submit" value="Agregar aviso">
			</form>
			<div class="clear"></div>
			<form method="POST" action="<?php echo base_url().'index.php/gestor_contenidos/agregar_pregunta' ?>" class="columna xmall-12">
				<h3>Crea pregunta</h3>
				<fieldset class="columna xmall-12">
					<label for="pregunta" >Pregunta nueva</label>
					<input type="text" name="pregunta" class="columna xmall-12">
				</fieldset>
				<input type="hidden" name="usuario" value="<?php echo $usuario['nombre'] ?>">
				<input type="hidden" name="id_usuario" value="<?php echo $usuario['id_usuario'] ?>">
				<input type="submit" value="Agregar pregunta">
			</form>

			<div class="clear"></div>

			
			<?php 
			$atributos = array('class' => 'columna xmall-12');
			echo form_open_multipart('index.php/gestor_contenidos/agregar_anuncio', $atributos);

			?>
				<h3>Crea anuncio</h3>
				<fieldset class="columna xmall-12">
					<label for="pregunta" >Texto anuncio</label>
					<input type="text" name="anuncio" class="columna xmall-12">
				</fieldset>
				<fieldset class="columna xmall-12"> 
					<input type="checkbox"> ¿Tiene link?
				</fieldset>
				<fieldset class="columna xmall-12"> 
					<label for="url_anuncio" >URL de anuncio</label>
					<input type="text" name="url_anuncio" >
				</fieldset>
				<fieldset class="columna xmall-12">
					<input type="hidden" name="id_usuario" value="<?php echo $usuario['id_usuario'] ?>">
					<input type="file" name="userfile" size="20" />
					<input type="submit" value="upload" />
				</fieldset>				
			</form>

			<?php echo $error;?>
			<ul>
			<?php foreach ($upload as $item => $value):?>
			<li><?php echo $item;?>: <?php echo $value;?></li>
			<?php endforeach; ?>
			</ul>
		</div>
	</div>
</div>

<?php } else { header('Location: '.base_url().'index.php/login'); } ?>