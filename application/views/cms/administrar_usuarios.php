<?php if(isset($_SESSION['id_usuario'])) { ?>

	<div class="main">
		<div class="width clearfix">
			<div class="editar-avisos" class="columna xmall-12">
				<h3 class="text-center margin-bottom">Administrar usuarios</h3>
				<div class="tabla">
					<div class="fila header clearfix">
						<div class="columna xmall-3 text-center">
							Nombre de usuario
						</div>
						<div class="columna xmall-4 text-center">
							Nombre completo
						</div>
						<div class="columna xmall-3 text-center">
							Rol
						</div>
						<div class="columna xmall-2 text-center">
							Editar
						</div>
					</div>
					<div class="clear"></div>
					<?php 
					foreach ($usuarios as $key => $usuario) { 
						$link_editar = '<a href="'.base_url().'index.php/gestor_contenidos/editar_usuario/'.$usuario['id_usuario'].'">Editar</a>';
						$link_eliminar = '<a href="'.base_url().'index.php/gestor_contenidos/eliminar_usuario/'.$usuario['id_usuario'].'">Editar</a>';
					?>
						<div class="fila clearfix">
							<div class="columna xmall-3 text-center">
								<?php echo $usuario['usuario']; ?>
							</div>
							<div class="columna xmall-4 text-center">
								<?php echo $usuario['nombre'].' '.$usuario['apellidos']; ?>
							</div>
							<div class="columna xmall-3 text-center">
								<?php echo ($usuario['is_admin']=='t') ? 'administrador' : 'editor'; ?>
							</div>
							<div class="columna xmall-2 text-center">
								<?php echo $link_editar ?>
							</div>
						</div>
					<?php } ?>
				</div><!-- tabla -->
				<div class="columna xmall-4 center">
					<a href="<?php echo base_url().'index.php/gestor_contenidos/agregar_usuario/'?>" class="block boton chico center">Agregar usuario</a>
				</div>
			</div>
		</div><!-- width -->
	</div><!-- main -->
<?php } else {
	header('Location: '.base_url().'index.php/login');
} ?>