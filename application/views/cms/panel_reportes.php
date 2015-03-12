<?php if(isset($_SESSION['id_usuario'])) { ?>

<div class="main">
	<div class="width">
		<div class="full">
			<section class="busqueda clearfix">
				<h2 class="text-center">Panel de reportes</h2>
				<p class="columna xmall-10 center">En esta sección puedes buscar los reportes relacionados a un trámite o servicio. Los reportes incluyen las visitas totales, comentarios y calificación promedio.</p>
				<form class="main-search hero  main-search-reportes clearfix [ input-group ]" action="#">
					<input type="text" class="span xmall-11">
					<input type="hidden" name="tags_id" id="ts_cms_id" value="x" />
					<button type="submit" class="span xmall-1"><i class="icon-ts-buscar"></i></button>
				</form>
			</section><!-- busqueda -->
			<div class="clear"></div>
			<section class="columna xmall-12 visitas-mensuales hide">
				<h4>Visitas totales: <span></span></h4>
			</section>
			<section class="columna xmall-12 feedback hide">
				<h4 id="comentarios" class="columna xmall-6">Comentarios totales: <span></span></h4>
				<h4 id="promedio" class="columna xmall-6">Calificación promedio: <span></span></h4>
				<div class="columna xmall-12 tabla">
					<div class="fila header clearfix text-center">
						<div class="columna xmall-5">
							Comentarios
						</div>
						<div class="columna xmall-2">
							Calificación utilidad
						</div>
						<div class="columna xmall-2">
							Calificación servicio
						</div>
						<div class="columna xmall-3">
							¿Sirvió la información?
						</div>
					</div>
				</div>
			</section>
		</div>
	</div>
</div>
<?php } else { header('Location: '.base_url().'index.php/login'); } ?>