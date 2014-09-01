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
			<div class="editar-avisos" class="columna xmall-12">
				<h3>Editar avisos</h3>
				<div class="tabla">
					<div class="fila header">
						<div class="columna xmall-1 text-center">
							Id Usuario
						</div>
						<div class="columna xmall-2 text-center">
							Tipo contenido
						</div>
						<div class="columna xmall-4 text-center">
							Contenido
						</div>
						<div class="columna xmall-3 text-center">
							URL
						</div>
						<div class="columna xmall-2 text-center">
							Editar
						</div>
					</div>
				<?php 

					foreach ($avisos as $key => $value) {
						$link_editable = '<a href="'.base_url().'index.php/gestor_contenidos/editar_aviso/'.$value['id_aviso'].'">Editar</a>';
						echo '<div class="fila header">';
						echo '<div class="columna xmall-1 text-center">'.$value['id_usuario'].'</div>';
						echo '<div class="columna xmall-2 text-center">'.$value['tipo_contenido'].'</div>';
						echo '<div class="columna xmall-4 text-center">'.$value['contenido'].'</div>';
						echo '<div class="columna xmall-3 text-center">'.$value['url'].'</div>';
						echo '<div class="columna xmall-2 text-center">'.$link_editable.'</div>';
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
						<div class="columna xmall-2 text-center">
							Id Usuario
						</div>
						<div class="columna xmall-8 text-center">
							Pregunta
						</div>
						<div class="columna xmall-2 text-center">
							Editar
						</div>
					</div>
				<?php 

					foreach ($preguntas as $key => $value) {
						$link_editable = '<a href="'.base_url().'index.php/gestor_contenidos/editar_pregunta/'.$value['id_pregunta'].'">Editar</a>';
						echo '<div class="fila header">';
						echo '<div class="columna xmall-2 text-center">'.$value['id_usuario'].'</div>';
						echo '<div class="columna xmall-8 text-center">'.$value['pregunta'].'</div>';
						echo '<div class="columna xmall-2 text-center">'.$link_editable.'</div>';
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
						<div class="columna xmall-2 text-center">
							Tipo contenido
						</div>
						<div class="columna xmall-3 text-center">
							Texto slide
						</div>
						<div class="columna xmall-3 text-center">
							URL 
						</div>
						<div class="columna xmall-2 text-center">
							URL imagen
						</div>
						<div class="columna xmall-1 text-center">
							Editar
						</div>
					</div>
				<?php 

					foreach ($anuncios as $key => $value) {
						$link_editable = '<a href="'.base_url().'index.php/gestor_contenidos/editar_anuncio/'.$value['id_anuncio'].'">Editar</a>';
						echo '<div class="fila header">';
						echo '<div class="columna xmall-1 text-center">'.$value['id_usuario'].'</div>';
						echo '<div class="columna xmall-2 text-center">'.$value['tipo_contenido'].'</div>';
						echo '<div class="columna xmall-3 text-center">'.$value['contenido'].'</div>';
						echo '<div class="columna xmall-3 text-center">'.$value['url'].'</div>';
						echo '<div class="columna xmall-2 text-center">'.$value['url_img'].'</div>';
						echo '<div class="columna xmall-1 text-center">'.$link_editable.'</div>';
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