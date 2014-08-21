<div class="main">
	<div class="width">
		<div class="clear"></div>
		<div class="clear"></div>
		<section class="mas-comunes clearfix">
			<h2 class="text-center highlight">Trámites y servicios más solicitados</h2>
			
				<?php 
				$primeraLetraAnt = '';
				foreach ($ts_tema as $key => $value) {
					$primeraLetra = substr($tramite, 0, 1);
					if($primeraLetra != $primraLetraAnt){
						if($primeraLetraAnt != '')
							echo '</div>';

						echo '<h3>'.$primeraLetra.'</h3>';
						echo '<div class="masonry-container">';
						$primeraLetraAnt = $primeraLetra;
					}

					$tramite = $value->tramite_servicio;
					$idTS = $value->id_tramite_servicio;
					$urlTramite = base_url().'index.php/inicio/muestraTramiteServicio/'.$idTS; 
					?>
					<a href="<?php echo $urlTramite; ?>" class="item boton columna large-3">
					<?php echo $tramite; ?>
					</a>
					
				<?php 
				} // end foreach 
				?>
		</section>
		<div class="clear"></div>
	</div><!-- width -->
</div><!-- main -->