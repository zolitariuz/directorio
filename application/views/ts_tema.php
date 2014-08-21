<div class="main">
	<div class="width">
		<div class="clear"></div>
		<div class="clear"></div>
		<section class="mas-comunes clearfix">
			<h2 class="text-center highlight">Trámites y servicios:  <?php echo $ts_tema[0]->materia; ?></h2>
				<?php 
				$primeraLetraAnt = '';
				foreach ($ts_tema as $key => $value) {
					
					$tramite = $value->tramite_servicio;
					$idTS = $value->id_tramite_servicio;
					$urlTramite = base_url().'index.php/inicio/muestraTramiteServicio/'.$idTS; 
					$primeraLetra = substr($tramite, 0, 1);

					if($primeraLetra != $primeraLetraAnt){
						if($primeraLetraAnt != ''){
							echo '</div>';
							echo '<div class="clear"></div>';
						}

						echo '<h3>'.$primeraLetra.'</h3>';
						echo '<div class="clear"></div>';
						echo '<div class="masonry-container">';
						$primeraLetraAnt = $primeraLetra;
					}
					?>
					<a href="<?php echo $urlTramite; ?>" class="item boton columna large-12 no-margin-bottom">
					<?php echo $tramite; ?>
					</a>
					
				<?php 
				} // end foreach 
				?>
		</section>
		<div class="clear"></div>
	</div><!-- width -->
</div><!-- main -->