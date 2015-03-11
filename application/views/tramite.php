<?php $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>

<div class="main">
	<div class="width clearfix">
		<div class="main-content clearfix">
			<div class="clear"></div>
			<section class="[ content ] [ columna xmall-12 medium-8 large-9 ]">
				<article class="[ header-single ] [ clearfix ] [ margin-bottom-big ]">
					<div class="[ breadcrumbs ] [ margin-bottom-small ]">
						<span><a href="<?php echo base_url() ?>"><i class="fa fa-home"></i>Inicio</a></span>
						<span>></span>
						<span><a href="<?php echo base_url().'temas/muestraTS/'.$ts->id_materia ?>"><?php echo $ts->materia ?></a></span>
						<span>></span>
						<span class="actual"><?php echo $ts->nombre_tramite; ?></span>
					</div><!-- .breadcrumbs -->
					<div class="[ quick-info ] [ margin-bottom ]">
						<i class="icon-ts-temas"></i> <b>Tema:</b> <span class="[ highlight ]"><?php echo $ts->materia ?></span><br />
						<i class="<?php echo $clase_icono ?>"></i> <b>Unidad responsable:</b> <span class="[ highlight ]"><?php echo $ente ?></span>
					</div><!-- quick-info -->
				</article><!-- header-single -->
				<article class="consiste">
					<h2 class="highlight"><strong><?php echo $ts->nombre_tramite; ?></strong></h2>
					<?php if(is_null($ts->descripcion)) { ?>
						<p class="hero">Este trámite no tiene descripción.</p>
					<?php } else {  ?>
						<p class="hero"><?php echo nl2br($ts->descripcion); ?></p>
					<?php } ?>
				</article>
				<hr>
				<article class="beneficiario">
					<?php if($is_tramite == '1') { ?>
						<h2 class="highlight">¿Quién realiza el trámite?</h2>
					<?php } else { ?>
						<h2 class="highlight">¿Quién realiza el servicio?</h2>
					<?php } ?>
					<p><?php echo nl2br($ts->beneficiario) ?></p>
				</article>
				<hr>
				<?php
				$numReq = 1;

				if($requisitos == '' && $requisitos_esp == ''){
					echo '<p>Este trámite o servicio no tiene requisitos</p>';
				} else { ?>
					<article class="" data-content="requisitos" data-seccion="requisitos">
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
										echo '<p><strong>'.$documentoOficial.': </strong></p><ul class="[ none ]">';
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
											$documentoAcreditacion = $documentoAcreditacion.' <strong>- original</strong>';
											break;
										case 2:
											if($num_copias > 0)
												$documentoAcreditacion = $documentoAcreditacion.' <strong>- '.$num_copias.' copia(s) </strong>';
											break;
										case 3:
											$documentoAcreditacion = $documentoAcreditacion.' <strong>- original y '.$num_copias.' copia(s) </strong>';
											break;
									}// switch
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
									echo '<p>'.nl2br($requisitoEsp).'</p>';
									echo '</div>';
									$numReq = $numReq + 1;
								} // end foreach
							}
							?>
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

								echo '<p>'.nl2br($value->accion).'</p>';
							echo '</div>';
						} // end foreach
					?>
					</article>
					<div class="clear"></div>
					<hr>
					<div class="clear"></div>
				<?php } ?>
				<?php if( $delegacion_area_atencion != '' OR ( ! is_null($nivel) OR $link != '' ) OR $ts->tel_presentacion != '0' ) { ?>
					<article class="" data-seccion="area-atencion">
						<?php if( $delegacion_area_atencion != '') { ?>
							<h2 class="[ highlight ]">¿Dónde lo realizo?</h2>
							<div class="[ acordeon ]">
								<div class="[ acordeon-item ]">
									<a href="#" class="[ block margin-bottom ] [ boton boton-acordeon horizontal ] [ text-left ] [ ]">
										<i class="icon-ts-tramite-en-ventanilla"></i> En área de atención ciudadana  <i class="[ fa fa-angle-down drop ] [ right ]"></i>
									</a>
									<ul class="[ none ] [ hide ]">
										<li>
											<form class="[ margin-bottom ] [ j-area-delegacion ]" action="">
												<input type="hidden" name="id_tramite_servicio" value="<?php echo $ts->id_tramite_servicio ?>">
												<fieldset>
													<label for="delegacion">Delegación:</label>
													<select name="delegacion" id="delegacion">
														<option value="Seleccionar">Seleccionar delegación</option>
														<?php foreach ($delegacion_area_atencion as $key => $delegacion) { ?>

														<option value="<?php echo $delegacion->delegacion ?>"><?php echo $delegacion->delegacion ?></option>
														<?php } ?>
													</select>
												</fieldset>
											</form>
											<div class="[ tabla tabla-small ] [ j_area_atencion ] [ hide ]">
												<div class="fila header clearfix">
													<div class="[ columna xmall-3 ]">
														Nombre
													</div>
													<div class="[ columna xmall-4 ]">
														Dirección
													</div>
													<div class="[ columna xmall-3 ]">
														Horarios
													</div>
													<div class="[ columna xmall-2 ]">
														Teléfonos
													</div>
												</div>
												<div class="clear"></div>
											</div><!-- tabla -->
										</li>
									</ul>
								</div>
						<?php }
								$nivel = $ts->nvl_automatizacion;
								$link = $ts->url_nvl_automatizacion;
								if( is_null($nivel) || $link == '' ){
								} else{
									echo '<div class="[ acordeon-item ]">';
										echo '<a href="#" class="block [ boton boton-acordeon horizontal ] [ text-left ] margin-bottom">';
											echo '<i class="icon-ts-tramite-en-linea"></i> En línea <i class="[ fa fa-angle-down drop ] [ right ]"></i>';
										echo '</a>';
										echo '<ul class="[ none ] [ hide ]">';
											echo '<li class="[ clearfix ]">';

										if($nivel == '2'){
											echo '<p>El trámite/servicio se puede realizar completamente en línea a través del <a href="'.$link.'" target="_blank">siguiente enlace.</a></p>';
										} else {
											echo '<p>Sólo una parte del trámite/servicio puede realizarse en línea:</p>';
											echo '<ul class=" ]">';

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
											echo '<br/><a class="[ boton chico ] [ margin-bottom left ]" href="'.$link.'" target="_blank">realizar en línea</a>';
										}
											echo '</li>';
										echo '</ul>';
									echo '</div>';
								}
								if($ts->tel_presentacion != '0'){
									$tel = $ts->tel_presentacion;
									if($ts->ext_presentacion != '0')
										$tel = $tel.' ext. '.$ts->ext_presentacion;
									echo '<div class="[ acordeon-item ]">';
											echo '<a href="#" class="block [ boton boton-acordeon horizontal ] [ text-left ] margin-bottom">';
												echo '<i class="icon-ts-tramite-telefonico"></i> Vía telefónica  <i class="[ fa fa-angle-down drop ] [ right ]"></i>';
											echo '</a>';
										echo '<ul class="[ none ] [ hide ]">';
											echo '<li>';
												echo '<p>'.$tel.'</p>';
											echo '</li>';
										echo '</ul>';
									echo '</div>';
								}
							?>
						</div><!-- acordeon -->
					</article>
					<hr>
				<?php } ?>
				<?php if(trim($ts->observaciones) != '') { ?>
					<article class="[ padding ]" data-seccion="observaciones">
						<h2 class="highlight">¿Qué debes considerar?</h2>
						<p class="[ darker-light-grey italic ]"><?php echo nl2br($ts->observaciones) ?></p>
					</article>
					<hr>
				<?php } ?>
				<article class="" data-seccion="informacion-juridica">
					<div class="[ acordeon ]">
						<div class="[ acordeon-item ]">
							<a href="#" class="[ block ] [ boton boton-acordeon horizontal ] [ text-left ] [ margin-bottom ]">
								<i class="fa fa-bank"></i> Información jurídica <i class="[ fa fa-angle-down drop ] [ right ]"></i>
							</a>
							<ul class="[ none ] [ hide ]">
								<li>
									<div class="[ margin-bottom ]">
										<h3 class="[ highlight ][ margin-bottom ]"><small>¿Qué ocurre si no dan respuesta a mi trámite en el plazo establecido?</small></h3>
										<?php
											if($ts->afirmativa_ficta == '1' || $ts->negativa_ficta == '1') {
												$afirmativa_ficta = $ts->afirmativa_ficta;
												$negativa_ficta = $ts->negativa_ficta;
											}

											if($afirmativa_ficta == '3' && $negativa_ficta == '3')
												echo '<p><small>No aplica</small></p>';
											if($afirmativa_ficta == '1')
												echo '<p><small>Afirmativa ficta: procede afirmativa ficta.</small></p>';
											else
												echo '<p><small>Afirmativa ficta: no procede afirmativa ficta.</small></p>';
											if($negativa_ficta == '1')
												echo '<p><small>Negativa ficta: procede negativa ficta.</small></p>';
											else
												echo '<p><small>Negativa ficta: no procede negativa ficta.</small></p>';
										?>
									</div><!-- [ margin-bottom ] -->
									<div class="[ margin-bottom ]">
										<?php
										// Parsear tiempo de respuesta si existe
										if(!is_null($ts->tiempo_respuesta)){
											$tiempo_respuesta_ar = explode('_', $ts->tiempo_respuesta);
											$dias = $tiempo_respuesta_ar[0];
											if($tiempo_respuesta_ar[1] == 1){
												if($dias=='1')
													$tipo = ' día hábil';
												else
													$tipo = ' días hábiles';
												$tiempo_respuesta = $dias.$tipo;
											} else if ($tiempo_respuesta_ar[1] == 2){
												if($dias=='1')
													$tipo = ' día natural';
												else
													$tipo = ' días naturales';

												$tiempo_respuesta = $dias.$tipo;
											} else {
												$tipo = 'Inmediato';
												$tiempo_respuesta = $tipo;
											}
										} else
											$tiempo_respuesta = 'Tiempo de respuesta no definido';
										?>
										<h3 class="[ highlight ][ margin-bottom ]"><small>Plazo máximo de respuesta</small></h3>
										<?php echo '<p><small>'.$tiempo_respuesta.'</small></p>'; ?>
									</div><!-- [ margin-bottom ] -->
									<div class="[ margin-bottom ]">
										<h3 class="[ highlight ][ margin-bottom ]"><small>De acuerdo a los fundamentos jurídicos:</small></h3>
										<ul class="[ inside disc ]">
											<?php
											if($info_juridica != ''){
												foreach ($info_juridica as $key => $value) {
													echo '<li><small>'.nl2br($value->descripcion.' '.$value->articulos).'</small></li>';
												} // end foreach
											}
											?>
										</ul>
									</div><!-- [ margin-bottom ] -->
								</li>
							</ul>
						</div><!-- [ acordeon-item ] -->
					</div><!-- [ acordeon ] -->
				</article>
				<hr>
				<article class="danos-tu-opinion">
					<h2 class="highlight">Danos tu opinión</h2>
				<?php if($feedback == '1') { ?>
					<label>Gracias por participar.</label>
				<?php } else { ?>
					<form class="feedback clearfix" action="<?php echo base_url().'tramites_servicios/agregar_feedback' ?>" method="POST">
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
							<textarea name="comentarios" rows="8" maxLength="1000"></textarea>
						</fieldset>
						<input type="hidden" name="id_ts" value="<?php echo $ts->id_tramite_servicio ?>">
						<button type="submit" class="[ boton chico horizontal ] [ right ]">Enviar</button>
					</form>
				<?php } ?>
				</article><!-- danos tu opinion -->
			</section><!-- content -->
			<aside class="[ columna medium-4 large-3 ] [ right ] [ margin-bottom-big ]">
				<div class="[ quick-info ] [ clearfix ] [ large ]">
					<h3 class="highlight">Compártelo</h3>
					<div class="share block">
						<a href="#" class="[ block margin-bottom ] [ boton horizontal ] [ text-left ] [ large ] [ js-share-fb ]">
							<i class="fa fa-facebook"></i> Compartir en Facebook
						</a>
						<a class="[ block margin-bottom ] [ boton horizontal ] [ text-left ] [ large ]" href="https://twitter.com/share?url=<?php echo $actual_link; ?>&text=<?php echo trim($ts->nombre_tramite); ?>&via=TramsyServGDF" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;">
							<i class="fa fa-twitter"></i> Compartir en Twitter
						</a>
					</div><!-- share -->
				</div><!-- quick-info -->
				<div class="clear"></div>
				<hr class="[ large ]">
				<a href="#" class="[ block margin-bottom ] [ boton horizontal ] [ text-left ] [ busqueda ] [ js-overlay-opener ] [ large ]">
					<i class="icon-ts-buscar"></i> Busca tu trámite
				</a>
				<?php if( $delegacion_area_atencion != '') { ?>
					<a href="#" data-seccion="area-atencion" class="[ block margin-bottom ] [ boton horizontal ] [ text-left ] [ scrollTo ] [ large ]">
						<i class="icon-ts-marcador-mapa"></i> ¿Dónde se realiza?
					</a>
				<?php } ?>
				<a href="#" data-seccion="requisitos" class="[ block margin-bottom ] [ boton horizontal ] [ text-left ] [ scrollTo ] [ large ]">
					<i class="icon-ts-reportes"></i> Requisitos
				</a>
				<a href="#" class="[ block margin-bottom ] [ boton horizontal ] [ text-left ] [ j-imprimir ] [ large ]">
					<i class="icon-ts-imprimir"></i> Imprimir información
				</a>
				<div class="clear"></div>
				<hr>
				<div class="quick-info">
					<h3 class="highlight">Tiempo de respuesta</h3>

					<p><?php echo $tiempo_respuesta ?></p>
				</div><!-- quick-info -->
				<?php if($ts->afirmativa_ficta == '1' || $ts->negativa_ficta == '1') { ?>
					<hr>
					<div class="quick-info">
						<h3 class="highlight">¿Qué pasa si no te responden a tiempo?</h3>
						<?php
							$afirmativa_ficta = $ts->afirmativa_ficta;
							$negativa_ficta = $ts->negativa_ficta;

							if($afirmativa_ficta == '1')
								echo '<p>Puedes asumir que la respuesta a tu petición es afirmativa.</p>';
							if($negativa_ficta == '1')
								echo '<p>Puedes asumir que la respuesta a tu petición es negativa.</p>';
						?>
					</div><!-- quick-info -->
				<?php } ?>
				<?php
				// Áreas de pago
				if($area_pago != ''){ ?>
					<hr>
					<div class="quick-info">
						<?php
						echo '<h3 class="highlight">Áreas de pago</h3>';
						echo '<ul class="[ none ]">';
						foreach ($area_pago as $key => $value) {
							echo '<li>'.$value->descripcion.'</li>';
						} // end foreach
						echo '</ul>';
						?>
					</div><!-- quick-info -->
				<?php } ?>
				<?php
				$indicePrecio = 0;
				// Costo o costos del trámite o servicio
				if($costo != ''){ ?>
					<hr>
					<div class="quick-info">
					<?php

					foreach ($costo as $key => $value) {
						if($value->concepto == 1){
							echo '<h3 class="highlight">Costo</h3>';
							echo '<p>'.($value->monto == '0.00' ? 'variable' : '$'.$value->monto).'</p>';
						} else {
							if($indicePrecio == 0){
								echo '<h3 class="highlight">Costos</h3>';
								echo '<div class="[ tabla-precio ] [ margin-bottom ]">';
							}
							echo '<div class="costo">';
							echo '<div class="numero-costo">';
							echo '<p>'.($value->monto == '0.00' ? 'variable' : '$'.$value->monto).'</p>';
							echo '</div>';
							echo '<div class="nombre-costo">';
							echo '<p>'.$value->concepto.'</p>';
							echo '</div>';
							echo '</div>';

							$indicePrecio = $indicePrecio + 1;
							if(sizeOf($costo) == $indicePrecio)
								echo '</div>';
						}
					} // end foreach ?>
					</div>
				<?php
				} else {
					echo '<hr><div class="quick-info">';
					echo '<h3 class="highlight">Costo</h3>';
					echo '<p>Sin costo</p>';
					echo '</div>';
				}
				?>
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
						<div>
							<?php if($documento != ''){
								echo '<h3 class="highlight">Documento(s) o beneficio(s) a obtener</h3>';
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
					</article>
				</div><!--quick-info -->
				<div class="quick-info">
					<h3 class="highlight">Denuncia actos de corrupción</h3>
					<a href="http://www.anticorrupcion.df.gob.mx/index.php/sistema-de-denuncia-ciudadana" target="_blank" class="block columna xmall-10 center">
						<img class="full" src="<?php echo base_url() ?>assets/img/logo-anticorrupcion.png" alt="">
					</a>
				</div>
			</aside>
		</div><!-- main-content large-->
	</div><!-- width -->
</div><!-- main -->
