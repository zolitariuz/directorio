<div class="main">
	<div class="width">
		<div class="clear"></div>
		<div class="clear"></div>
		<section class="mas-comunes clearfix">
			<h2 class="text-center highlight">Trámites y servicios</h2>
			<h2 class="text-center highlight"><?php echo $ts_institucion[0]->institucion; ?></h2>
				<?php 
				$primeraLetraAnt = '';
				foreach ($ts_institucion as $key => $value) {
					
					$tramite = $value->tramite_servicio;
					$idTS = $value->id_tramite_servicio;
					$urlTramite = base_url().'index.php/inicio/muestraTramiteServicio/'.$idTS; 
					$primeraLetra = substr($tramite, 0, 1);

					if($primeraLetra != $primeraLetraAnt){
						if($primeraLetraAnt != ''){
							echo '</div>';
							echo '<div class="clear"></div>';
						}

						echo '<h2 class="highlight text-center"><strong>'.$primeraLetra.'</strong></h2>';
						echo '<div class="clear"></div>';
						echo '<div class="">';
						$primeraLetraAnt = $primeraLetra;
					}
					?>
					<a href="<?php echo $urlTramite; ?>" class="block boton full margin-bottom">
					<?php echo $tramite; ?>
					</a>
					
				<?php 
				} // end foreach 
				?>
		</section>
		<div class="clear"></div>
	</div><!-- width -->
</div><!-- main -->