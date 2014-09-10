			</div><!-- container -->
		<footer>
			<div class="width">
				<?php if($_SESSION['is_admin'] == 't') { ?>
					<a href="<?php echo base_url().'index.php/gestor_contenidos/agregar_contenido/'?>">
						<i class="icon-ts-icon-line-agregar-contenido"></i>
						<!-- <i class="icon-ts-icon-fill-agregar-contenido"></i> -->
						Agregar contenido
					</a><a href="<?php echo base_url().'index.php/gestor_contenidos/agregar_usuario/'?>">
						<i class="icon-ts-icon-fill-agregar-usuario"></i>
						Agregar usuario
					</a><?php } ?><a href="<?php echo base_url().'index.php/gestor_contenidos/editar_contenido/'?>">
					<i class="icon-ts-icon-fill-editar-contenido"></i>
					Editar contenido
				</a><a href="<?php echo base_url().'index.php/gestor_contenidos/mas_solicitados/'?>">
					<i class="icon-ts-icon-fill-tramites-y-servicios-mas-solicitados"></i>
					Trámites y servicios mas solicitados
				</a><a href="<?php echo base_url().'index.php/gestor_contenidos/ver_contenido/'?>">
					<i class="icon-ts-icon-fill-reportes"></i>
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