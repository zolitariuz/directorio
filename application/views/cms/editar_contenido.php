<?php if(isset($usuario)) { ?>

<div class="main">
	<div class="width">
		
		<a href="<?php echo base_url().'index.php/gestor_contenidos/panel_admin/' ?>">Regresar a panel de administración</a>
	
		<div class="full">
			<div class="editar-avisos" class="columna xmall-12">
				<h3>Editar avisos</h3>
				<div class="tabla">
					<div class="fila header">
						<div class="columna xmall-1 text-center">
							Id usuario
						</div>
						<div class="columna xmall-5 text-center">
							Contenido
						</div>
						<div class="columna xmall-4 text-center">
							URL
						</div>
						<div class="columna xmall-2 text-center">
							Opciones
						</div>
					</div>
				<?php 
					foreach ($avisos as $key => $value) {
						$link_editar = '<a href="'.base_url().'index.php/gestor_contenidos/editar_aviso/'.$value['id_aviso'].'">Editar</a>';
						$link_eliminar = '<a href="'.base_url().'index.php/gestor_contenidos/eliminar_aviso/'.$value['id_aviso'].'">Eliminar</a>';
						echo '<div class="fila header">';
						echo '<div class="columna xmall-1 text-center">'.$value['id_usuario'].'</div>';
						echo '<div class="columna xmall-5 ">'.$value['contenido'].'</div>';
						echo '<div class="columna xmall-4 text-center">'.$value['url'].'</div>';
						echo '<div class="columna xmall-1 text-center">'.$link_editar.'</div>';
						echo '<div class="columna xmall-1 text-center">'.$link_eliminar.'</div>';
						echo '</div">';
						echo '<div class="clear"></div>';
					}// foreach anuncio
				?>
				</div>
			</div>
			<hr>
			<div class="clear"></div>
			<div class="editar-preguntas">
				<h3>Editar preguntas</h3>
				<div class="tabla">
					<div class="fila header">
						<div class="columna xmall-1 text-center">
							Id usuario
						</div>
						<div class="columna xmall-9 text-center">
							Pregunta
						</div>
						<div class="columna xmall-2 text-center">
							Opciones
						</div>
					</div>
				<?php 

					foreach ($preguntas as $key => $value) {
						$link_editar = '<a href="'.base_url().'index.php/gestor_contenidos/editar_pregunta/'.$value['id_pregunta'].'">Editar</a>';
						$link_eliminar = '<a href="'.base_url().'index.php/gestor_contenidos/eliminar_pregunta/'.$value['id_pregunta'].'">Eliminar</a>';
						echo '<div class="fila header">';
						echo '<div class="columna xmall-1 text-center">'.$value['id_usuario'].'</div>';
						echo '<div class="columna xmall-9">'.$value['pregunta'].'</div>';
						echo '<div class="columna xmall-1 text-center">'.$link_editar.'</div>';
						echo '<div class="columna xmall-1 text-center">'.$link_eliminar.'</div>';
						echo '</div">';
						echo '<div class="clear"></div>';
					}// foreach anuncio
				?>
				</div>
			</div>
			<hr>
			<div class="clear"></div>
			<div class="editar-anuncios" class="columna xmall-12">
				<h3>Editar anuncios</h3>
				<div class="tabla">
					<div class="fila header">
						<div class="columna xmall-1 text-center">
							Id Usuario
						</div>
						<div class="columna xmall-3 text-center">
							Texto slide
						</div>
						<div class="columna xmall-3 text-center">
							URL 
						</div>
						<div class="columna xmall-3 text-center">
							URL imagen
						</div>
						<div class="columna xmall-2 text-center">
							Opciones
						</div>
					</div>
				<?php 

					foreach ($anuncios as $key => $value) {
						$link_editar = '<a href="'.base_url().'index.php/gestor_contenidos/editar_anuncio/'.$value['id_anuncio'].'">Editar</a>';
						$link_eliminar = '<a href="'.base_url().'index.php/gestor_contenidos/eliminar_anuncio/'.$value['id_anuncio'].'">Eliminar</a>';
						echo '<div class="fila header">';
						echo '<div class="columna xmall-1 text-center">'.$value['id_usuario'].'</div>';
						echo '<div class="columna xmall-3">'.$value['contenido'].'</div>';
						echo '<div class="columna xmall-3 text-center">'.$value['url'].'</div>';
						echo '<div class="columna xmall-3 text-center">'.$value['url_img'].'</div>';
						echo '<div class="columna xmall-1 text-center">'.$link_editar.'</div>';
						echo '<div class="columna xmall-1 text-center">'.$link_eliminar.'</div>';
						echo '</div">';
						echo '<div class="clear"></div>';
					}// foreach anuncio
				?>
				</div>
			</div>

		</div>
	</div>
</div>

<?php } else { header('Location: '.base_url().'index.php/login'); } ?>