<div class="main">
	<div class="width">
		<div class="no-xmall large main-busqueda columna large-4">
			<h2 class="text-center">Buscar trámite o servicio</h2>

			<form class="main-search hero clearfix" action="#">
				<input type="text" class="span xmall-10">
				<button type="submit" class="span xmall-2"><i class="fa fa-search"></i></button>
			</form>

			<h3 class="text-center">O también puedes buscar por:</h3>

			<a href="#" class="block text-center boton solid full margin-bottom">Dependencia</a>
			<a href="#" class="block text-center boton solid full margin-bottom">Delegación</a>
			<a href="#" class="block text-center boton solid full margin-bottom">Categorías de trámites</a>
			<a href="#" class="block text-center boton solid full margin-bottom">Categorías de servicios</a>
		</div> <!-- /.main-busqueda -->
		<div class="main-content columna large-8 full">
			<p>Tema: <?php echo $ts->materia ?></p>
			<h2 class="hero text-center"><?php echo $ts->nombre_tramite; ?></h2>

		<div class="quick-access-menu">

			<!-- <a href="#" class="quick-link first">
				<i class="fa fa-university"></i>
				Ente responsable: <br />
				<?php 
				$ente = explode('-', $ts->ente);
				echo $ente[0];
				?>
			</a> -->
			</a><a href="" class="quick-link">
				<i class="fa fa-dollar"></i>
				Costo:
				<p>$<?php echo $ts->costo; ?></p>
			</a>
			<a href="" class="quick-link">
				<i class="fa fa-clock-o"></i>
				Tiempo de respuesta:<br />
				<?php
					// Parsear tiempo de respuesta si existe
					if(is_null($ts->tiempo_respuesta)){
						$tiempo_respuesta = explode('_', $ts->tiempo_respuesta); 
						$dias = $tiempo_respuesta[0];

						if($tiempo_respuesta[1] == 1){
							$tipo = ' días hábiles'; 
							echo $dias.$tipo;
						} else if ($tiempo_respuesta[1] == 2){
							$tipo = ' días naturales'; 
							echo $dias.$tipo;
						} else {
							$tipo = 'inmediato'; 
							echo $tipo;
						}
					} else 
						echo 'Tiempo de respuesta no definido';
					
				?>
			</a><a href="" class="quick-link last">
				<i class="fa fa-map-marker"></i>
				¿Dónde se realiza?
			</a>
		</div>

		<section class="content">
			<article class="consiste">
				<p class="hero"><?php echo $ts->descripcion_ts; ?></p>
			</article>
			<article class="transform" data-content="requisitos">
				<h2>Requisitos</h2>
				<div class="no-xmall large modal-to-be">
					<?php 
					// Cargar requisitos si existen
					$numReq = 1;
					if($requisitos == '' && $requisitos_esp == ''){
						echo '<p>Este trámite o servicio no tiene requisitos</p>';
					} else { 
						if($requisitos != ''){
							$documentoOficial = '';
							$esDiferente = false;
							$numReqAcr = -1;
							foreach ($requisitos as $key => $value) {
								if($documentoOficial != $value->documento_oficial){
									if($numReqAcr > 1){
										echo '</p></div>';
										
									}

									$documentoOficial = $value->documento_oficial;
									echo '<div class="paso clearfix">';
									echo '<span>'.$numReq.'</span>';
									echo '<p><strong>'.$documentoOficial.': </strong>';
									$numReq = $numReq + 1;
									$numReqAcr = 1;
								} 

								$documentoAcreditacion = $value->documento_acreditacion;
								if($numReqAcr == 1){
									if(substr($documentoAcreditacion, 0, 1) == 'y' || substr($documentoAcreditacion, 0, 1) == 'o' )
										$documentoAcreditacion = substr($documentoAcreditacion, 2);
								} 
								
								echo $documentoAcreditacion.' ';
								$numReqAcr = $numReqAcr + 1;
							} // end foreach
							echo '</p></div>';
						}

						// Cargar requisitos específicos si existen
						if($requisitos_esp != ''){
							$requisitoEsp = '';
							foreach ($requisitos_esp as $key => $value) {
								$requisitoEsp = $value->requisito_especifico;
								echo '<div class="paso clearfix">';
								echo '<span>'.$numReq.'</span>';
								echo '<p><strong>'.$requisitoEsp.'</strong></p>';
								echo '</div>';
								echo '<div class="clear"></div>';
								$numReq = $numReq + 1;
							} // end foreach
						}
					}
					?>
				</div>
			</article>
			<article class="transform" data-content="formatos-requeridos">
				<h2>Formatos requeridos</h2>
				<div class="">
					<?php 
					if($formatos != ''){
						foreach ($formatos as $key => $value) {
							$formato = $value->nombre;
							$url = 'http://www14.df.gob.mx/virtual/sretys/statics/formatos/TCEJUR_ADP_1.pdf';
							$numFormato = $key + 1;
							echo '<p>Formato '.$numFormato.': ';
							echo '<a href="'.$url.'" target="_blank">'.$formato.' </a>';
							echo '</p>';
						} // end foreach
					} else {
						echo '<p>Este trámite o servicio no tiene formatos requeridos</p>';
					}
					?>
				</div>
			</article>

			<article class="" data-content="beneficio-documento">
				<?php 
				if($ts->is_tramite){
					echo '<h2>Documento a obtener</h2>';
				} else {
					echo '<h2>Beneficio a obtener</h2>';
				}
				?>
				
				<div class="no-xmall large modal-to-be">
					<?php 
					
					if($documento != ''){
						$sinDocumento = true;
						foreach ($documento as $key => $value) {
							$nombreDocumento = $value['nombreDocumento'];
							$vigencia = $value['vigencia'];
							$vigenciaArray = explode('_', $vigencia);
							echo '<h3>'.$nombreDocumento.'</h3>';
							if($vigencia != -1) {
								echo '<p>Vigencia: '.$vigencia.'</p>';
								$sinDocumento = false;
							}
						} // end foreach
						if($sinDocumento)
							echo '<p>No se obtiene documento alguno</p>';
					} else {
						echo '<p>Este trámite o servicio no tiene beneficio / documento</p>';
					}
					?>
				</div>
			</article> 

			<article class="" data-content="area-atencion">
				<h2>Áreas de atención</h2>
				<div id="map"></div>
			</article>

		</section><!-- content -->
	</div><!-- width -->
</div><!-- main -->
