<?php //if(isset($usuario)) { ?>

	<div class="main">
		<div class="width">
			<div class="columna xmall-12">
				<h3>Pregunta</h3>
				<h4><?php echo $pregunta['pregunta'] ?></h4>
				<h4>Respuestas totales: <?php echo $num_respuestas ?></h4>
				<div class="columna xmall-6">
					<canvas id="chartRespuestas"></canvas>
				</div>
				<div class="columna xmall-6">
					<canvas id="donaRespuestas"></canvas>
				</div>
			</div>
		</div>
	</div>

<?php // } else { header('Location: '.base_url().'index.php/login'); } ?>