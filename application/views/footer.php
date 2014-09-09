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
					<div class="columna xmall-2">
						<h4 class="text-center">066</h4>
						<p class="text-center">Emergencias Secretaría de Seguridad Pública </p>
					</div>
					<div class="columna xmall-2">
						<h4 class="text-center">061</h4>
						<p class="text-center">Emergencias Procuradoría General de Justicia</p>
					</div>
					<div class="columna xmall-2">
						<h4 class="text-center">065</h4>
						<p class="text-center">Cruz Roja</p>
					</div>
					<div class="columna xmall-2">
						<h4 class="text-center">068</h4>
						<p class="text-center">Bomberos</p>
					</div>
					<div class="columna xmall-2">
						<h4 class="text-center">
							5683 1154
							<br/>
							5683 2222
						</h4>
						<p class="text-center">Secretaría de Protección Civil</p>
					</div>
					<div class="columna xmall-2">
						<h4 class="text-center">5658 1111</h4>
						<p class="text-center">LOCATEL</p>
					</div>
				</div><!-- width -->
			</section>
		</footer>
		<div class="back-to-top when-scrolled">
			<i class="fa fa-chevron-up"></i>
		</div>
		<div class="overlay-opener js-overlay-opener when-scrolled">
			<i class="fa fa-search"></i>
		</div>
		<div class="modal-wrapper hide">
			<div class="modal">
				<div class="cerrar">
					<span class="fa-stack">
						<i class="fa fa-circle fa-stack-2x"></i>
						<i class="fa fa-times fa-stack-1x fa-inverse"></i>
					</span>
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
						<form class="main-search hero clearfix main-search-home" action="#">
							<input type="search" class="span xmall-11">
							<input type="hidden" name="tags_id" id="ts_home_id" value="x" />
							<button type="submit" class="span xmall-1"><i class="fa fa-search"></i></button>
						</form>
						<h3 class="text-center">O ve trámites y servicios por:</h3>
						<div class="columna xmall-8 center">
							<a href="<?php echo base_url().'index.php/instituciones' ?>" class="block boton vertical columna xmall-6">
								<i class="fa fa-asterisk"></i>
								Institución
							</a>
							<a href="<?php echo base_url().'index.php/temas' ?>" class="block boton vertical columna xmall-6">
								<i class="fa fa-asterisk"></i>
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
		<?php if($area_atencion != '') { ?>
			getMapas('<?php echo $area_atencion ?>');
		<?php } ?>

		<?php if($nombres_ts != '') { ?>
			busquedaTS('<?php echo $nombres_ts ?>');
		<?php } ?>

		<?php if($seccion == 'Inicio') { ?>
			votoPregunta('<?php echo base_url() ?>');
		<?php } ?>
	</script>
</html>