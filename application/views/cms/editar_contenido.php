<?php if(isset($usuario)) { ?>

	<div class="main">
		<div class="width clearfix">
			<div class="tabs-container">
				<div class="[ tabs-header ]">
					<a data-tab="avisos" href="#" class="[ boton boton-tab ] [ inline-block ] [ text-center ] [ active ]">Editar avisos</a>
					<a data-tab="preguntas" href="#" class="[ boton boton-tab ] [ inline-block ] [ text-center ]">Editar preguntas</a>
					<a data-tab="anuncios" href="#" class="[ boton boton-tab ] [ inline-block ] [ text-center ]">Editar anuncios</a>
				</div><!-- tabs-header -->
				<div class="tab-content padding clearfix">
					<div class="tab-avisos active">
						<div class="editar-avisos" class="columna xmall-12">
							<h3 class="text-center margin-bottom">Editar avisos</h3>
							<div class="tabla">
								<div class="fila header clearfix">
									<div class="columna xmall-3 text-center">
										Contenido
									</div>
									<div class="columna xmall-2 text-center">
										URL
									</div>
									<div class="columna xmall-2 text-center">
										Fecha inicial
									</div>
									<div class="columna xmall-2 text-center">
										Fecha final
									</div>
									<div class="columna xmall-1 text-center">
										¿Activo?
									</div>
									<div class="columna xmall-2 text-center">
										Opciones
									</div>
								</div>
								<div class="clear"></div>
								<?php
									foreach ($avisos as $key => $value) {
										if($value['is_default'] == 't')
											echo '<strong>*</strong>';
										$link_editar = '<a href="'.base_url().'index.php/gestor_contenidos/editar_aviso/'.$value['id_aviso'].'">Editar</a>';
										$link_eliminar = '<a href="'.base_url().'index.php/gestor_contenidos/eliminar_aviso/'.$value['id_aviso'].'">Eliminar</a>';
										echo '<div class="fila clearfix">';
											echo '<div class="columna xmall-3 ">'.$value['contenido'].'</div>';
											echo '<div class="columna xmall-2 text-center">'.$value['url'].'</div>';
											echo '<div class="columna xmall-2 text-center">'.$value['fecha_inicial'].'</div>';
											echo '<div class="columna xmall-2 text-center">'.$value['fecha_final'].'</div>';
											if ($value['activo'] == 't')
												$activo = 'Si';
											else
												$activo = 'No';
											echo '<div class="columna xmall-1 text-center">'.$activo.'</div>';
											echo '<div class="columna xmall-1 text-center">'.$link_editar.'</div>';
											echo '<div class="columna xmall-1 text-center">'.$link_eliminar.'</div>';
											/*echo '<div class="columna xmall-1 text-center">'.$link_eliminar.'</div>';*/
										echo '</div>';
										echo '<div class="clear"></div>';
									}// foreach anuncio
								?>
							</div><!-- tabla -->
						</div>
					</div><!-- tab-avisos -->
					<div class="tab-preguntas">
						<div class="editar-preguntas">
							<h3 class="text-center margin-bottom">Editar preguntas</h3>
							<div class="tabla">
								<div class="fila header clearfix">
									<div class="columna xmall-4 text-center">
										Pregunta
									</div>
									<div class="columna xmall-2 text-center">
										Fecha inicial
									</div>
									<div class="columna xmall-2 text-center">
										Fecha final
									</div>
									<div class="columna xmall-1 text-center">
										¿Activo?
									</div>
									<div class="columna xmall-3 text-center">
										Opciones
									</div>
								</div>
								<div class="clear"></div>
								<?php
									foreach ($preguntas as $key => $value) {
										$link_editar = '<a href="'.base_url().'index.php/gestor_contenidos/editar_pregunta/'.$value['id_pregunta'].'">Editar</a>';
										$link_ver = '<a href="'.base_url().'index.php/gestor_contenidos/ver_respuestas/'.$value['id_pregunta'].'">Ver</a>';
										$link_eliminar = '<a href="'.base_url().'index.php/gestor_contenidos/eliminar_pregunta/'.$value['id_pregunta'].'">Eliminar</a>';
										echo '<div class="fila clearfix">';
											echo '<div class="columna xmall-4">'.$value['pregunta'].'</div>';
											echo '<div class="columna xmall-2 text-center">'.$value['fecha_inicial'].'</div>';
											echo '<div class="columna xmall-2 text-center">'.$value['fecha_final'].'</div>';
											if ($value['activo'] == 't')
												$activo = 'Si';
											else
												$activo = 'No';
											echo '<div class="columna xmall-1 text-center">'.$activo.'</div>';
											echo '<div class="columna xmall-1 text-center">'.$link_ver.'</div>';
											echo '<div class="columna xmall-1 text-center">'.$link_editar.'</div>';
											echo '<div class="columna xmall-1 text-center">'.$link_eliminar.'</div>';
										echo '</div>';
										echo '<div class="clear"></div>';
									}// foreach anuncio
								?>
							</div><!-- tabla -->
						</div><!-- editar-preguntas -->
					</div><!-- tab-preguntas -->
					<div class="tab-anuncios">
						<div class="editar-anuncios" class="columna xmall-12">
							<h3 class="text-center margin-bottom">Editar anuncios</h3>
							<div class="tabla">
								<div class="fila header clearfix">
									<div class="columna xmall-3 text-center">
										Texto slide
									</div>
									<div class="columna xmall-2 text-center">
										URL
									</div>
									<div class="columna xmall-2 text-center">
										Fecha inicial
									</div>
									<div class="columna xmall-2 text-center">
										Fecha final
									</div>
									<div class="columna xmall-1 text-center">
										¿Activo?
									</div>
									<div class="columna xmall-2 text-center">
										Opciones
									</div>
								</div>

								<?php
									foreach ($anuncios as $key => $value) {
										if($value['is_default'] == 't')
											echo '<strong>*</strong>';
										$link_editar = '<a href="'.base_url().'index.php/gestor_contenidos/editar_anuncio/'.$value['id_anuncio'].'">Editar</a>';
										$link_eliminar = '<a href="'.base_url().'index.php/gestor_contenidos/eliminar_anuncio/'.$value['id_anuncio'].'">Eliminar</a>';
										echo '<div class="fila clearfix">';
											echo '<div class="columna xmall-3">'.$value['contenido'].'</div>';
											echo '<div class="columna xmall-2 text-center">'.$value['url'].'</div>';
											echo '<div class="columna xmall-2 text-center">'.$value['fecha_inicial'].'</div>';
											echo '<div class="columna xmall-2 text-center">'.$value['fecha_final'].'</div>';
											if ($value['activo'] == 't')
												$activo = 'Si';
											else
												$activo = 'No';
											echo '<div class="columna xmall-1 text-center">'.$activo.'</div>';
											echo '<div class="columna xmall-1 text-center">'.$link_editar.'</div>';
											echo '<div class="columna xmall-1 text-center">'.$link_eliminar.'</div>';
										echo '</div>';
										echo '<div class="clear"></div>';
									}// foreach anuncio
								?>
							</div><!-- tabla -->
						</div><!-- editar-anuncio -->
					</div><!-- tab-anuncios -->
				</div><!-- tab-content -->
			</div><!-- tab-container -->
		</div><!-- width -->
	</div><!-- main -->
<?php } else {
	header('Location: '.base_url().'index.php/login');
} ?>
