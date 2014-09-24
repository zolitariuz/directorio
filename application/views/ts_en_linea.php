<div class="main">

	<div class="width">
		<div class="clear"></div>
		<ul class="breadcrumbs">
			<li><a href="<?php echo base_url() ?>"><i class="fa fa-home"></i>Inicio</a></li>
			<li>></li>
			<li class="actual">Instituciones</li>
		</ul>
		<section class="mas-comunes clearfix">
			<h2 class="text-center highlight">Trámites y servicios en linea</h2>
			<div class="masonry-container">
			<?php foreach ($instituciones as $key => $value) {
				$institucion = $value->institucion;
				$idInstitucion = $value->id_cat_institucion;
				$urlInstitucion = base_url().'index.php/instituciones/muestraOficinasInstitucion/'.$idInstitucion;
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