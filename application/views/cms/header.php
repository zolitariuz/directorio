<!doctype html>
	<head>

		<meta charset="utf-8">

		<title>Trámites</title>

		<link rel="shortcut icon" href="images/favicon.ico">
		<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/style.css">

		<meta name="description" content="">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="cleartype" content="on">
		<!--[if IE]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->

		<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

		<script type="text/javascript" src="//use.typekit.net/jro5mkt.js"></script>
		<script type="text/javascript">try{Typekit.load();}catch(e){}</script>
	</head>

	<body>
		<!--[if lt IE 9]>
			<p class="chromeframe">Estás usando una versión <strong>vieja</strong> de tu explorador. Por favor <a href="http://browsehappy.com/" target="_blank"> actualiza tu explorador</a> para tener una experiencia completa.</p>
		<![endif]-->
		

		<div class="container">
			<header class="clearfix">
				<div class="full">
					<h1 class="block columna xmall-6">
						<a href="<?php echo base_url() ?>">
							Trámites CD<strong>MX</strong>
						</a>
					</h1>
					<div class="columna xmall-6">
						<?php 
						// ¿Ya existe una sesión?
						if(isset($_SESSION['id_usuario'])){
							// Jala datos de usuario activo
							$nombre_usuario = $_SESSION['usuario'];
							$is_admin = $_SESSION['is_admin'];
						?>
							<p class="columna xmall-5">Usuario: <?php echo $nombre_usuario ?></p>
						<?php 
							if($is_admin == 't') 
								$rol = 'administrador';
							else if ($is_admin == 'f') 
								$rol = 'editor';
						?>
							<p class="columna xmall-4">Rol: <?php echo $rol ?></p>
							<a href="<?php echo base_url().'index.php/gestor_contenidos/logout/'?>" class="columna xmall-3"><i class="fa fa-sign-out"></i></a>
						<?php 
						} // end if
						?>
						
					</div>	
				</div>
			</header>

