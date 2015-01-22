<?php if(isset($_SESSION['id_usuario'])) { ?>
<div class="main">
	<div class="width">
		<div class="full">
			<section class="busqueda clearfix">
				<h2 class="text-center">Trámites y servicios más solicitados</h2>
				<p class="columna xmall-10 center">Para agregar un trámite a la lista de más solicitados, utiliza la barra de búsqueda. Recuerda que solo puede haber 15 trámites y/o servicios más solicitados.</p>
				<form class="[ main-search main-search-home hero ] [ input-group ] [ full ] [ clearfix ] [ main-search-cms ]" action="#">
					<input type="search" class="[ span xmall-10 large-11 ]" placeholder="Escribe el nombre de un trámite o servicio y agrégalo">
					<input type="hidden" name="tags_id" id="ts_cms_id" value="x" />
					<button type="submit" class="[ span xmall-2 large-1 ]"><i class="fa fa-plus"></i></button>
				</form>
			</section><!-- busqueda -->
			<p class="success hide"></p>
			<label class="error hide"></label>
			<section class="clearfix">
				<div class="tabla tabla-ts columna xmall-12">
					<div class="fila header clearfix">
						<div class="columna xmall-10 text-center">Nombre de trámite o servicio</div>
						<div class="text-center columna xmall-2">Eliminar</div>
					</div>
					<?php
						foreach ($nombres_ts_comunes as $key => $value) {
							echo '<div class="fila clearfix">';
							echo '<div class="columna xmall-10">'.$value->nombre_ts.'</div>';
							echo '<a href="" data-ts="'.$value->id_tramite_servicio.'" class="text-center columna xmall-2">Eliminar</a>';
							echo '</div>';
						} // end foreach
					?>
				</div>
			</section>



		</div>
	</div>
</div>

<?php } else { header('Location: '.base_url().'index.php/login'); } ?>