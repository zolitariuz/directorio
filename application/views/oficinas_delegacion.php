<div class="main">
	<div class="width">
		<div class="clear"></div>
		<div class="[ breadcrumbs ] [ margin-bottom-big ]">
			<span><a href="<?php echo base_url() ?>"><i class="fa fa-home"></i>Inicio</a></span>
			<span>></span>
			<span><a href="<?php echo base_url().'index.php/instituciones/oficinas_atencion_ciudadana' ?>">Directorio de áreas de atención ciudadana</a></span>
			<span>></span>
			<span class="actual"><?php echo $delegacion ?></span>
		</div><!-- .breadcrumbs -->
		<h2 class="text-center highlight">Oficinas por delegación</h2>
		<div class="tabla j_area_atencion">
			<div class="fila header clearfix">
				<div class="[ columna xmall-6 medium-3 ]">
					Nombre
				</div>
				<div class="[ columna xmall-6 medium-4 ]">
					Dirección
				</div>
				<div class="[ columna xmall-6 medium-3 ]">
					Horarios
				</div>
				<div class="[ columna xmall-6 medium-2 ]">
					Teléfonos
				</div>
			</div>
			<div class="clear"></div>
		</div><!-- tabla -->
		<div class="[ map-wrapper ] [ margin-bottom ]">
			<div id="map"></div>
		</div>
		<div class="clear"></div>
	</div><!-- width -->
</div><!-- main -->
