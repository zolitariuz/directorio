<div class="main">
	<div class="width">
		<div class="clear"></div>
		<ul class="breadcrumbs">
			<li><a href="<?php echo base_url() ?>"><i class="fa fa-home"></i>Inicio</a></li>
			<li>></li>
			<li class="actual">Directorio de áreas de atención ciudadana</li>
		</ul>
		<section class="mas-comunes clearfix">
			<h2 class="text-center highlight">Áreas de atención ciudadana por delegación</h2>
			<div class="masonry-container">
			<?php foreach ($delegaciones as $key => $value) {
				$delegacion = $value->delegacion;
				$urlDelegacion = base_url().'instituciones/muestraOficinasDelegacion/'.$delegacion;
			?>
				<a href="<?php echo $urlDelegacion; ?>" class="item boton columna full medium-4 large-3 margin-bottom">
					<?php echo $delegacion; ?>
				</a>
			<?php } // end foreach ?>
			</div>
		</section>
		<div class="clear"></div>
	</div><!-- width -->
</div><!-- main -->