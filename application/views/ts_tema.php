<div class="main">
	<div class="width">
		<div class="clear"></div>
		<h2 class="text-center highlight">Trámites y servicios:  <?php echo $ts_tema[0]->materia; ?></h2>
		<section class="columna full medium-8 center directorio">
			<?php
				if($ts_tema != ''){
					$primeraLetraAnt = '';
					foreach ($ts_tema as $key => $value) {
						$tramite = $value->tramite_servicio;
						$idTS = $value->id_tramite_servicio;
						$urlTramite = base_url().'index.php/tramites_servicios/muestraInfo/'.$idTS;
						$primeraLetra = substr($tramite, 0, 1);

						if($primeraLetra != $primeraLetraAnt){
							if($primeraLetraAnt != ''){
								echo '</ul></div>';
							} ?>
							<div class="letra margin-bottom acordeon-item">
								<a href="#" class="block [ boton boton-acordeon ] margin-bottom">
									<h2><strong><?php echo $primeraLetra; ?></strong> <span></span></h2>
								</a>
								<ul class="hide arabigos inside">
							<?php
							$primeraLetraAnt = $primeraLetra;
						} ?>
						<li class="[ js-count-item ]">
							<a class="highligth" href="<?php echo $urlTramite; ?>">
								<?php echo $tramite; ?>
							</a>
						</li>
					<?php
					} // end foreach
				} else { ?>
					<p>Por el momento no hay trámites registrados para este tema.</p>
				<?php }
			?>
		</section>
		<div class="clear"></div>
	</div><!-- width -->
</div><!-- main -->