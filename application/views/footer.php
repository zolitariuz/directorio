		</div><!-- container -->

		<footer>
			<section class="map">
				<div class="width clearfix">
					<div class="columna xmall-2">
						<article>
							<h5>Servicios</h5>
							<a href="#">Infographics</a>
							<a href="#">Videos</a>
							<a href="#">Web Experiences</a>
						</article>
						<article>
							<h5>Recursos</h5>
							<a href="#">Infographics</a>
							<a href="#">Videos</a>
						</article>
					</div>
					<div class="columna xmall-2">
						<article>
							<h5>Servicios</h5>
							<a href="#">Infographics</a>
							<a href="#">Videos</a>
							<a href="#">Web Experiences</a>
							<a href="#">Web Experiences</a>
							<a href="#">Web Experiences</a>
						</article>
						<article>
							<h5>Recursos</h5>
							<a href="#">Infographics</a>
							<a href="#">Videos</a>
						</article>
					</div>
					<div class="columna xmall-2">
						<article>
							<h5>Servicios</h5>
							<a href="#">Infographics</a>
							<a href="#">Videos</a>
							<a href="#">Web Experiences</a>
						</article>
					</div>
					<div class="columna xmall-4 right">
						<img class="columna xmall-7" src="<?php echo base_url() ?>assets/img/cgma-gray.png" alt="">
						<img class="columna xmall-3 right" src="<?php echo base_url() ?>assets/img/om-gray.png" alt="">
						<div class="clear"></div>
						<img class="columna xmall-5" src="<?php echo base_url() ?>assets/img/pides-gray.png" alt="">
						<img class="columna xmall-5 right" src="<?php echo base_url() ?>assets/img/ebm-gray.png" alt="">
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
	</body>

	<script src="<?php echo base_url() ?>assets/js/jquery.js"></script>
	<script src="<?php echo base_url() ?>assets/js/plugins.js"></script>
	<script src="<?php echo base_url() ?>assets/js/jquery-ui.min.js"></script>
	<script src="<?php echo base_url() ?>assets/js/functions.js"></script>
	<script src="https://maps.googleapis.com/maps/api/js?v=3.exp"></script>

	<script>
		<?php

		if($area_atencion != '') { ?>
			getMapas('<?php echo $area_atencion ?>');
		<?php } ?>
		busquedaTS('<?php echo $nombres_ts ?>');
	</script>
</html>