		</div><!-- container -->
		<footer>
			<section class="logos">
				<div class="width clearfix">
					<div class="">
						<img class="block center" src="<?php echo base_url() ?>assets/img/om-gray.png" alt="">
					</div><div class="">
						<img class="block center" src="<?php echo base_url() ?>assets/img/cgma-gray.png" alt="">
					</div><div class="">
						<img class="block center" src="<?php echo base_url() ?>assets/img/pides-gray.png" alt="">
					</div><div class="">
						<img class="block center" src="<?php echo base_url() ?>assets/img/ebm-gray.png" alt="">
					</div>
				</div><!-- width -->
			</section>
			<section class="emergencia">
				<div class="width clearfix">
					<div class="columna xmall-6 large-2">
						<i class="icon-ts-icon-filled-emergencias-secretaria-de-seguridad-publica"></i>
						<h4 class="text-center large">066</h4>
						<h4 class="text-center no-large"><a href="tel: 066">066</a></h4>
						<p class="text-center">Emergencias Secretaría de Seguridad Pública </p>
					</div>
					<div class="columna xmall-6 large-2">
						<i class="icon-ts-icon-filled-emergencias-procuradoria-general-de-justicia"></i>
						<h4 class="text-center large">061</h4>
						<h4 class="text-center no-large"><a href="tel: 061">061</a></h4>
						<p class="text-center">Emergencias Procuradoría General de Justicia</p>
					</div>
					<div class="columna xmall-6 large-2">
						<i class="icon-ts-icon-filled-cruzroja"></i>
						<h4 class="text-center large">065</h4>
						<h4 class="text-center no-large"><a href="tel: 065">065</a></h4>
						<p class="text-center">Cruz Roja</p>
					</div>
					<div class="columna xmall-6 large-2">
						<i class="icon-ts-icon-filled-bomberos"></i>
						<h4 class="text-center large">068</h4>
						<h4 class="text-center no-large"><a href="tel: 068">068</a></h4>
						<p class="text-center">Bomberos</p>
					</div>
					<div class="columna xmall-6 large-2">
						<i class="icon-ts-icon-filled-secretaria-de-proteccion-civil"></i>
						<h4 class="text-center large">
							5683 1154
							<br/>
							<small>5683 2222</small>
						</h4>
						<h4 class="text-center no-large">
							<a href="tel: 5683-1154">5683 1154</a>
							<br/>
							<small><a href="tel: 5683-2222">5683 2222</a></small>
						</h4>
						<p class="text-center">Secretaría de Protección Civil</p>
					</div>
					<div class="columna xmall-6 large-2">
						<i class="icon-ts-icon-filled-locatel"></i>
						<h4 class="text-center large">5658 1111</h4>
						<h4 class="text-center no-large"><a href="tel: 5658-1111">5658 1111</a></h4>
						<p class="text-center">LOCATEL</p>
					</div>
				</div><!-- width -->
			</section>
		</footer>
		<div class="large back-to-top when-scrolled">
			<i class="fa fa-chevron-up"></i>
		</div>
		<div class="large overlay-opener js-overlay-opener when-scrolled">
			<i class="fa fa-search"></i>
		</div>
		<div class="modal-wrapper hide">
			<div class="modal">
				<div class="cerrar">
					<i class="fa fa-times"></i>
				</div>
				<div class="modal-content">
				</div>
			</div>
		</div>
		<div class="overlay-wrapper hide">
			<div class="overlay">
				<div class="overlay-content">
					<section class="busqueda clearfix">
						<h2 class="text-center">Busca tu trámite o servicio</h2>
						<form class="main-search hero clearfix main-search-footer" action="#">
							<input type="search" class="span xmall-11">
							<input type="hidden" name="tags_id" id="ts_footer_id" value="x" />
							<button type="submit" class="span xmall-1"><i class="fa fa-search"></i></button>
						</form>
						<h3 class="text-center">O ve trámites y servicios por:</h3>
						<div class="columna xmall-12 medium-8 center clearfix">
							<a  class="block boton vertical columna xmall-12 medium-6 margin-bottom" href="<?php echo base_url().'index.php/instituciones' ?>">
								<i class="icon-ts-icon-filled-instituciones"></i>
								Institución
							</a>
							<a class="block boton vertical columna xmall-12 medium-6 margin-bottom" href="<?php echo base_url().'index.php/temas' ?>">
								<i class="icon-ts-icon-filled-temas"></i>
								Tema
							</a>
						</div>
					</section><!-- busqueda -->
				</div>
			</div>
			<div class="cerrar">
				<i class="fa fa-times"></i>
			</div>
		</div>
	</body>

	<script src="<?php echo base_url() ?>assets/js/jquery.js"></script>
	<script src="<?php echo base_url() ?>assets/js/plugins.js"></script>
	<script src="<?php echo base_url() ?>assets/js/jquery-ui.min.js"></script>
	<script src="<?php echo base_url() ?>assets/js/functions.js"></script>
	<script src="https://maps.googleapis.com/maps/api/js?v=3.exp"></script>
	<script>
		<?php if($area_atencion != '' && $seccion != 'Oficina por institución') { ?>
			getMapas('<?php echo $area_atencion ?>');
		<?php } ?>

		<?php if($nombres_ts != '') { ?>
			busquedaTS('<?php echo $nombres_ts ?>', '<?php echo base_url() ?>');
		<?php } ?>

		<?php if($seccion == 'Inicio') { ?>
			votoPregunta('<?php echo base_url() ?>');
			scrollHeader('.main-search');

			//*** ON SCROLL ***//
			$(window).scroll(function() {
				scrollHeader('.main-search');
			});
		<?php }

		if($seccion == 'Tramite') { ?>
			scrollHeader('aside .busqueda');

			//*** ON SCROLL ***//
			$(window).scroll(function() {
				scrollHeader('aside .busqueda');
			});
		<?php }

		if($seccion == 'Temas') { ?>
			scrollHeader('header');

			//*** ON SCROLL ***//
			$(window).scroll(function() {
				scrollHeader('header');
			});
		<?php }

		if($seccion == 'Instituciones') { ?>
			scrollHeader('header');

			//*** ON SCROLL ***//
			$(window).scroll(function() {
				scrollHeader('header');
			});
		<?php } ?>
	</script>
</html>