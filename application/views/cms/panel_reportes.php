<?php if(isset($usuario)) { ?>

<div class="main">
	<div class="width">
		<div class="full">
			<section class="busqueda clearfix">
				<h2 class="text-center">Panel de reportes</h2>
				<p class="columna xmall-10 center">Busca un trámite/servicio para ver sus reportes.</p>
				<form class="main-search hero clearfix main-search-reportes" action="#">
					<input type="search" class="span xmall-11">
					<input type="hidden" name="tags_id" id="ts_cms_id" value="x" />
					<button type="submit" class="span xmall-1"><i class="fa fa-plus"></i></button>
				</form>
			</section><!-- busqueda -->
			<p class="success hide"></p>
			<p class="error hide"></p>
			<section>
				<div class="tabla-ts columna xmall-12">
					<?php 
					if($nombres_ts_comunes != ''){ 
					?>
						<div class="fila header">
							<p class="columna xmall-10 text-center">Nombre de trámite o servicio</p>
							<p class="text-center columna xmall-2">Eliminar</p>
						</div>
					<?php
						foreach ($nombres_ts_comunes as $key => $value) {
							echo '<div class="fila">';
							echo '<p class="columna xmall-10">'.$value->nombre_ts.'</p>';
							echo '<a href="" data-ts="'.$value->id_tramite_servicio.'" class="text-center columna xmall-2">Eliminar</a>';
							echo '</div>';		
						} // end foreach
					}// if nombres_ts_comunes no existe
					?>
					
				</div>
			</section>
			
			
			
		</div>
	</div>
</div>
<?php } else { header('Location: '.base_url().'index.php/login'); } ?>