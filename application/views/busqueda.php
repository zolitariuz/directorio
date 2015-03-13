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

			<?php
				if($resultados != ''){
					$resultados_por_pagina = 10;
			?>
				<div class="[ text-center ][ margin-bottom ]">
					<a href="" class="[ boton ][ paginacion paginacion-anterior ][ hide ]">
						Anteriores
					</a>
					&nbsp;
					<?php if ( $num_resultados > $resultados_por_pagina ){ ?>
						<a href="" class="[ boton ][ paginacion paginacion-siguiente ]">
							Siguientes
						</a>
					<?php } ?>

				</div>
				<ul class="[ none ]">
				<?php

					$pagina_actual         = 1;
					$total_pages           = ceil( count($resultados) / $resultados_por_pagina );

					//echo $total_pages;
					foreach ($resultados as $key => $resultado) {
						if($key == 0) echo '<article class="[ page page-active page-inicial ]" data-paso="'.$pagina_actual.'">';
						if($key%$resultados_por_pagina == 0 && $key > 0) {
							$pagina_actual += 1;
							echo '</article>';
							echo '<article class="[ page ][ hide ][ '.(( $pagina_actual == $total_pages )?"page-final":"").' ]"  data-paso="'.$pagina_actual.'">';
						}
				?>

							<li>
								<?php echo ($key+1).'.- '; ?>
								<a href="<?php echo base_url() ?>index.php/tramites_servicios/muestraInfo/<?php echo $resultado->id_tramite_servicio; ?>" class="[ margin-bottom-small ]">
									<?php echo $resultado->nombre_tramite; ?>
								</a>
							</li>
						<?php }
						echo '</article></ul>';
					}
				?>
		</section>
		<div class="clear"></div>
	</div><!-- width -->
</div><!-- main -->
