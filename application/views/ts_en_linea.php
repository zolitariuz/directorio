<div class="main">

	<div class="width">
		<div class="clear"></div>
		<ul class="breadcrumbs">
			<li><a href="<?php echo base_url() ?>"><i class="fa fa-home"></i>Inicio</a></li>
			<li>></li>
			<li class="actual">Trámites y servicios en línea</li>
		</ul>
		<section class="mas-comunes clearfix">
			<h2 class="text-center highlight">Trámites y servicios en linea</h2>
			<div class="masonry-container">
				<?php
				foreach ($ts_en_linea as $key => $value) {
					$id = $value->id_tramite_servicio;
					$nombre = $value->nombre_tramite;
					$urlTramite = base_url().'index.php/tramites_servicios/muestraInfo/'.$id.'#ts_en_linea';
				?>
					<a class="[ item ] [ boton ] [ columna large-4 ]" href="<?php echo $urlTramite ?>"><?php echo $nombre ?></a>
				<?php } ?>
			</div><!-- masonry-container -->
		</section>
		<div class="clear"></div>
	</div><!-- width -->
</div><!-- main -->