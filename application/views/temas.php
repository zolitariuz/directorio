<div class="main">

	<div class="width">
		<div class="clear"></div>
		<div class="clear"></div>
		<section class="mas-comunes clearfix">
			<h2 class="text-center highlight">Temas de trámites y servicios</h2>
			<?php foreach ($temas as $key => $value) {
				$tema = $value->materia;
				$idMateria = $value->id_cat_materia;
			?>
				<a href="<?php echo base_url().'index.php/temas/muestraTS/'.$idMateria; ?>" class="boton columna xmall-12 small-6 medium-4 large-3 xlarge-2 cuadrado chico">
					<i class="fa fa-asterisk"></i>
					<?php echo $tema; ?>
				</a>
			<?php } // end foreach ?>
		</section>
		<div class="clear"></div>
	</div><!-- width -->
</div><!-- main -->