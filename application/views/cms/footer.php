		</div><!-- container -->

		<footer></footer>
	</body>

	<script src="<?php echo base_url() ?>assets/js/jquery.js"></script>
	<script src="<?php echo base_url() ?>assets/js/plugins.js"></script>
	<script src="<?php echo base_url() ?>assets/js/jquery-ui.min.js"></script>
	<script src="<?php echo base_url() ?>assets/js/functions.js"></script>
	<script>
		<?php if($seccion == 'Agregar contenido') { ?>
				toggleUrlAviso();
				toggleUrlAnuncio();
				$('.datepicker').datepicker({ dateFormat: "yy-mm-dd" });
		<?php } else if ($seccion == 'Editar aviso' || $seccion == 'Editar anuncio' || $seccion == 'Editar pregunta') {  ?>
				$('.datepicker').datepicker({ dateFormat: "yy-mm-dd" });
		<?php } ?>
	</script>
</html>