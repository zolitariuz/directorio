<?php //if(isset($usuario)) { ?>

<div class="main">
	<div class="width">
		
		<a href="<?php echo base_url().'index.php/gestor_contenidos/panel_admin/' ?>">Regresar a panel de administración</a>
	
		<div class="full">
			<div class="columna xmall-12">
				<h3>Pregunta</h3>
				<p><?php echo $pregunta['pregunta'] ?></p>
				<h3>Respuestas</h3>
				<p>Respuestas totales: <?php echo $num_respuestas ?></p>
				<div class="columna xmall-6">
					<canvas id="chartRespuestas"></canvas>
				</div>
				<div class="columna xmall-6">
					<canvas id="donaRespuestas"></canvas>
				</div>

				<p>
			</div>
		</div>
	</div>
</div>

<?php // } else { header('Location: '.base_url().'index.php/login'); } ?>