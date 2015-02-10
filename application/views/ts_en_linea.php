<div class="main">
	<div class="width">
		<div class="clear"></div>
		<div class="[ breadcrumbs ] [ margin-bottom-big ]">
			<span><a href="<?php echo base_url() ?>"><i class="fa fa-home"></i>Inicio</a></span>
			<span>></span>
			<span class="actual">Trámites y servicios en línea</span>
		</div><!-- .breadcrumbs -->
		<section class="[ columna full medium-8 ] [ center ] [ directorio ]">
			<h2 class="text-center highlight">Trámites y servicios en linea</h2>
			<?php if( $ts_en_linea != '' ) { ?>
				<div class="[ acordeon ]">
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
									<h2 class="[ text-left ]"><strong><?php echo $primeraLetra; ?></strong> <span></span> <i class="[ fa fa-angle-down drop ] [ right ]"></i></h2>
								</a>
								<ul class="[ hide ] [ arabigos ]">
							<?php
							$primeraLetraAnt = $primeraLetra;
						}
						?>
						<li class="[ js-count-item ]">
							<a href="<?php echo $urlTramite ?>"><?php echo $nombre ?></a>
						</li>
					<?php
					} //end for each
					?>
				</div><!-- .acordeon -->
			<?php } else { ?>
				<p>Por el momento no hay trámites registrados que se realicen en linea.</p>
			<?php } ?>
		</section>
		<div class="clear"></div>
	</div><!-- width -->
</div><!-- main -->
