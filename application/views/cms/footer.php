		</div><!-- container -->

		<footer></footer>
	</body>

	<script src="<?php echo base_url() ?>assets/js/jquery.js"></script>
	<script src="<?php echo base_url() ?>assets/js/plugins.js"></script>
	<script src="<?php echo base_url() ?>assets/js/jquery-ui.min.js"></script>
	<script src="<?php echo base_url() ?>assets/js/functions.js"></script>
	<script>
		// Funciones js para CMS
		<?php if($seccion == 'Agregar contenido') { ?>
			toggleUrlAviso();
			toggleUrlAnuncio();
			$('.datepicker').datepicker({ dateFormat: "yy-mm-dd" });
		<?php } else if ($seccion == 'Editar aviso' || $seccion == 'Editar anuncio' || $seccion == 'Editar pregunta') {  ?>
				$('.datepicker').datepicker({ dateFormat: "yy-mm-dd" });
		<?php } else if ($seccion == 'Ver respuestas') {  ?>
			numRespuestasSiNo('<?php echo $num_si ?>', '<?php echo $num_no ?>');
			porcentajeRespuestasSiNo('<?php echo $si_porcentaje ?>', '<?php echo $no_porcentaje ?>');
		<?php } ?>

		<?php if($nombres_ts != '') { ?>
			agregarTS('<?php echo $nombres_ts ?>', '<?php echo base_url() ?>', '<?php echo $ts_a_omitir ?>');
			eliminarTSSolicitado('<?php echo base_url() ?>');
		<?php } ?>

		
	</script>
</html>