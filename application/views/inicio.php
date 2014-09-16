<div class="main">

	<div class="width">
		<?php
			// Mostrar error en caso de búsqueda
			// de trámite o servicio inválida
			if($error == '1')
				echo '<p>No se encontró el trámite o servicio que estabas buscando</p>';
		?>
		<section class="busqueda clearfix">
			<h2 class="text-center">Busca tu trámite o servicio</h2>
			<form class="main-search hero clearfix main-search-home" action="#">
				<input type="search" class="span large-11 full">
				<input type="hidden" name="tags_id" id="ts_home_id" value="x" />
				<button type="submit" class="span full large-1"><i class="fa fa-search"></i></button>
			</form>
			<h3 class="text-center large">O ve trámites y servicios por:</h3>
			<div class="columna large large-8 center">
				<a href="<?php echo base_url().'index.php/instituciones' ?>" class="block boton vertical columna xmall-6">
					<i class="icon-ts-icon-fill-institucion"></i>
					Institución
				</a>
				<a href="<?php echo base_url().'index.php/temas' ?>" class="block boton vertical columna xmall-6">
					<i class="icon-ts-icon-fill-tema"></i>
					Tema
				</a>
			</div>
		</section><!-- busqueda -->
		<div class="clear"></div>
		<hr class="columna xmall-6 center">
		<div class="clear"></div>
		<section class="mas-comunes clearfix transform">
			<?php if ($nombres_ts_comunes != '') { ?>
				<h2 class="text-center highlight">Trámites y servicios más solicitados</h2>
				<div class="masonry-container modal-to-be">
					<?php foreach ($nombres_ts_comunes as $key => $value) {
						$tramite = $value->nombre_ts;
						$idTS = $value->id_tramite_servicio;
						$urlTramite = base_url().'index.php/tramites_servicios/muestraInfo/'.$idTS; ?>
						<a href="<?php echo $urlTramite; ?>" class="item boton columna large-4">
							<?php echo $tramite; ?>
						</a></a>
					<?php } // end foreach ?>
				</div>
			<?php } ?>
		</section>
		<div class="clear large"></div>
		<hr class="columna large xmall-6 center">
		<div class="clear large"></div>
		<section class="categorias clearfix transform">
			<h2 class="text-center highlight">Temas</h2>
			<div class="slider clearfix cycle-slideshow"
					data-cycle-slides=".slide"
					data-cycle-fx="scrollHorz"
					data-cycle-swipe="true"
					data-cycle-timeout="0"
					data-cycle-log="false"
				>
				<div class="slide">
					<a href="#" class="boton columna xmall-3 cuadrado chico">
						<i class="icon-ts-icon-fill-agraria"></i>
						Agraria
					</a>
					<a href="#" class="boton columna xmall-3 cuadrado chico">
						<i class="icon-ts-icon-fill-agua-potable-y-servicios-hidraulicos"></i>
						Agua potable y servicios hidráulicos
					</a>
					<a href="#" class="boton columna xmall-3 cuadrado chico">
						<i class="icon-ts-icon-fill-anuncios"></i>
						Anuncios
					</a>
					<a href="#" class="boton columna xmall-3 cuadrado chico">
						<i class="icon-ts-icon-fill-asesoria-telefonica"></i>
						Asesoría telefónica
					</a>
					<div class="clear"></div>
					<a href="#" class="boton columna xmall-3 cuadrado chico">
						<i class="icon-ts-icon-fill-asesoria-y-asistencia-social-y-condominal"></i>
						Asesoría y Asistencia Social y Condominal
					</a>
					<a href="#" class="boton columna xmall-3 cuadrado chico">
						<i class="icon-ts-icon-fill-auxilio-de-la-fuerza-publica-y-vialidad"></i>
						Auxilio de la fuerza pública y vialidad
					</a>
					<a href="#" class="boton columna xmall-3 cuadrado chico">
						<i class="icon-ts-icon-fill-construcciones-y-obras"></i>
						Construcciones y obras
					</a>
					<a href="#" class="boton columna xmall-3 cuadrado chico">
						<i class="icon-ts-icon-fill-cultura-y-recreacion"></i>
						Cultura y recreación
					</a>
				</div><!-- slide -->
				<div class="slide">
					<a href="#" class="boton columna xmall-3 cuadrado chico">
						<i class="icon-ts-icon-fill-deportes"></i>
						Deportes
					</a>
					<a href="#" class="boton columna xmall-3 cuadrado chico">
						<i class="icon-ts-icon-fill-espectaculos-publicos"></i>
						Espectaculos públicos
					</a>
					<a href="#" class="boton columna xmall-3 cuadrado chico">
						<i class="icon-ts-icon-fill-establecimientos-mercantiles"></i>
						Establecimientos mercantiles
					</a>
					<a href="#" class="boton columna xmall-3 cuadrado chico">
						<i class="icon-ts-icon-fill-fomento-economico"></i>
						Fomento económico
					</a>
					<div class="clear"></div>
					<a href="#" class="boton columna xmall-3 cuadrado chico">
						<i class="icon-ts-icon-fill-funerarios"></i>
						Funerarios
					</a>
					<a href="#" class="boton columna xmall-3 cuadrado chico">
						<i class="icon-ts-icon-fill-industria"></i>
						Industria
					</a>
					<a href="#" class="boton columna xmall-3 cuadrado chico">
						<i class="icon-ts-icon-fill-mantenimiento-a-infraestructura-urbana-y-habitacional"></i>
						Mantenimiento a infraestructura urbana y habitacional
					</a>
					<a href="#" class="boton columna xmall-3 cuadrado chico">
						<i class="icon-ts-icon-fill-medio-ambiente"></i>
						Medio Ambiente
					</a>
				</div><!-- slide -->
				<div class="slide">
					<a href="#" class="boton columna xmall-3 cuadrado chico">
						<i class="icon-ts-icon-fill-mercados-publicos-y-mercados-sobre-ruedas"></i>
						Mercados públicos y mercados sobre ruedas
					</a>
					<a href="#" class="boton columna xmall-3 cuadrado chico">
						<i class="icon-ts-icon-fill-patrimonio-cultural-urbano"></i>
						Patrimonio cultural urbano
					</a>
					<a href="#" class="boton columna xmall-3 cuadrado chico">
						<i class="icon-ts-icon-fill-proteccion-civil"></i>
						Protección civil
					</a>
					<a href="#" class="boton columna xmall-3 cuadrado chico">
						<i class="icon-ts-icon-fill-quejas-y-demandas-vecinales"></i>
						Quejas y demandas vecinales
					</a>
					<div class="clear"></div>
					<a href="#" class="boton columna xmall-3 cuadrado chico">
						<i class="icon-ts-icon-fill-registro-civil"></i>
						Registro civil
					</a>
					<a href="#" class="boton columna xmall-3 cuadrado chico">
						<i class="icon-ts-icon-fill-registro-publico-de-la-propiedad-y-de-comercio"></i>
						Registro público de la propiedad y de comercio
					</a>
					<a href="#" class="boton columna xmall-3 cuadrado chico">
						<i class="icon-ts-icon-fill-regularizacion-territorial"></i>
						Regularización territorial
					</a>
					<a href="#" class="boton columna xmall-3 cuadrado chico">
						<i class="icon-ts-icon-fill-regularizacion-de-la-tierra-y-apoyo-a-predios"></i>
						Regularización de la tierra y apoyo a predios
					</a>
				</div><!-- slide -->
				<div class="slide">
					<a href="#" class="boton columna xmall-3 cuadrado chico">
						<i class="icon-ts-icon-fill-salud"></i>
						Salud
					</a>
					<a href="#" class="boton columna xmall-3 cuadrado chico">
						<i class="icon-ts-icon-fill-servicios-legales-y-archivos-de-notarias"></i>
						Servicios legales y archivo de notarias
					</a>
					<a href="#" class="boton columna xmall-3 cuadrado chico">
						<i class="icon-ts-icon-fill-servicios-urbanos"></i>
						Servicios urbanos
					</a>
					<a href="#" class="boton columna xmall-3 cuadrado chico">
						<i class="icon-ts-icon-fill-servicios-urbanos-limpia-e-infraestructura-urbana"></i>
						Servicios urbanos, limpia e infraestructura urbana
					</a>
					<div class="clear"></div>
					<a href="#" class="boton columna xmall-3 cuadrado chico">
						<i class="icon-ts-icon-fill-taxis"></i>
						Taxis
					</a>
					<a href="#" class="boton columna xmall-3 cuadrado chico">
						<i class="icon-ts-icon-fill-trabajo"></i>
						Trabajo
					</a>
					<a href="#" class="boton columna xmall-3 cuadrado chico">
						<i class="icon-ts-icon-fill-turismo"></i>
						Turismo
					</a>
					<a href="#" class="boton columna xmall-3 cuadrado chico">
						<i class="icon-ts-icon-fill-uso-de-suelo"></i>
						Uso de suelo
					</a>
				</div><!-- slide -->
				<div class="slide">
					<a href="#" class="boton columna xmall-3 cuadrado chico">
						<i class="icon-ts-icon-fill-vehiculos-automotores-de-pasajeros-y-carga"></i>
						Vehículos automotores de pasajeros y carga
					</a>
					<a href="#" class="boton columna xmall-3 cuadrado chico">
						<i class="icon-ts-icon-fill-vehiculos-automotores-particulares"></i>
						Vehículos automotores particulares
					</a>
					<a href="#" class="boton columna xmall-3 cuadrado chico">
						<i class="icon-ts-icon-fill-videojuegos"></i>
						Videojuegos
					</a>
					<a href="#" class="boton columna xmall-3 cuadrado chico">
						<i class="icon-ts-icon-fill-vivienda"></i>
						Vivienda
					</a>
				</div><!-- slide -->
				<div class="cycle-pager"></div>
			</div>
		</section>
		<div class="clear large"></div>
		<hr class="columna large large-6 center">
		<div class=" large"></div>
		<section class="anuncios clearfix large">
			<h2 class="text-center highlight">Anuncios</h2>
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
		</section>
		<?php  if(!is_null($pregunta['pregunta'])){ ?>
			<div class="clear"></div>
			<hr class="columna xmall-6 center">
			<div class="clear"></div>
			<section class="pregunta clearfix">
				<h2 class="text-center highlight">Nos interesa tu opinión</h2>
				<h4 class="text-center"><?php echo $pregunta['pregunta'] ?></h4>
				<div class="columna full large-5 center clearfix">
					<a href="#" class="block boton columna xmall-6 grande" data-respuesta="t" data-pregunta="<?php echo $pregunta['id_pregunta'] ?>">Sí</a>
					<a href="#" class="block boton columna xmall-6 grande" data-respuesta="f" data-pregunta="<?php echo $pregunta['id_pregunta'] ?>">No</a>
				</div>
			</section>
		<?php } ?>
		<div class="clear large"></div>
		<hr class="columna large large-6 center">
		<div class="large"></div>
		<section class="links clearfix large">
			<div class="columna xmall-6">
				<a href="#" class="block columna xmall-8 center">
					<img class="full" src="<?php echo base_url() ?>assets/img/logo-atencion-ciudadana-cdmx.png" alt="">
				</a>
			</div>
			<div class="columna xmall-6">
				<a href="#" class="block columna xmall-8 center">
					<img class="full" src="<?php echo base_url() ?>assets/img/logo-anticorrupcion.png" alt="">
				</a>
			</div>
		</section>
	</div><!-- width -->
</div><!-- main -->