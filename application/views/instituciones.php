<div class="main">

	<div class="width">
		<div class="clear"></div>
		<div class="clear"></div>
		<section class="mas-comunes clearfix">
			<h2 class="text-center highlight">Instituciones</h2>
			<div class="masonry-container">
			<?php foreach ($instituciones as $key => $value) {
				$institucion = $value->institucion;
				$idInstitucion = $value->id_cat_institucion;
				$urlInstitucion = base_url().'index.php/instituciones/muestraTS/'.$idInstitucion;
			?>
				<a href="<?php echo $urlInstitucion; ?>" class="item boton columna large-3 medium-4 margin-bottom">
					<?php echo $institucion; ?>
				</a>
			<?php } // end foreach ?>
			</div>
		</section>
		<div class="clear"></div>
	</div><!-- width -->
</div><!-- main -->