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
		<div id="fb-root"></div>
		<script>
			(function(d, s, id) {
			  var js, fjs = d.getElementsByTagName(s)[0];
			  if (d.getElementById(id)) return;
			  js = d.createElement(s); js.id = id;
			  js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&appId=551510448309522&version=v2.0";
			  fjs.parentNode.insertBefore(js, fjs);
			}(document, 'script', 'facebook-jssdk'));
		</script>

		<div class="container">
			<header class="clearfix">
				<div class="width clearfix">
					<div class="menu no-large">
						<i class="fa fa-bars"></i>
					</div>
					<div class="header-top">
						<a href="#" class="logo-bloque">
							<img class="img-full" src="<?php echo base_url() ?>assets/img/ciudad-de-mexico-logo.png" alt="">
						</a><h1 class="">
							<a href="<?php echo base_url() ?>">
								<img class="img-full" src="<?php echo base_url() ?>assets/img/logo-tramites.png" alt="">
							</a>
						</h1>
					</div><!-- header-top -->
					<div class="search no-large">
						<i class="hide fa fa-search"></i>
					</div>
				</div><!-- width -->
				<nav class="large">
					<div class="width">
						<a class="text-center" href="#">
							Oficinas de atención ciudadana
						</a><a class="text-center" href="#">
							Trámites y servicios en línea
						</a><a class="text-center" href="#">
							Ayuda
						</a>
					</div><!-- width -->
				</nav>
				<div class="barra avisos">
					<div class="width clearfix">
						<h3 class="blok obscuro span xmall-1 text-center">Avisos</h3>
						<div class="mensaje columna xmall-11">
							<p class="hide highlight">
								<?php
								foreach ($avisos as $key => $value) {
									echo '<span>';
									// ¿el aviso tiene link?
									if(trim($value['tipo_contenido']) == 'link') {
										echo '<a href="'.$value['url'].'">';
										echo $value['contenido'];
										echo '</a>';
									} else {
										echo $value['contenido'];
									}
									echo '</span>';
									echo '|';
								}// foreach anuncio
								?>
							</p>
						</div>
					</div><!-- width -->
				</div>
				<nav class="no-large">
					<a href="#">Trámites más buscados</a>
					<a href="#">Trámites y servicios en línea</a>
					<a href="#">Modelo integral de atención ciudadana</a>
				</nav>
			</header>