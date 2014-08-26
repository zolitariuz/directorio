<div class="main">
	<div class="width clearfix">
		<aside class="no-xmall large columna large-4">
			<div class="to-be-fixed">
				<h2 class="highlight"><?php echo $ts->nombre_tramite; ?></h2>
				<div class="share margin-bottom">
					<a href="https://twitter.com/share" class="twitter-share-button" data-via="zolitariuz">Tweet</a>
					<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
					<div class="clear"></div>
					<div class="fb-share-button" data-layout="button" data-href="#"></div>
				</div><!-- share -->
				<div class="quick-info">
					<i class="fa fa-asterisk"></i>
					<div>
						<p><span>Tema</span></p>
						<p><?php echo $ts->materia ?></p>
					</div>
				</div><!-- quick-info -->
				<div class="quick-info">
					<i class="fa fa-map-marker"></i>
					<div>
						<p><span>Dónde se realiza</span></p>
						<p>Ver área de atención</p>
					</div>
				</div><!-- quick-info -->
				<div class="quick-info">
					<i class="fa fa-clock-o"></i>
					<div>
						<p><span>Tiempo de respuesta</span></p>
						<p>
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
						</p>
					</div>
				</div><!-- quick-info -->
				<div class="quick-info">
					<i class="fa fa-dollar"></i>
					<div>
						<p><span>Costo</span></p>
						<p>$100</p>
					</div>
				</div><!-- quick-info -->
				<div class="quick-info">
					<i class="fa fa-dollar"></i>
					<div>
						<p><span>Costo</span></p>
						<p>Costo variable</p>
					</div>
					<div class="clear"></div>
					<div class="tabla-precio">
						<div class="costo clearfix">
							<div class="nombre-costo columna xmall-8">
								<p>Registro</p>
							</div>
							<div class="numero-costo columna xmall-4">
								<p>$256</p>
							</div>
						</div>
						<div class="clear"></div>
						<div class="costo clearfix">
							<div class="nombre-costo columna xmall-8">
								<p>Registro</p>
							</div>
							<div class="numero-costo columna xmall-4">
								<p>$256</p>
							</div>
						</div>
					</div>
				</div><!-- quick-info -->
			</div><!-- to-be-fixed -->
		</aside>
		<div class="main-content columna large-8 full right">

<<<<<<< HEAD
		<section class="content">
			<article class="consiste">
				<?php if(is_null($ts->descripcion_ts)) { ?>
					<p class="hero">Este trámite no tiene descripción.</p>
				<?php } else {  ?>
					<p class="hero"><?php echo $ts->descripcion_ts; ?></p>
				<?php } ?>
			</article>
			<article class="transform" data-content="requisitos">
				<h2 class="highlight">Requisitos</h2>
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
										echo '</ul></div>';
=======
			<section class="content">
				<article class="consiste">
					<p class="hero"><?php echo $ts->descripcion_ts; ?></p>
				</article>
				<article class="transform" data-content="requisitos">
					<h2 class="highlight">Requisitos</h2>
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
											echo '</ul></div>';
										}

										$documentoOficial = $value->documento_oficial;
										echo '<div class="paso clearfix">';
										echo '<span>'.$numReq.'</span>';
										echo '<p><strong>'.$documentoOficial.': </strong></p><ul>';
										$numReq = $numReq + 1;
										$numReqAcr = 1;
>>>>>>> 62ead1f552f0c42a33508f3a740546d83152a349
									}

									$documentoAcreditacion = $value->documento_acreditacion;
									if($numReqAcr == 1){
										if(substr($documentoAcreditacion, 0, 1) == 'y' || substr($documentoAcreditacion, 0, 1) == 'o' )
											$documentoAcreditacion = substr($documentoAcreditacion, 2);
									}

									echo '<li>'.$documentoAcreditacion.'</li>';
									$numReqAcr = $numReqAcr + 1;
								} // end foreach
								echo '</ul></div>';
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
					<h2 class="highlight">Formatos requeridos</h2>
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
						echo '<h2 class="highlight">Documento a obtener</h2>';
					} else {
						echo '<h2 class="highlight">Beneficio a obtener</h2>';
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
					<h2 class="highlight">Áreas de atención</h2>
					<div id="map"></div>
				</article>

			</section><!-- content -->
		</div><!-- main-content -->
	</div><!-- width -->
</div><!-- main -->
