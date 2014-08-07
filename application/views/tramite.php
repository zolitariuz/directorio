<div class="main">
	<div class="width">
		<div class="no-xmall large main-busqueda columna large-4">
			<h2 class="text-center">Buscar trámite o servicio</h2>

			<form class="main-search hero clearfix" action="#">
				<input type="text" class="span xmall-10">
				<button type="submit" class="span xmall-2"><i class="fa fa-search"></i></button>
			</form>

			<h3 class="text-center">O también puedes buscar por:</h3>

			<a href="#" class="block text-center boton solid full margin-bottom">Delegación</a>
			<a href="#" class="block text-center boton solid full margin-bottom">Dependencia</a>
			<a href="#" class="block text-center boton solid full margin-bottom">Categorías de trámites</a>
			<a href="#" class="block text-center boton solid full margin-bottom">Categorías de servicios</a>
		</div> <!-- /.main-busqueda -->
		<div class="main-content columna large-8 full">
			
			<h2 class="hero text-center"><?php echo $ts->nombre_tramite; ?></h2>

		<div class="quick-access-menu">
			<a href="#" class="quick-link first">
				<i class="fa fa-university"></i>
				Ente responsable: <br />
				<?php echo $ts->ente; ?>
			</a><a href="" class="quick-link">
				<i class="fa fa-clock-o"></i>
				Tiempo de respuesta:<br />
				<?php
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
				?>
			</a><a href="" class="quick-link last">
				<i class="fa fa-map-marker"></i>
				Áreas de atención
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

					$documentoOficial = '';
					$numReq = 1;
					foreach ($requisitos as $key => $value) {
						if($documentoOficial != $value->documento_oficial){
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
						if($documentoOficial != $value->documento_oficial){
							echo '</p></div>';
						} else {
							$numReqAcr = $numReqAcr + 1;
						}
					}
					?>
				</div>
			</article>
			<article class="transform" data-content="formatos-requeridos">
				<h2>Formatos requeridos</h2>
				<div class="no-xmall large modal-to-be">
					<p></p>
				</div>
			</article>
			<!-- <article class="transform" data-content="beneficio-resultado">
				<h2>Beneficio / Documento a obtener</h2>
				<div class="no-xmall large modal-to-be">
					<p>Contar con instalaciones de drenaje en óptimas condiciones de funcionamiento, para evitar focos infecciosos y la óptima circulación.</p>
				</div>
			</article> -->

		</section><!-- /.content -->
	</div><!-- width -->
</div><!-- main -->