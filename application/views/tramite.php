<div class="main">
	<div class="width clearfix">
		<div class="main-content clearfix">
			<section class="content columna medium-8 large-9">
				<article class="header-single clearfix">
					<div class="quick-info">
						<p><i class="fa fa-asterisk"></i> <?php echo $ts->materia ?></p>
					</div><!-- quick-info -->
					<h2 class="highlight"><?php echo $ts->nombre_tramite; ?></h2>
				</article><!-- header-single -->
				<article class="consiste">
					<?php if(is_null($ts->descripcion)) { ?>
						<p class="hero">Este trámite no tiene descripción.</p>
					<?php } else {  ?>
						<p class="hero"><?php echo $ts->descripcion; ?></p>
					<?php } ?>
				</article>
				<hr>
				<article class="transform" data-content="requisitos">
					<h2 class="highlight">Requisitos</h2>
					<div class="no-xmall large">
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
										echo '<p><strong>'.$documentoOficial.': </strong></p><ul class="inside">';
										$numReq = $numReq + 1;
										$numReqAcr = 1;
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

								// Cargar requisitos específicos si existen
								if($requisitos_esp != ''){
									$requisitoEsp = '';
									foreach ($requisitos_esp as $key => $value) {
										$requisitoEsp = $value->requisito_especifico;
										echo '<div class="paso clearfix">';
										echo '<span>'.$numReq.'</span>';
										echo '<p>'.$requisitoEsp.'</p>';
										echo '</div>';
										$numReq = $numReq + 1;
									} // end foreach
								}
							}
						}
						?>
					</div>
				</article>
				<hr>
				<?php
				// Cargar requisitos específicos si existen
				if($procedimiento != ''){ ?>
					<article>
					<?php
						echo '<h2 class="highlight">Procedimiento</h2>';
						foreach ($procedimiento as $key => $value) {
							echo '<div class="paso clearfix">';
								echo '<span>'.$value->paso.'</span>';
								if ($value->actor == CIUDADANO){
									echo '<p class="highlight">Actor: Ciudadano</p>';
								} else if ($value->actor == SERVIDOR_PUBLICO){
									echo '<p class="highlight">Actor: Servidor público</p>';
								} else if($value->actor == SISTEMA){
									echo '<p class="highlight">Actor: Sistema informático</p>';
								}

								echo '<p>'.$value->accion.'</p>';
							echo '</div>';
						} // end foreach
					?>
					</article>
					<div class="clear"></div>
					<hr>
					<div class="clear"></div>
				<?php } ?>
				<article class="" data-seccion="area-atencion">
					<h2 class="highlight">Áreas de atención</h2>
					<div id="map"></div>
				</article>
				<hr>
				<article>
					<h2 class="highlight">Danos tu opinión</h2>
					<form class="feedback clearfix" action="<?php echo base_url().'index.php/tramites_servicios/agregar_feedback' ?>" method="POST">
						<fieldset>
							<label>¿Te ha sido de ayuda?</label>
							<input name="ayuda" type="radio" value="t"> Sí
							<input name="ayuda" type="radio" value="f"> No
						</fieldset>
						<fieldset class="rating-f">
							<label>¿Qué tanto?</label>
				            <select id="example-f" name="rating">
				                <option value="1">1</option>
				                <option value="2">2</option>
				                <option value="3">3</option>
				                <option value="4">4</option>
				                <option value="5">5</option>
				            </select>
						</fieldset>
						<fieldset>
							<label>¿Tienes algún comentario para mejorar nuestro servicio?</label>
							<textarea name="comentarios" rows="8"></textarea>
						</fieldset>
						<input type="hidden" name="id_ts" value="<?php echo $ts->id_tramite_servicio ?>">
						<input type="submit" class="boton chico horizontal right" value="Enviar">
					</form>
				</article>
				<hr>
				<article class="compartelo">
					<h2 class="highlight">Compártelo</h2>
					<div class="share block columna xmall-2">
						<a href="https://twitter.com/share" class="twitter-share-button" data-via="zolitariuz">Tweet</a>
						<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
						<div class="clear"></div>
						<div class="fb-share-button" data-layout="button" data-href="#"></div>
					</div><!-- share -->
				</article>
			</section><!-- content -->
			<aside class="columna medium-4 large-3">
				<a href="#" class="block boton horizontal margin-bottom busqueda js-overlay-opener">
					<i class="fa fa-search"></i> Busca tu trámite
				</a>
				<a href="#" data-seccion="area-atencion" class="block boton margin-bottom scrollTo">
					<i class="fa fa-map-marker"></i> ¿Dónde se realiza?
				</a>
				<div class="quick-info">
					<h3 class="highlight">Tiempo de respuesta</h3>
					<p>
						<?php
						// Parsear tiempo de respuesta si existe
						if(!is_null($ts->tiempo_respuesta)){
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
				</div><!-- quick-info -->
				<hr>

				<div class="quick-info">
					<?php
					$indicePrecio = 0;
					// Costo o costos del trámite o servicio
					if($costo != ''){
						foreach ($costo as $key => $value) {
							if($value->concepto == 1){
								echo '<h3 class="highlight">Costo</h3>';
								echo '<p>$'.$value->monto.'</p>';
							} else {
								if($indicePrecio == 0){
									echo '<h3 class="highlight">Costos</h3>';
									echo '<div class="tabla-precio">';
								}
								echo '<div class="costo">';
								echo '<div class="numero-costo">';
								echo '<p>$'.$value->monto.'</p>';
								echo '</div>';
								echo '<div class="nombre-costo">';
								echo '<p>'.$value->concepto.'</p>';
								echo '</div>';
								echo '</div>';

								$indicePrecio = $indicePrecio + 1;
								if(sizeOf($costo) == $indicePrecio)
									echo '</div>';
							}
						} // end foreach
					}
					?>
				</div><!-- quick-info -->

				<hr>
				<div class="quick-info">
					<h3 class="highlight">Formatos requeridos</h3>
					<div class="formatos">
						<?php
						if($formatos != ''){
							foreach ($formatos as $key => $value) {
								$formato = $value->nombre;
								$url = 'http://www14.df.gob.mx/virtual/sretys/statics/formatos/TCEJUR_ADP_1.pdf';
								$numFormato = $key + 1;
								echo '<div class="margin-bottom">';
								echo '<p>Formato '.$numFormato.'</p>';
								echo '<a class="highlight" href="'.$url.'" target="_blank">'.$formato.' </a>';
								echo '</div>';
							} // end foreach
						} else {
							echo '<p>Este trámite o servicio no tiene formatos requeridos</p>';
						}
						?>
					</div>
				</div> <!--quick-info -->
				<hr>
				<div class="quick-info">
					<article class="" data-content="beneficio-documento">
					<?php
					if($ts->is_tramite){
						echo '<h3 class="highlight">Documento(s) a obtener</h3>';
					} else {
						echo '<h3 class="highlight">Beneficio(s) a obtener</h3>';
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
								echo '<p><strong>'.$nombreDocumento.'</strong></p>';
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
				</div><!--quick-info -->
			</aside>
		</div><!-- main-content -->
	</div><!-- width -->
</div><!-- main -->