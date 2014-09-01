<?php if(isset($usuario)) { ?>

<div class="main">
	<div class="width">
		<p>Usuario: <?php echo $usuario['nombre']; ?></p>

		<?php if($usuario['is_admin'] == 't') { ?>
			<p>Usuario administrador</p>
		<?php } ?>
	
		<h2>Panel de administración</h2>
		<p>Aquí podrás agregar, modificar y eliminar los avisos, anuncios y preguntas del portal</p>

		<a href="<?php echo base_url().'index.php/gestor_contenidos/agregar_contenido/'; ?>">Agregar contenido</a>
		<a href="<?php echo base_url().'index.php/gestor_contenidos/editar_contenido/'.$usuario["id_usuario"]; ?>">Editar contenido</a>
		<a href="<?php echo base_url().'index.php/gestor_contenidos/ver_contenido/'.$usuario["id_usuario"]; ?>">Ver contenido</a>
	</div>
</div>

<?php } else { header('Location: '.base_url().'index.php/login'); } ?>