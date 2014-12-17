<div class="main">
	<div class="width">
		<div class="clear"></div>
		<div class="[ breadcrumbs ] [ margin-bottom-big ]">
			<span><a href="<?php echo base_url() ?>"><i class="fa fa-home"></i>Inicio</a></span>
			<span>></span>
			<span class="actual">Directorio de áreas de atención ciudadana</span>
		</div><!-- .breadcrumbs -->
		<section class="[ clearfix ]">
			<h2 class="text-center highlight">Áreas de atención ciudadana por delegación</h2>
			<div class="[ text-center ]">
			<?php foreach ($delegaciones as $key => $value) {
				$delegacion = $value->delegacion;
				$urlDelegacion = base_url().'instituciones/muestraOficinasDelegacion/'.$delegacion;
			?>
				<a href="<?php echo $urlDelegacion; ?>" class="[ boton ] [ inline-block margin-bottom-small ]">
					<?php echo $delegacion; ?>
				</a>
			<?php } // end foreach ?>
			</div><!-- .text-center -->
		</section>
		<div class="clear"></div>
	</div><!-- width -->
</div><!-- main -->
