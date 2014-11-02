<div class="main">

	<div class="width">
		<div class="clear"></div>
		<ul class="breadcrumbs">
			<li><a href="<?php echo base_url() ?>"><i class="fa fa-home"></i>Inicio</a></li>
			<li>></li>
			<li class="actual">Trámites y servicios en línea</li>
		</ul>
		<section class="[ columna full medium-8 ] [ center ]">
			<h2 class="text-center highlight">Trámites y servicios en linea</h2>
			<?php
			$primeraLetraAnt = '';
			foreach ($ts_en_linea as $key => $value) {
				$id = $value->id_tramite_servicio;
				$nombre = $value->nombre_tramite;
				$urlTramite = base_url().'index.php/tramites_servicios/muestraInfo/'.$id.'#ts_en_linea';
				$primeraLetra = substr($nombre, 0, 1);
				$primeraLetra = strtoupper ( $primeraLetra );

				if($primeraLetra != $primeraLetraAnt){
					if($primeraLetraAnt != ''){
						echo '</ul></div>';
					} ?>
					<div class="letra margin-bottom acordeon-item">
						<a href="#" class="block [ boton boton-acordeon ] margin-bottom">
							<h2><strong><?php echo $primeraLetra; ?></strong> <span></span></h2>
						</a>
						<ul class="hide none">
					<?php
					$primeraLetraAnt = $primeraLetra;
				}
				?>
				<li>
					<ul class="[ none ]">
						<li class="js-count-item"><a href="<?php echo $urlTramite ?>"><?php echo $nombre ?></a></li>
					</ul>
				</li>
			<?php
			} //end for each
			?>
		</section>
		<div class="clear"></div>
	</div><!-- width -->
</div><!-- main -->