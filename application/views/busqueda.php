<div class="main">
	<div class="width">
		<div class="clear"></div>
		<div class="[ breadcrumbs ] [ margin-bottom-big ]">
			<span><a href="<?php echo base_url() ?>"><i class="fa fa-home"></i>Inicio</a></span>
			<span>></span>
			<span class="actual">Resultados</span>
		</div><!-- .breadcrumbs -->
		<section class="[ columna full medium-8 ] [ center ] [ directorio ]">
			<h2 class="text-center highlight"><?php echo $num_resultados ?> resultados para: <?php echo $palabra_clave ?></h2>
			<?php 
				if($resultados != ''){
					foreach ($resultados as $key => $resultado) {
						echo '<a href="/directorio/tramites_servicios/muestraInfo/'.$resultado->id_tramite_servicio.'">'.$resultado->nombre_tramite.'</a>';
					}
				}
			?>
			
		</section>
		<div class="clear"></div>
	</div><!-- width -->
</div><!-- main -->
