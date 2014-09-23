<div class="main">
	<div class="width">
		<div class="clear"></div>
		<h2 class="text-center highlight">Oficinas por institución: <?php echo $institucion->institucion; ?></h2>
		<section class="columna xmall-8 center directorio">
			<?php
				$primeraLetraAnt = '';
				foreach ($area_atencion as $value) {
					// Datos oficina
					$oficina = $value['nombre'];
					$del = $value['delegacion'];
					$col = $value['colonia'];
					$calle_num = $value['calle_numero'];
					$cp = $value['cp'];
					$telefono_1 = $value['telefono_1'];
					$ext_1 = $value['ext_1'];
					$telefono_2 = $value['telefono_2'];
					$ext_2 = $value['ext_2'];
					// Coordenadas mapa
					$coordenadas = str_replace('mapa:', '', $value['url_ubicacion']);
					$url_mapa = 'http://maps.google.com/maps?q=loc:'.$coordenadas;
					$ubicacion = '<a href="'.$url_mapa.'" target="_new">Ubicación en el mapa</a>';

					$primeraLetra = substr($oficina, 0, 1);
					if($primeraLetra != $primeraLetraAnt){
						if($primeraLetraAnt != ''){
							echo '</ul></div>';
						} ?>
						<div class="letra margin-bottom directorio-item">
							<a href="#" class="block boton margin-bottom">
								<h2><strong><?php echo $primeraLetra; ?></strong> <span></span></h2>
							</a>
							<ul class="hide">
						<?php
						$primeraLetraAnt = $primeraLetra;
					}
				?>
				<li>
					<address>
				<?php
					echo '<h3>'.$oficina.'</h3><br />';
					echo '<h4>Dirección</h4>';
					echo trim($calle_num).'<br />';
					echo 'Col: '.$col.', '.$del.' '.$cp;
					echo '<div class="clear"></div>';
					echo '<h4>Teléfonos</h4>';
					if($telefono_1 != ''){
						echo 'Teléfono 1: '.$telefono_1;
						if($ext_1 != '')
							echo ' ext. '.$ext_1;
					}
					echo '<br />';
					if($telefono_2 != ''){
						echo 'Teléfono 2: '.$telefono_2;
						if($ext_2 != '')
							echo ' ext. '.$ext_2;
					}
					echo $ubicacion;
					echo '<hr>';
				?>	
					</address>
				</li>
			<?php
				} // end foreach
			?>
		</section>
		<div class="clear"></div>
	</div><!-- width -->
</div><!-- main -->