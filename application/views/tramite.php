<div class="main">
	<div class="width clearfix">
		<div class="main-content clearfix no-large">

			<article class="header-single clearfix">
				<div class="quick-info">
					<p><i class="<?php echo $clase_icono ?>"></i><?php echo $ts->materia ?></p>
					<p><?php echo $ts->id_cat_materia ?></p>
				</div><!-- quick-info -->
				<hr>
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
			<article class="quick-info">
				<?php
				$indicePrecio = 0;
				// Costo o costos del trámite o servicio
				if($costo != ''){
					foreach ($costo as $key => $value) {
						if($value->concepto == 1){
							echo '<h3 class="text-center highlight">Costo</h3>';
							echo '<p class="text-center">$'.$value->monto.'</p>';
						} else {
							if($indicePrecio == 0){
								echo '<a href="#" class="block boton margin-bottom">Costos</a>';
								echo '<div class="tabla-precio hide">';
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
			</article><!-- quick-info -->
			<article class="quick-info">
				<h3 class="text-center highlight">Tiempo de respuesta</h3>
				<div class="">
					<p class="text-center">
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
				</div>
			</article><!-- quick-info -->
			<?php
			// Cargar requisitos si existen
			$numReq = 1;
			if($requisitos == '' && $requisitos_esp == ''){
				echo '<p>Este trámite o servicio no tiene requisitos</p>';
			} else { ?>
				<article class="" data-content="requisitos">
					<a href="#" class="block boton margin-bottom">Requisitos</a>
					<div class="hide">
						<?php
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
						} ?>
					</div>
				</article>
			<?php
			}
			// Cargar requisitos específicos si existen
			if($procedimiento != ''){ ?>
				<article>
					<a href="#" class="block boton margin-bottom">Procedimiento</a>
					<div class="hide">
						<?php
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
					</div>
				</article>
				<div class="clear"></div>
			<?php } ?>
			<article class="" data-seccion="area-atencion">
				<a href="#" class="block boton margin-bottom">Áreas de atención</a>
				<div class="hide" id="map-movil"></div>
			</article>
			<article class="quick-info">
				<a href="#" class="block boton margin-bottom">Formatos requeridos</a>
				<div class="formatos hide">
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
			</article> <!--quick-info -->
			<article class="quick-info">
				<article class="" data-content="beneficio-documento">
				<?php
				if($ts->is_tramite){
					echo '<a href="#" class="block boton margin-bottom">Documento(s) a obtener</a>';
				} else {
					echo '<a href="#" class="block boton margin-bottom">Beneficio(s) a obtener</a>';
				}
				?>
				<div class="hide">
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
			</article><!--quick-info -->
			<article >
				<a href="#" class="block boton margin-bottom">Danos tu opinión</a>
				<div class="hide">
					<form class="feedback clearfix" action="<?php echo base_url().'index.php/tramites_servicios/agregar_feedback' ?>" method="POST">
						<fieldset>
							<label>¿Te ha sido de ayuda?</label>
							<input name="ayuda" type="radio" value="t" checked="checked"> Sí
							<input name="ayuda" type="radio" value="f"> No
						</fieldset>
						<fieldset class="rating-f">
							<label>¿Qué tanto?</label>
				            <select class="example-f" id="example-f" name="rating">
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
				</div>
			</article>
		</div><!-- main-content -->

		<div class="main-content clearfix large">
			<ul class="breadcrumbs">
				<li><a href="<?php echo base_url() ?>"><i class="fa fa-home"></i>Inicio</a></li>
				<li>></li>
				<li><a href="<?php echo base_url().'index.php/temas/muestraTS/'.$ts->id_materia ?>"><?php echo $ts->materia ?></a></li>
				<li>></li>
				<li class="actual"><?php echo $ts->nombre_tramite; ?></li>
			</ul>
			<section class="content columna medium-8 large-9">
				<article class="header-single clearfix">
					<div class="quick-info">
						<p><i class="<?php echo $clase_icono ?>"></i><?php echo $ts->materia ?></p>
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
				<?php
				// Cargar requisitos si existen
				$numReq = 1;
				if($requisitos == '' && $requisitos_esp == ''){
					echo '<p>Este trámite o servicio no tiene requisitos</p>';
				} else { ?>
					<article class="" data-content="requisitos">
						<h2 class="highlight">Requisitos</h2>
						<div>
							<?php
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

									// Agregar (o no) conjunciones
									switch($value->conjuncion){
										case '1':
											$documentoAcreditacion = 'y '.$documentoAcreditacion;
											break;
										case '2':
											$documentoAcreditacion = 'o '.$documentoAcreditacion;
											break;
									}// switch

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
							} ?>
						</div>
					</article>
					<hr>
				<?php
				}
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

				<article>
				<?php
					$nivel = $ts->nvl_automatizacion;
					$link = $ts->url_nvl_automatizacion;
					if(is_null($nivel) || $nivel  == '1'){

					} else{
						echo '<h2 class="highlight" id="ts_en_linea">Realízalo en linea</h2>';
					}

					if($nivel == '2'){
						echo '<p>El trámite/servicio se puede realizar completamente en línea a través del <a href="'.$link.'">siguiente enlace.</a></p>';
					} else {
						echo '<p>Sólo una parte del trámite/servicio puede realizarse en línea:</p>';
						echo '<ul class="inside margin-bottom">';

						$nivel_arr = explode('_', $nivel);
						foreach ($nivel_arr as $key => $value) {
							switch($value){
								case '1':
									echo '<li>Solicitud en línea</li>';
									break;
								case '2':
									echo '<li>Generación de línea de captura</li>';
									break;
								case '3':
									echo '<li>Pago totalmente en línea</li>';
									break;
								case '4':
									echo '<li>Entrega en línea</li>';
									break;
							}// switch
						}// foreach

						echo '</ul>';
						echo '<p>Puedes realizar esta parte en el siguinte enlace.</p>';
						echo '<br />';
						echo '<a class="boton" href="'.$link.'">realizar en linea</a>';
					}
				?>
				</article>
				<div class="clear"></div>
				<hr>
				<div class="clear"></div>

				<article>
				<?php

					$forma = $ts->formasolicitud;
					if(!is_null($forma)){
						echo '<h2 class="highlight">¿Cómo se realiza?</h2>';

						switch(trim($forma)){
							case "Presencial":
								echo '<p>Presencial</p>';
								break;
							case 'Electrónica':
								echo '<p>Vía electrónica</p>';
								break;
							case 'Telefónica':
								$tel_presentacion = $ts->tel_presentacion;
								echo '<p>Vía telefónica: '.$tel_presentacion.'</p>';
								break;
							case 'Mixta':
								echo '<p>Mixta</p>';
								break;
							default:
								echo '<ul class="inside">';
								$forma_arr = explode('_', $forma);
								foreach ($forma_arr as $key => $value) {
									switch(trim($value)){
										case '1':
											echo '<li>Presencial</li>';
											break;
										case '2':
											echo '<li>Vía electrónica</li>';
											break;
										case '3':
											$tel_presentacion = $ts->tel_presentacion;
											echo '<li>Vía telefónica: '.$tel_presentacion.'</li>';
											break;
									}// switch
								}// foreach
								echo '</ul>';
						}// switch
					}
				?>
				</article>
				<div class="clear"></div>
				<hr>
				<div class="clear"></div>

				<article class="" data-seccion="area-atencion">
					<h2 class="highlight">Áreas de atención</h2>
					<div id="map"></div>
				</article>
				<hr>
				<article class="danos-tu-opinion">
					<h2 class="highlight">Danos tu opinión</h2>
					<form class="feedback clearfix" action="<?php echo base_url().'index.php/tramites_servicios/agregar_feedback' ?>" method="POST">
						<fieldset>
							<label>¿Te ha sido de ayuda?</label>
							<input name="ayuda" type="radio" value="t" checked="checked"> Sí
							<input name="ayuda" type="radio" value="f"> No
						</fieldset>
						<fieldset class="rating-f">
							<label>¿Qué tanto?</label>
				            <select class="example-f" id="example-f" name="rating">
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
						<a href="https://twitter.com/share" class="twitter-share-button" data-via="TramsyServGDF" data-hashtags="TramitesCDMX">Tweet</a>
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
					<div>
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
		</div><!-- main-content large-->
	</div><!-- width -->
</div><!-- main -->