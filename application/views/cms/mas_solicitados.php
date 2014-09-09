<?php if(isset($usuario)) { ?>

<div class="main">
	<a href="<?php echo base_url().'index.php/gestor_contenidos/panel_admin/' ?>" class="margin-bottom">Regresar a panel de administración</a>
	<div class="width">
		<div class="full">
			<?php 
				if(isset($success)){
					echo '<p class="success">'.$success.'</p>';
				} else if(isset($error)){
					echo '<p class="error">'.$error.'</p>';
				}
			?>
			
			<section class="busqueda clearfix">
				<h2 class="text-center">Trámites y servicios más solicitados</h2>
				<p class="columna xmall-8 center">Para agregar un trámite a la lista de más solicitados, utiliza la barra de búsqueda. Recuerda que solo puede haber 15 trámites y/o servicios más solicitados.</p>
				<form class="main-search hero clearfix main-search-cms" action="#">
					<input type="search" class="span xmall-11">
					<input type="hidden" name="tags_id" id="ts_cms_id" value="x" />
					<button type="submit" class="span xmall-1"><i class="fa fa-plus"></i></button>
				</form>
			</section><!-- busqueda -->

			<section>
				Listado de trámites y/o servicios mas solicitados.
				<div class="tabla columna xmall-10">
					<div class="fila header">
						<div class="tramite-servicio columna xmall-10">
							<p class="text-center">Nombre de trámite o servicio</p>
						</div>
						<div class="columna xmall-2">
							<p class="text-center">Eliminar</p>
						</div>
					</div>
					<div class="fila">
						<div class="tramite-servicio columna xmall-10">
							<p class="">Dictamen Técnico u Opinión Técnica para la instalación, modificación, colocación o retiro de anuncios y/o publicidad exterior en inmuebles afectos al patrimonio cultural urbano y/o en áreas de conservación patrimonial</p>
						</div>
						<div class="columna xmall-2">
							<a href="#" class="text-center block">Eliminar</a>
						</div>
					</div>
				</div>
			</section>
			
			
			
		</div>
	</div>
</div>

<?php } else { header('Location: '.base_url().'index.php/login'); } ?>