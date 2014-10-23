<div class="main">
	<div class="width clearfix">
		<!-- Este es el bueno -->
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
						<p><i class="<?php echo $clase_icono ?>"></i>Unidad responsable: <?php echo $ts->ente ?></p>
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

				<article class="beneficiario">
					<h2 class="highlight">¿Quién realiza el trámite?</h2>
					<p><?php echo $ts->beneficiario ?></p>
				</article>
				<hr>

				<?php
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

									$num_copias = $value->num_copias;
									switch($value->original_copia){
										case 1:
											$documentoAcreditacion = $documentoAcreditacion.' <strong>traer original</strong>';
											break;
										case 2:
											if($num_copias > 0)
												$documentoAcreditacion = $documentoAcreditacion.' <strong>traer '.$num_copias.' copia(s) </strong>';
											break;
										case 3:
											$documentoAcreditacion = $documentoAcreditacion.' <strong>traer original y '.$num_copias.' copia(s) </strong>';
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
				// Cargar procedimiento si existe
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
					<div class="div" style="border:1px solid black">
						<strong>Esto debe ser un acordión...</strong>
						<h2 class="highlight">¿Dónde lo realizo?</h2>
						<div id="map"></div>
						<?php
							$nivel = $ts->nvl_automatizacion;
							$link = $ts->url_nvl_automatizacion;
							if(is_null($nivel) || $nivel  == '1'){

							} else{
								echo '<h3 class="highlight" id="ts_en_linea">En línea</h3>';
							}

							if($nivel == '2'){
								echo '<p>El trámite/servicio se puede realizar completamente en línea a través del <a href="'.$link.'">siguiente enlace.</a></p>';
							} else {
								echo '<p>Sólo una parte del trámite/servicio puede realizarse en línea:</p>';
								echo '<ul class="inside">';

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

								echo '</ul><div class="clear margin-bottom"></div>';
								echo '<a class="boton margin-bottom" href="'.$link.'" target="_blank">realizar en linea</a>';
							}

							if($ts->tel_presentacion != '0'){
								echo '<h3 class="highlight">Vía telefónica</h3>';
								echo '<p>'.$tel_presentacion.'</p>';
							}

							?>
					</div>
				</article>
				<hr>

				<?php if(trim($ts->observaciones) != '') { ?>
					<article class="" data-seccion="observaciones">
						<h2 class="highlight">¿Qué debes considerar?</h2>
						<p><?php echo $ts->observaciones ?></p>
					</article>
					<hr>
				<?php } ?>

				<article class="" data-seccion="informacion-juridica">
					<a href="#" class="block boton margin-bottom">
						<i class="fa fa-bank"></i> Información jurídica
					</a>
					<div>
						<h2 class="highlight">¿Qué ocurre si no dan respuesta a mi trámite en el plazo establecido?</h2>
							<?php
								$afirmativa_ficta = $ts->afirmativa_ficta;
								$negativa_ficta = $ts->negativa_ficta;

								if($afirmativa_ficta == '3' && $negativa_ficta == '3')
									echo '<p>No aplica</p>';

								if($afirmativa_ficta == '1')
									echo '<p>Afirmativa ficta: procede afirmativa ficta.</p>';
								else
									echo '<p>Afirmativa ficta: no procede afirmativa ficta.</p>';

								if($negativa_ficta == '1')
									echo '<p>Negativa ficta: procede negativa ficta.</p>';
								else
									echo '<p>Negativa ficta: no procede negativa ficta.</p>';
							?>

						<h2 class="highlight">Plazo máximo de respuesta</h2>
						<?php
						// Parsear tiempo de respuesta si existe
						if(!is_null($ts->tiempo_respuesta)){
							$tiempo_respuesta_ar = explode('_', $ts->tiempo_respuesta);
							$dias = $tiempo_respuesta_ar[0];

							if($tiempo_respuesta_ar[1] == 1){
								$tipo = ' días hábiles';
								$tiempo_respuesta = $dias.$tipo;
							} else if ($tiempo_respuesta_ar[1] == 2){
								$tipo = ' días naturales';
								$tiempo_respuesta = $dias.$tipo;
							} else {
								$tipo = 'Inmediato';
								$tiempo_respuesta = $tipo;
							}

						} else
							$tiempo_respuesta = 'Tiempo de respuesta no definido';

						echo '<p>'.$tiempo_respuesta.'</p>';
						?>

						<h2 class="highlight">De acuerdo a los fundamentos jurídicos:</h2>
						<ul>
							<?php
							if($info_juridica != ''){
								foreach ($info_juridica as $key => $value) {
									echo '<li>'.$value->descripcion.' '.$value->articulos.'</li>';
								} // end foreach
							}
							?>
						</ul>
					</div>
				</article>

				<article class="danos-tu-opinion">
					<h2 class="highlight">Danos tu opinión</h2>
				<?php if($feedback == '1') { ?>
					<label>Gracias por participar.</label>
				<?php } else { ?>
					<form class="feedback clearfix" action="<?php echo base_url().'index.php/tramites_servicios/agregar_feedback' ?>" method="POST">
						<fieldset>
							<label>¿Te ha sido útil esta información?</label>
							<input name="ayuda" type="radio" value="t" checked="checked"> Sí
							<input name="ayuda" type="radio" value="f"> No
						</fieldset>
						<fieldset class="rating-f">
							<label>¿Qué tan útil ha sido?</label>
				            <select class="example-f" id="example-f" name="rating">
				                <option value="1">1</option>
				                <option value="2">2</option>
				                <option value="3">3</option>
				                <option value="4">4</option>
				                <option value="5">5</option>
				            </select>
						</fieldset>
						<fieldset class="rating-f">
							<label>Si haz realizado este trámite anteriormente ¿cómo calificas el servicio?</label>
				            <select class="example-f" id="example-f" name="rating-servicio">
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
				<?php } ?>
				</article><!-- danos tu opinion -->
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
				<a href="#" class="block boton margin-bottom j-imprimir">
					<i class="fa fa-print"></i> Imprimir información
				</a>
				<div class="quick-info">
					<h3 class="highlight">Tiempo de respuesta</h3>
					<p><?php echo $tiempo_respuesta ?></p>
				</div><!-- quick-info -->
				<hr>

				<div class="quick-info">
					<h3 class="highlight">¿Qué pasa si no te responden a tiempo?</h3>
					<?php
						if($afirmativa_ficta == '1')
							echo '<p>Puedes asumir que la respuesta a tu petición es afirmativa.</p>';
						if($negativa_ficta == '1')
							echo '<p>Puedes asumir que la respuesta a tu petición es negativa.</p>';
					?>
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
					<?php
					// Áreas de pago
					if($area_pago != ''){
						echo '<h3 class="highlight">Áreas de pago</h3>';
						echo '<ul>';
						foreach ($area_pago as $key => $value) {
							echo '<li>'.$value->descripcion.'</li>';
						} // end foreach
						echo '</ul>';
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
								$url = 'http://www.registrocdmx.df.gob.mx/'.$value->url;
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
				<div class="quick-info">
					<a href="#" class="block columna xmall-10 center">
						<img class="full" src="<?php echo base_url() ?>assets/img/logo-anticorrupcion.png" alt="">
					</a>
				</div>
			</aside>
		</div><!-- main-content large-->
	</div><!-- width -->
</div><!-- main -->