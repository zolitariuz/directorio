			</div><!-- container -->
		<footer>
			<div class="width">
				<?php if($_SESSION['is_admin'] == 't') { ?>
					<a href="<?php echo base_url().'index.php/gestor_contenidos/agregar_contenido/'?>">
						<i class="icon-ts-icon-filled-agregar-contenido"></i>
						<!-- <i class="icon-ts-icon-filled-agregar-contenido"></i> -->
						Agregar contenido
					</a><a href="<?php echo base_url().'index.php/gestor_contenidos/agregar_usuario/'?>">
						<i class="icon-ts-icon-filled-agregar-usuario"></i>
						Agregar usuario
					</a><?php } ?><a href="<?php echo base_url().'index.php/gestor_contenidos/editar_contenido/'?>">
					<i class="icon-ts-icon-filled-editar-contenido"></i>
					Editar contenido
				</a><a href="<?php echo base_url().'index.php/gestor_contenidos/mas_solicitados/'?>">
					<i class="icon-ts-icon-filled-tramites-mas-buscados"></i>
					Trámites y servicios mas solicitados
				</a><a href="<?php echo base_url().'index.php/gestor_contenidos/panel_reportes/'?>">
					<i class="icon-ts-icon-filled-reportes"></i>
					Reportes
				</a>
			</div>
		</footer>
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

		<?php if ($seccion == 'Editar anuncio') ?>
				toggleSubirImagen();

		<?php } else if ($seccion == 'Ver respuestas') {  ?>
			Chart.defaults.global.responsive = true;
			numRespuestasSiNo('<?php echo $num_si ?>', '<?php echo $num_no ?>');
			porcentajeRespuestasSiNo('<?php echo $si_porcentaje ?>', '<?php echo $no_porcentaje ?>');

		<?php } else if ($seccion == 'Panel reportes') {  ?>
			Chart.defaults.global.responsive = true;
			agregarTSReportes('<?php echo $nombres_ts ?>', '<?php echo base_url() ?>');
		<?php } ?>

		<?php if($nombres_ts != '') { ?>
			agregarTS('<?php echo $nombres_ts ?>', '<?php echo base_url() ?>', '<?php echo $ts_a_omitir ?>');
			eliminarTSSolicitado('<?php echo base_url() ?>');
		<?php } ?>


	</script>
</html>