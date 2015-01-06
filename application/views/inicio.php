<div class="main">
	<div class="width">
		<?php
			// Mostrar error en caso de búsqueda
			// de trámite o servicio inválida
			if($error == '1')
				echo '<p>No se encontró el trámite o servicio que estabas buscando</p>';
		?>
		<section class="[ busqueda ] [ clearfix ]">
			<div class="[ columna xmall-12 large-8 ]">
				<p class="[ title--small ]">El sitio para buscar los trámites y servicios de la Ciudad de México de forma más simple y rápida</p>
				<form class="[ main-search main-search-home hero ] [ input-group ] [ full ] [ clearfix ] " action="#">
					<input type="search" class="[ span xmall-10 large-11 ]" placeholder="Busca tu trámite o servicio">
					<input type="hidden" name="tags_id" id="ts_home_id" value="x" />
					<button type="submit" class="[ span xmall-2 large-1 ]"><i class="icon-ts-buscar"></i></button>
				</form>
			</div>
			<div class="[ columna xmall-12 large-4 ] [ ts-mas-solicitados ]">
				<p class="[ title--small ]">Trámites y servicios más solicitados</p>
				<ul>
					<?php foreach ($nombres_ts_comunes as $key => $value) {
						$tramite = $value->nombre_ts;
						$idTS = $value->id_tramite_servicio;
						$urlTramite = base_url().'index.php/tramites_servicios/muestraInfo/'.$idTS; ?>
						<li class="[ wrap-ellipsis ]"><a href="<?php echo $urlTramite; ?>"><?php echo $tramite; ?></a></li>
					<?php } // end foreach ?>
				</ul>
			</div>
		</section><!-- ts más solicitados -->
		<hr class="[ large ]">
		<?php if($anuncios != '') { ?>
			<section class="[ anuncios ] [ clearfix ] [ large ]">
				<div class="slider clearfix cycle-slideshow"
					data-cycle-slides=".slide"
					data-cycle-fx="scrollHorz"
					data-cycle-swipe="true"
					data-cycle-log="false"
				>
					<?php
						// contenido del slider
						foreach ($anuncios as $key => $value) {
							echo '<div class="slide">';
							echo '<img src="'.$value['url_img'].'" alt="">';
							echo '<div class="info">';
							echo '<p>';

							if(trim($value['tipo_contenido']) == 'link') {
								echo '<a href="'.$value['url'].'">';
								echo $value['contenido'];
								echo '</a>';
							} else
								echo $value['contenido'];

							echo '</p>';
							echo '</div>';
							echo '</div>';
						}// foreach anuncio
					?>

					<div class="cycle-controls cycle-prev"><i class="fa fa-angle-left"></i></div>
	    			<div class="cycle-controls cycle-next"><i class="fa fa-angle-right"></i></div>
				</div>
			</section><!-- anuncios -->
			<div class="clear large"></div>
			<hr class="columna large xmall-6 center">
		<?php } ?>
		<div class="clear large"></div>
		<section class="categorias clearfix large">
			<h2 class="text-center highlight">Temas</h2>
			<div class="slider clearfix cycle-slideshow"
					data-cycle-slides=".slide"
					data-cycle-fx="scrollHorz"
					data-cycle-swipe="true"
					data-cycle-timeout="0"
					data-cycle-log="false"
				>
				<?php
					$temas_por_slide = 0;
					$filas_por_slide = 0;

					foreach ($temas as $key => $value) {
						$clase_icono = $clases_iconos[$key];
						$url_tema = base_url().'index.php/temas/muestraTS/'.$value->id_cat_materia;

						if($filas_por_slide == 2){
							echo '</div>';
							$filas_por_slide = 0;
						}
						if($temas_por_slide % 8 == 0)
							echo '<div class="slide">';
						echo '<a href="'.$url_tema.'" class="boton columna xmall-3 cuadrado chico">';
						echo '<i class="'.$clase_icono.'"></i>';
						echo $value->materia;
						echo '</a>';
						// cada 4 elementos mete un clear
						$temas_por_slide = $temas_por_slide + 1;
						if($temas_por_slide % 4 == 0){
							$filas_por_slide = $filas_por_slide + 1;
							echo '<div class="clear"></div>';
						}
					}

				?>
				</div><!-- cierra último slide -->
				<div class="cycle-pager"></div>
			</div>
		</section>
		<?php  if(!is_null($pregunta['pregunta'])){ ?>
			<div class="clear large"></div>
			<hr class="columna xmall-6 center">
			<div class="clear"></div>
			<section class="[ pregunta links ] [ clearfix ]">
				<div class=" [ inline-block vertical-middle ] [ columna medium-6 ] [ sugerencias-home ]">
					<h2 class="[ text-center highlight ]">Compártenos sugerencias</h2>
					<div class="[ columna xmall-6 ] [ center ] [ margin-bottom-big ]">
						<a href="href="http://www.anticorrupcion.df.gob.mx/index.php/sistema-de-denuncia-ciudadana"" class="block columna xmall-8 center">
							<img class="full" src="<?php echo base_url() ?>assets/img/logo-atencion-ciudadana-cdmx.png" alt="">
						</a>
					</div>
					<h2 class="[ text-center highlight ]">Denuncia actos de corrupción</h2>
					<div class="[ columna xmall-6 ] [ center ]">
						<a href="#" class="block columna xmall-8 center">
							<img class="full" src="<?php echo base_url() ?>assets/img/logo-anticorrupcion.png" alt="">
						</a>
					</div>
				</div><div class="[ inline-block vertical-middle ] [ columna xmall-12 medium-6 ]  [ denuncia-home ]">
					<h2 class="text-center highlight">Nos interesa tu opinión</h2>
					<p class="[ text-center ] [ title--small ]"><?php echo $pregunta['pregunta'] ?></p>
					<div class="[ text-center ]">
						<a href="#" class="[ boton grande ]" data-respuesta="t" data-pregunta="<?php echo $pregunta['id_pregunta'] ?>">Sí</a>
						<a href="#" class="[ boton grande ]" data-respuesta="f" data-pregunta="<?php echo $pregunta['id_pregunta'] ?>">No</a>
					</div>
				</div>
			</section>
		<?php } ?>
	</div><!-- width -->
</div><!-- main -->
