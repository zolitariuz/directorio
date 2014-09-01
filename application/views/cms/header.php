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

		<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">

		<script type="text/javascript" src="//use.typekit.net/jro5mkt.js"></script>
		<script type="text/javascript">try{Typekit.load();}catch(e){}</script>
	</head>

	<body>
		<!--[if lt IE 9]>
			<p class="chromeframe">Estás usando una versión <strong>vieja</strong> de tu explorador. Por favor <a href="http://browsehappy.com/" target="_blank"> actualiza tu explorador</a> para tener una experiencia completa.</p>
		<![endif]-->
		

		<div class="container">
			<header class="clearfix">
				<p>Usuario: <?php echo $this->session->userdata('nombre'); ?></p>

				<?php if($this->session->userdata('is_admin') == 't') { ?>
					<p>Usuario administrador</p>
				<?php } ?>
			</header>