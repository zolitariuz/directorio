<?php if(isset($usuario)) { ?>

<div class="main">
	<div class="width">
		<h2 class="text-center">Panel de administración de contenidos</h2>

		<div class="columna xmall-12 large-10 xlarge-8 center">
			<?php if($_SESSION['is_admin'] == 't') { ?>
			<a href="<?php echo base_url().'index.php/gestor_contenidos/agregar_contenido/'?>" class="block boton vertical columna xmall-6 margin-bottom">
				<i class="fa fa-plus"></i>
				Agregar contenido
			</a>
			<a href="<?php echo base_url().'index.php/gestor_contenidos/agregar_usuario/'?>" class="block boton vertical columna xmall-6 margin-bottom">
				<i class="fa fa-user"></i>
				Agregar usuario
			</a>
			<?php } ?>
			<div class="clear"></div>
			<a href="<?php echo base_url().'index.php/gestor_contenidos/editar_contenido/'?>" class="block boton vertical columna xmall-6 margin-bottom">
				<i class="fa fa-pencil"></i>
				Editar contenido
			</a>
			<a href="<?php echo base_url().'index.php/gestor_contenidos/ver_contenido/'?>" class="block boton vertical columna xmall-6 margin-bottom">
				<i class="fa fa-eye"></i>
				Ver contenido
			</a>
		</div>

	</div>
</div>

<?php } else { header('Location: '.base_url().'index.php/login'); } ?>