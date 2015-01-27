<!doctype html>
	<head>
		<meta charset="utf-8">
		<title>Trámites</title>
		<link rel="shortcut icon" href="images/favicon.ico">
		<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/style.css">
		<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/font.css">
		<meta name="description" content="">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="cleartype" content="on">
		<!--[if IE]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
		<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
		<script type="text/javascript" src="//use.typekit.net/jro5mkt.js"></script>
		<script type="text/javascript">try{Typekit.load();}catch(e){}</script>
	</head>
	<body class="cms">
		<!--[if lt IE 9]>
			<p class="chromeframe">Estás usando una versión <strong>vieja</strong> de tu explorador. Por favor <a href="http://browsehappy.com/" target="_blank"> actualiza tu explorador</a> para tener una experiencia completa.</p>
		<![endif]-->
		<div class="container">
			<header class="clearfix">
				<div class="width clearfix">
					<h1>
						<a class="block" href="<?php echo base_url('/gestor_contenidos/panel_admin') ?>">
							<img class="img-full" src="<?php echo base_url() ?>assets/img/logo-tramites-blanco.png" alt="">
						</a>
					</h1><nav>
						<?php
						// ¿Ya existe una sesión?
						if(isset($_SESSION['id_usuario'])){
							// Jala datos de usuario activo
							$nombre_usuario = $_SESSION['usuario'];
							$is_admin = $_SESSION['is_admin'];
						?>
							<p class=""><i class="fa fa-user"></i> <?php echo $nombre_usuario ?></p>
						<?php
							if($is_admin == 't')
								$rol = 'administrador';
							else if ($is_admin == 'f')
								$rol = 'editor';
						?>
							<p class=""><i class="fa fa-male"></i> <?php echo $rol ?></p>
							<a class="" href="<?php echo base_url().'index.php/gestor_contenidos/logout/'?>"><i class="fa fa-sign-out"></i></a>
						<?php
						} // end if
						?>
					</nav>
				</div>
			</header>