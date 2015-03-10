			</div><!-- container -->
		<footer>
			<div class="width">
				<nav class="[ large ]">
					<?php if($_SESSION['is_admin'] == 't') { ?>
						<a href="<?php echo base_url().'index.php/gestor_contenidos/agregar_contenido/'?>">
							<i class="icon-ts-agregar-contenido"></i>
							<!-- <i class="icon-ts-agregar-contenido"></i> -->
							Agregar contenido
						</a><a href="<?php echo base_url().'index.php/gestor_contenidos/administrar_usuarios/'?>">
							<i class="icon-ts-agregar-usuario"></i>
							Administrar usuarios
						</a><?php } ?><a href="<?php echo base_url().'index.php/gestor_contenidos/editar_contenido/'?>">
						<i class="icon-ts-editar-contenido"></i>
						Editar contenido
					</a><a href="<?php echo base_url().'index.php/gestor_contenidos/mas_solicitados/'?>">
						<i class="icon-ts-tramites-mas-buscados"></i>
						Trámites y servicios mas solicitados
					</a><a href="<?php echo base_url().'index.php/gestor_contenidos/panel_reportes/'?>">
						<i class="icon-ts-reportes"></i>
						Reportes
					</a>
				</div><!-- large -->
				<div class="width">
					<div class="[ menu ] [ no-large ] [ full ] [ text-right ]">
						<i class="[ fa fa-bars ]"></i>
					</div>
				</div>
			</nav>
			<?php if($_SESSION['is_admin'] == 't') { ?>
				<nav class="[ no-large ]">
					<a href="<?php echo base_url().'index.php/gestor_contenidos/agregar_contenido/'?>">
						<i class="icon-ts-agregar-contenido"></i>
						<!-- <i class="icon-ts-agregar-contenido"></i> -->
						Agregar contenido
					</a><a href="<?php echo base_url().'index.php/gestor_contenidos/administrar_usuarios/'?>">
						<i class="icon-ts-agregar-usuario"></i>
						Administrar usuarios
				</a><?php } ?><a href="<?php echo base_url().'index.php/gestor_contenidos/editar_contenido/'?>">
				<i class="icon-ts-editar-contenido"></i>
				Editar contenido
				</a><a href="<?php echo base_url().'index.php/gestor_contenidos/mas_solicitados/'?>">
					<i class="icon-ts-tramites-mas-buscados"></i>
					Trámites y servicios mas solicitados
				</a><a href="<?php echo base_url().'index.php/gestor_contenidos/panel_reportes/'?>">
					<i class="icon-ts-reportes"></i>
					Reportes
				</a>
			</nav>
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
			setLimitDate('.js-validate-aviso, .js-validate-pregunta, .js-validate-anuncio');
		<?php }

			if ($seccion == 'Editar aviso'){ ?>
				setLimitDate('.js-validate-aviso');
			<?php }

			if ($seccion == 'Editar pregunta'){ ?>
				setLimitDate('.js-validate-pregunta');
			<?php }

			if ($seccion == 'Editar anuncio'){ ?>
				toggleSubirImagen();
				setLimitDate('.js-validate-anuncio');
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
