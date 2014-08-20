<div class="main">

	<div class="width">
		<?php
			// Mostrar error en caso de búsqueda
			// de trámite o servicio inválida
			if($error == '1')
				echo '<p>No se encontró el trámite o servicio que estabas buscando</p>';
		?>
		<section class="main-busqueda clearfix">
			<h2 class="text-center">Buscar tu trámite o servicio</h2>
			<form class="main-search hero clearfix" action="#">
				<input type="text" class="span xmall-10">
				<button type="submit" class="span xmall-2"><i class="fa fa-search"></i></button>
			</form>
			<h3 class="text-center">O busca por:</h3>
			<a href="#" class="block boton columna xmall-4">
				<i class="fa fa-asterisk"></i>
				Institución
			</a>
			<a href="#" class="block boton columna xmall-4">
				<i class="fa fa-asterisk"></i>
				Tema
			</a>
		</section><!-- main-busqueda -->
		<div class="clear"></div>
		<hr class="columna xmall-6 center">
		<div class="clear"></div>
		<section class="mas-comunes clearfix">
			<h2 class="text-center">Trámites y servicios más solicitados</h2>
			<div class="isotope">
				<?php foreach ($servicios_mas_buscados as $key => $value) {
					$tramite = $value->nombre_ts;
					$idTS = $value->id_tramite_servicio;
					$urlTramite = base_url().'index.php/inicio/muestraTramiteServicio/'.$idTS; ?>
					<a href="<?php echo $urlTramite; ?>" class="item boton">
						<?php echo $tramite; ?>
					</a>
				<?php } // end foreach ?>
			</div>
		</section>
		<div class="clear"></div>
		<hr class="columna xmall-6 center">
		<div class="clear"></div>
		<section class="categorias clearfix">
			<h2 class="text-center">Categorías</h2>
			<div class="slider clearfix">
				<a href="#" class="boton columna xmall-2">
					<i class="fa fa-asterisk"></i>
					Asesoría y asistencia social y condominal
				</a>
				<a href="#" class="boton columna xmall-2">
					<i class="fa fa-asterisk"></i>
					Deporte
				</a>
				<a href="#" class="boton columna xmall-2">
					<i class="fa fa-asterisk"></i>
					Asesoría y asistencia social y condominal
				</a>
				<a href="#" class="boton columna xmall-2">
					<i class="fa fa-asterisk"></i>
					Deporte
				</a>
				<a href="#" class="boton columna xmall-2">
					<i class="fa fa-asterisk"></i>
					Asesoría y asistencia social y condominal
				</a>
				<a href="#" class="boton columna xmall-2">
					<i class="fa fa-asterisk"></i>
					Deporte
				</a>
				<a href="#" class="boton columna xmall-2">
					<i class="fa fa-asterisk"></i>
					Asesoría y asistencia social y condominal
				</a>
				<a href="#" class="boton columna xmall-2">
					<i class="fa fa-asterisk"></i>
					Deporte
				</a>
				<a href="#" class="boton columna xmall-2">
					<i class="fa fa-asterisk"></i>
					Asesoría y asistencia social y condominal
				</a>
				<a href="#" class="boton columna xmall-2">
					<i class="fa fa-asterisk"></i>
					Deporte
				</a>
				<a href="#" class="boton columna xmall-2">
					<i class="fa fa-asterisk"></i>
					Asesoría y asistencia social y condominal
				</a>
				<a href="#" class="boton columna xmall-2">
					<i class="fa fa-asterisk"></i>
					Deporte
				</a>
			</div>
		</section>
		<div class="clear"></div>
		<hr class="columna xmall-6 center">
		<div class="clear"></div>
		<section class="links">
			<a href="" class="block columna xmall-6">
				<img src="images/logo-anticorrupcion.png" alt="">
			</a>
			<a href="" class="block columna xmall-6">
				<img src="images/logo-ssac.png" alt="">
			</a>
		</section>
		<div class="clear"></div>
		<hr class="columna xmall-6 center">
		<div class="clear"></div>
		<section class="pregunta clearfix">
			<h2 class="text-center">Pregunta de la semana</h2>
			<h4>¿Posee usted un teléfono celular?</h4>
			<div class="columna xmall-4 center">
				<a href="#" class="block boton columna xmall-6">Sí</a>
				<a href="#" class="block boton columna xmall-6">No</a>
			</div>
		</section>
		<div class="clear"></div>
		<hr class="columna xmall-6 center">
		<div class="clear"></div>
		<section class="pregunta clearfix">
			<h2 class="text-center">Anuncios</h2>
			<div class="slider">
				<img src="images/anuncio.jpg" alt="">
				<div class="info">
					<p>Quod ea non occurrentia fingunt, vincunt Aristonem; Satisne ergo pudori consulat, si quis sine teste libidini pareat? Quippe: habes enim a rhetoribus;</p>
				</div>
			</div>
		</section>

	</div><!-- width -->

</div><!-- main -->