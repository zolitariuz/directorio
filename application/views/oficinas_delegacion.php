<div class="main">
	<div class="width">
		<div class="clear"></div>
		<ul class="breadcrumbs">
			<li><a href="<?php echo base_url() ?>"><i class="fa fa-home"></i>Inicio</a></li>
			<li>></li>
			<li><a href="<?php echo base_url().'index.php/instituciones/oficinas_atencion_ciudadana' ?>">Directorio de áreas de atención ciudadana</a></li>
			<li>></li>
			<li class="actual"><?php echo $delegacion ?></li>
		</ul>
		<h2 class="text-center highlight">Oficinas por delegación</h2>
		<div class="tabla j_area_atencion">
			<div class="fila header clearfix">
				<div class="columna xmall-4 text-center">
					Nombre
				</div>
				<div class="columna xmall-5 text-center">
					Dirección
				</div>
				<div class="columna xmall-3 text-center">
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