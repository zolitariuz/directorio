<div class="main">
	<div class="width">
		<div class="clear"></div>
		<h2 class="text-center highlight">Trámites y servicios</h2>
		<h2 class="text-center highlight"><?php echo $ts_institucion[0]->institucion; ?></h2>
		<section class="columna full medium-8 center directorio">
			<?php
				$primeraLetraAnt = '';
				foreach ($ts_institucion as $key => $value) {
					$tramite = $value->tramite_servicio;
					$idTS = $value->id_tramite_servicio;
					$urlTramite = base_url().'index.php/tramites_servicios/muestraInfo/'.$idTS;
					$primeraLetra = substr($tramite, 0, 1);

					if($primeraLetra != $primeraLetraAnt){
						if($primeraLetraAnt != ''){
							echo '</ul></div>';
						} ?>
						<div class="letra margin-bottom acordeon-item">
							<a href="#" class="block boton margin-bottom">
								<h2><strong><?php echo $primeraLetra; ?></strong> <span></span></h2>
							</a>
							<ul class="hide arabigos">
						<?php
						$primeraLetraAnt = $primeraLetra;
					}
				?>
				<li>
					<a class="highligth" href="<?php echo $urlTramite; ?>">
						<?php echo $tramite; ?>
					</a>
				</li>
			<?php
				} // end foreach
			?>
		</section>
		<div class="clear"></div>
	</div><!-- width -->
</div><!-- main -->