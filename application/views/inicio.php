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
			<form class="main-search hero clearfix" action="#">
				<input type="search" class="span xmall-11">
				<input type="hidden" name="tags_id" id="ts_id" value="x" />
				<button type="submit" class="span xmall-1"><i class="fa fa-search"></i></button>
			</form>
			<h3 class="text-center">O ve trámites y servicios por:</h3>
			<div class="columna xmall-8 center">
				<a href="#" class="block boton vertical columna xmall-6">
					<i class="fa fa-asterisk"></i>
					Institución
				</a>
				<a href="<?php echo base_url().'index.php/temas' ?>" class="block boton vertical columna xmall-6">
					<i class="fa fa-asterisk"></i>
					Tema
				</a>
			</div>

		</section><!-- busqueda -->
		<div class="clear"></div>
		<hr class="columna xmall-6 center">
		<div class="clear"></div>
		<section class="mas-comunes clearfix">
			<h2 class="text-center highlight">Trámites y servicios más solicitados</h2>
			<div class="masonry-container">
				<?php foreach ($ts_mas_populares as $key => $value) {
					$tramite = $value->nombre_ts;
					$idTS = $value->id_tramite_servicio;
					$urlTramite = base_url().'index.php/inicio/muestraTramiteServicio/'.$idTS; ?>
					<a href="<?php echo $urlTramite; ?>" class="item boton columna large-4">
						<?php echo $tramite; ?>
					</a></a>
				<?php } // end foreach ?>
			</div>
		</section>
		<div class="clear"></div>
		<hr class="columna xmall-6 center">
		<div class="clear"></div>
		<section class="categorias clearfix">
			<h2 class="text-center highlight">Categorías</h2>
			<div class="slider clearfix cycle-slideshow"
					data-cycle-slides=".slide"
					data-cycle-fx="scrollHorz"
					data-cycle-swipe="true"
					data-cycle-timeout="0"
				>
				<div class="slide">
					<a href="#" class="boton columna xmall-3 cuadrado chico">
						<i class="fa fa-asterisk"></i>
						Asesoría y asistencia social y condominal
					</a>
					<a href="#" class="boton columna xmall-3 cuadrado chico">
						<i class="fa fa-asterisk"></i>
						Deporte
					</a>
					<a href="#" class="boton columna xmall-3 cuadrado chico">
						<i class="fa fa-asterisk"></i>
						Asesoría y asistencia social y condominal
					</a>
					<a href="#" class="boton columna xmall-3 cuadrado chico">
						<i class="fa fa-asterisk"></i>
						Deporte
					</a>
					<div class="clear"></div>
					<a href="#" class="boton columna xmall-3 cuadrado chico">
						<i class="fa fa-asterisk"></i>
						Asesoría y asistencia social y condominal
					</a>
					<a href="#" class="boton columna xmall-3 cuadrado chico">
						<i class="fa fa-asterisk"></i>
						Deporte
					</a>
					<a href="#" class="boton columna xmall-3 cuadrado chico">
						<i class="fa fa-asterisk"></i>
						Asesoría y asistencia social y condominal
					</a>
					<a href="#" class="boton columna xmall-3 cuadrado chico">
						<i class="fa fa-asterisk"></i>
						Deporte
					</a>
				</div><!-- slide -->
				<div class="slide">
					<a href="#" class="boton columna xmall-3 cuadrado chico">
						<i class="fa fa-asterisk"></i>
						Asesoría y asistencia social y condominal
					</a>
					<a href="#" class="boton columna xmall-3 cuadrado chico">
						<i class="fa fa-asterisk"></i>
						Deporte
					</a>
					<a href="#" class="boton columna xmall-3 cuadrado chico">
						<i class="fa fa-asterisk"></i>
						Asesoría y asistencia social y condominal
					</a>
					<a href="#" class="boton columna xmall-3 cuadrado chico">
						<i class="fa fa-asterisk"></i>
						Deporte
					</a>
					<div class="clear"></div>
					<a href="#" class="boton columna xmall-3 cuadrado chico">
						<i class="fa fa-asterisk"></i>
						Asesoría y asistencia social y condominal
					</a>
					<a href="#" class="boton columna xmall-3 cuadrado chico">
						<i class="fa fa-asterisk"></i>
						Deporte
					</a>
					<a href="#" class="boton columna xmall-3 cuadrado chico">
						<i class="fa fa-asterisk"></i>
						Asesoría y asistencia social y condominal
					</a>
					<a href="#" class="boton columna xmall-3 cuadrado chico">
						<i class="fa fa-asterisk"></i>
						Deporte
					</a>
				</div><!-- slide -->
				<div class="cycle-pager"></div>
			</div>
		</section>
		<div class="clear"></div>
		<hr class="columna xmall-6 center">
		<div class="clear"></div>
		<section class="links clearfix">
			<div class="columna xmall-6">
				<a href="" class="block columna xmall-8 center">
					<img src="<?php echo base_url() ?>assets/img/logo-anticorrupcion.png" alt="">
				</a>
			</div>
			<div class="columna xmall-6">
				<a href="" class="block columna xmall-8 center">
					<img src="<?php echo base_url() ?>assets/img/logo-anticorrupcion.png" alt="">
				</a>
			</div>
		</section>
		<div class="clear"></div>
		<hr class="columna xmall-6 center">
		<div class="clear"></div>
		<section class="pregunta clearfix">
			<h2 class="text-center highlight">Pregunta de la semana</h2>
			<h4 class="text-center">¿Posee usted un teléfono celular?</h4>
			<div class="columna xmall-5 center clearfix">
				<a href="#" class="block boton columna xmall-6 grande">Sí</a>
				<a href="#" class="block boton columna xmall-6 grande">No</a>
			</div>
		</section>
		<div class="clear"></div>
		<hr class="columna xmall-6 center">
		<div class="clear"></div>
		<section class="anuncios clearfix">
			<h2 class="text-center highlight">Anuncios</h2>
			<div class="slider clearfix cycle-slideshow"
				data-cycle-slides=".slide"
				data-cycle-fx="scrollHorz"
				data-cycle-swipe="true"
			>
				<div class="slide">
					<img src="assets/img/anuncio.jpg" alt="">
					<div class="info">
						<p>Quod ea non occurrentia fingunt, vincunt Aristonem; Satisne ergo pudori consulat, si quis sine teste libidini pareat? Quippe: habes enim a rhetoribus;</p>
					</div>
				</div><!-- slide -->
				<div class="slide">
					<img src="assets/img/anuncio.jpg" alt="">
					<div class="info">
						<p>Quid est enim aliud esse versutum? In his igitur partibus duabus nihil erat, quod Zeno commutare gestiret. Tamen aberramus a proposito, et, ne longius, prorsus, inquam, Piso, si ista mala sunt, placet. Duo Reges: constructio interrete. Non igitur de improbo, sed de callido improbo quaerimus, qualis Q. Non laboro, inquit, de nomine. Cupit enim dícere nihil posse ad beatam vitam deesse sapienti. At ille non pertimuit saneque fidenter: Istis quidem ipsis verbis, inquit; Maximas vero virtutes iacere omnis necesse est voluptate dominante. Miserum hominem! Si dolor summum malum est, dici aliter non potest.</p>
					</div>
				</div><!-- slide -->
				<div class="cycle-controls cycle-prev"><i class="fa fa-angle-left"></i></div>
    			<div class="cycle-controls cycle-next"><i class="fa fa-angle-right"></i></div>
			</div>
		</section>

	</div><!-- width -->

</div><!-- main -->