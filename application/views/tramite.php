<div class="main">
	<div class="width clearfix">
		<div class="main-content clearfix">
			<div class="header-single clearfix">
				<div class="quick-info">
					<p><i class="fa fa-asterisk"></i> <?php echo $ts->materia ?></p>
				</div><!-- quick-info -->
				<h2 class="highlight"><?php echo $ts->nombre_tramite; ?></h2>
			</div><!-- header-single -->
			<section class="content columna xmall-9">
				<article class="consiste">
					<?php if(is_null($ts->descripcion_ts)) { ?>
						<p class="hero">Este trámite no tiene descripción.</p>
					<?php } else {  ?>
						<p class="hero"><?php echo $ts->descripcion_ts; ?></p>
					<?php } ?>
				</article>
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
										echo '<p><strong>'.$documentoOficial.': </strong></p><ul>';
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
										echo '<div class="clear"></div>';
										$numReq = $numReq + 1;
									} // end foreach
								}
							}
						}
						?>
					</div>
				</article>
				<article>
					<h2 class="highlight">Procedimientos</h2>
					<p>Este trámite o servicio no tiene procedimientos</p>
				</article>
				<article class="" data-content="area-atencion">
					<h2 class="highlight">Áreas de atención</h2>
					<div id="map"></div>
				</article>
				<article>
					<h2 class="highlight">Danos tu opinión</h2>
					<form class="feedback" action="#">
						<fieldset>
							<label>¿Te ha sido de ayuda?</label>
							<input name="ayuda" type="radio"> Sí
							<input name="ayuda" type="radio"> No
						</fieldset>
						<fieldset>
							<label>¿Qué tanto?</label>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star-half-o"></i>
							<i class="fa fa-star-o"></i>
							<i class="fa fa-star-o"></i>
						</fieldset>
						<fieldset>
							<label>¿Tienes algún comentario para mejorar nuestro servicio?</label>
							<textarea name="" id="" rows="8"></textarea>
						</fieldset>
						<input type="submit" class="boton" value="Enviar">
					</form>
				</article>
				<article>
					<h2 class="highlight">Compártelo</h2>
					<div class="share block columna xmall-2">
						<a href="https://twitter.com/share" class="twitter-share-button" data-via="zolitariuz">Tweet</a>
						<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
						<div class="clear"></div>
						<div class="fb-share-button" data-layout="button" data-href="#"></div>
					</div><!-- share -->
				</article>
			</section><!-- content -->
			<aside class="columna xmall-3">
				<section>
					<a href="#" data-seccion="" class="block boton margin-bottom">
						<i class="fa fa-map-marker"></i> ¿Dónde se realiza?
					</a>
					<div class="quick-info">
						<h3 class="highlight">Tiempo de respuesta</h3>
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
					</div><!-- quick-info -->
					<div class="clear"></div>
					<hr>
					<div class="clear"></div>
					<div class="quick-info">
						<h3 class="highlight">Costo</h3>
						<p>$ 100</p>
					</div><!-- quick-info -->
					<div class="clear"></div>
					<hr>
					<div class="clear"></div>
					<div class="quick-info">
						<h3 class="highlight">Costo</h3>
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
					</div> <!--quick-info -->
					<div class="clear"></div>
					<hr>
					<div class="clear"></div>
					<div class="quick-info">
						<h3 class="highlight">Formatos requeridos</h3>
						<div class="">
							<?php
							if($formatos != ''){
								foreach ($formatos as $key => $value) {
									$formato = $value->nombre;
									$url = 'http://www14.df.gob.mx/virtual/sretys/statics/formatos/TCEJUR_ADP_1.pdf';
									$numFormato = $key + 1;
									echo '<p>Formato '.$numFormato.'</p>';
									echo '<a class="highlight" href="'.$url.'" target="_blank">'.$formato.' </a><br /><br />';
								} // end foreach
							} else {
								echo '<p>Este trámite o servicio no tiene formatos requeridos</p>';
							}
							?>
						</div>
					</div> <!--quick-info -->
					<div class="clear"></div>
					<hr>
					<div class="clear"></div>
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
				</section>
			</aside>
		</div><!-- main-content -->
	</div><!-- width -->
</div><!-- main -->
