		</div><!-- container -->

		<footer>
			<div class="width">
				<section class="map">
					<div class="columna xmall-2">
						<h5>Servicios</h5>
						<a href="#">Infographics</a>
						<a href="#">Videos</a>
						<a href="#">Web Experiences</a>
					</div>
				</section>
			</div>
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
	<script src="<?php echo base_url() ?>assets/js/functions.js"></script>
	<script src="https://maps.googleapis.com/maps/api/js?v=3.exp"></script>

	<script>
		<?php if($area_atencion != '') { ?>
			getMapas('<?php echo $area_atencion ?>');
		<?php } ?>
	</script>
</html>