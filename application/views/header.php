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
						<a href="#" class="block columna xmall-1">
							<img class="img-full" src="<?php echo base_url() ?>assets/img/ciudad-de-mexico-logo.png" alt="">
						</a>
						<a href="#" class="block columna xmall-1 tramites-logo">
							<img src="<?php echo base_url() ?>assets/img/tramites-logo.png" alt="">
						</a>
						<div class="columna xmall-10 clearfix">
							<h1 class="block columna xmall-4">
								<a href="<?php echo base_url() ?>">
									Trámites CD<strong>MX</strong>
								</a>
							</h1>
							<div class="clear"></div>
							<nav class="large">
								<a href="#">
									Anuncios
								</a><a href="#">
									Oficinas de atención ciudadana
								</a><a href="#">
									Trámites y servicios en línea
								</a><a href="#">
									Modelo integral de atención ciudadana
								</a>
							</nav>
						</div>
						<div class="clear"></div>
						<div class="barra avisos clearfix">
							<h3 class="blok obscuro columna xmall-2 text-center">Avisos</h3>
							<div class="mensaje columna xmall-10">
								<p class="highlight">
									<?php
									foreach ($avisos as $key => $value) {
										echo '<span>';

										// ¿el aviso tiene link?
										if(trim($value['tipo_contenido']) == 'link') {
											echo '<a href="http://'.$value['url'].'">';
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
						</div>
					</div><!-- header-top -->
					<div class="search no-large">
						<i class="hide fa fa-search"></i>
					</div>
				</div><!-- width -->
				<nav class="no-large">
					<a href="#">Trámites más buscados</a>
					<a href="#">Trámites y servicios en línea</a>
					<a href="#">Modelo integral de atención ciudadana</a>
				</nav>
			</header>