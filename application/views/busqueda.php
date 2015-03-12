<div class="main">
	<div class="width">
		<div class="clear"></div>
		<div class="[ breadcrumbs ] [ margin-bottom-big ]">
			<span><a href="<?php echo base_url() ?>"><i class="fa fa-home"></i>Inicio</a></span>
			<span>></span>
			<span class="actual">Resultados</span>
		</div><!-- .breadcrumbs -->
		<section class="[ columna full medium-8 ][ center ][ directorio ]">
			<h2 class="text-center highlight"><?php echo $num_resultados ?> resultados para: <?php echo $palabra_clave ?></h2>
			<ul class="[ arabigos ]">
				<?php
					if($resultados != ''){
						$resultados_por_pagina = 5;
						$pagina_actual = 1;
						foreach ($resultados as $key => $resultado) { 
							if($key == 0) echo '<article class="[ page ][ page-'.$pagina_actual.' ]">';
							if($key%$resultados_por_pagina == 0 && $key > 0) {
								$pagina_actual += 1;
								echo '</article>';
								echo '<article class="[ page ][ page-'.$pagina_actual.' ][ hide ]">';
							}
				?>

							<li>
								<a href="<?php echo base_url() ?>/index.php/tramites_servicios/muestraInfo/<?php echo $resultado->id_tramite_servicio; ?>" class="[ margin-bottom-small ]">
									<?php echo $resultado->nombre_tramite; ?>
								</a>
							</li>
						<?php }
						echo '</article>';
					}
				?>
			</ul>
		</section>
		<div class="clear"></div>
	</div><!-- width -->
</div><!-- main -->
