<?php if(isset($usuario)) { ?>

<div class="main">
	<div class="width">
		<h2 class="text-center">Panel de administración de contenidos</h2>
		<div class="columna xmall-12 large-10 xlarge-8 center">
			<?php if($_SESSION['is_admin'] == 't') { ?>
			<a href="<?php echo base_url().'index.php/gestor_contenidos/agregar_contenido/'?>" class="block boton vertical columna xmall-6 margin-bottom">
				<i class="icon-ts-icon-filled-agregar-contenido"></i>
				<!-- <i class="icon-ts-icon-filled-agregar-contenido"></i> -->
				Agregar contenido
			</a>
			<a href="<?php echo base_url().'index.php/gestor_contenidos/agregar_usuario/'?>" class="block boton vertical columna xmall-6 margin-bottom">
				<i class="icon-ts-icon-filled-agregar-usuario"></i>
				Agregar usuario
			</a>
			<?php } ?>
			<div class="clear"></div>
			<a href="<?php echo base_url().'index.php/gestor_contenidos/editar_contenido/'?>" class="block boton vertical columna xmall-6 margin-bottom">
				<i class="icon-ts-icon-filled-editar-contenido"></i>
				Editar contenido
			</a>
			<a href="<?php echo base_url().'index.php/gestor_contenidos/mas_solicitados/'?>" class="block boton vertical columna xmall-6 margin-bottom">
				<i class="icon-ts-icon-filled-tramites-y-servicios-mas-solicitados"></i>
				Trámites y servicios mas solicitados
			</a>
			<div class="clear"></div>
			<a href="<?php echo base_url().'index.php/gestor_contenidos/panel_reportes/'?>" class="block boton vertical columna xmall-6 margin-bottom">
				<i class="icon-ts-icon-filled-reportes"></i>
				Reportes de trámites/servicios
			</a>
		</div>
	</div>
</div>
<?php } else { header('Location: '.base_url().'index.php/login'); } ?>