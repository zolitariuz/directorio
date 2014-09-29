<div class="main">

	<div class="width">
		<div class="clear"></div>
		<ul class="breadcrumbs">
			<li><a href="<?php echo base_url() ?>"><i class="fa fa-home"></i>Inicio</a></li>
			<li>></li>
			<li class="actual">Instituciones</li>
		</ul>
		<section class="mas-comunes clearfix">
			<h2 class="text-center highlight">Trámites y servicios en linea</h2>
			<?php
				foreach ($ts_en_linea as $key => $value) {
					$nivel = $value->nvl_automatizacion;
					$link = $value->url_nvl_automatizacion;
					
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
		</section>
		<div class="clear"></div>
	</div><!-- width -->
</div><!-- main -->