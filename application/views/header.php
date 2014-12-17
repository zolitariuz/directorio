<!doctype html>
	<head>
		<meta charset="utf-8">
		<title>Trámites</title>

		<link rel="shortcut icon" href="<?php echo base_url() ?>assets/img/favicon.ico" type="image/x-icon">
		<link rel="icon" href="<?php echo base_url() ?>assets/img/favicon.ico" type="image/x-icon">

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
					<div class="logo no-large">
						<img class="img-full" src="<?php echo base_url() ?>assets/img/ciudad-de-mexico-logo.png" alt="">
					</div><div class="header-top">
						<a href="#" class="logo-bloque large">
							<img class="img-full" src="<?php echo base_url() ?>assets/img/ciudad-de-mexico-logo.png" alt="">
						</a><h1 class="">
							<a class="[ block ]" href="<?php echo base_url() ?>">
								<img class="img-full" src="<?php echo base_url() ?>assets/img/logo-tramites.png" alt="">
							</a>
							<span class="[ large ] [ slogan ] [ text-right ]">
								<small class="[ ]">"Transparencia y Certeza Jurídica"</small>
							</span>
						</h1><span class="[ header__icon ]">
							<i class="icon-ts-agregar-contenido"></i>
						</span>
					</div><div class="menu no-large">
						<i class="[ fa fa-bars ] [ full ] [ text-center ]"></i>
					</div><div class="search no-large">
						<i class="[ fa fa-search ] [ full ] [ text-center ]"></i>
					</div>
				</div><!-- width -->
				<nav class="large">
					<div class="width">
						<a class="text-center <?php if ( $seccion == 'Oficinas atencion' ) { echo 'active'; } ?>" href="<?php echo base_url().'index.php/instituciones/oficinas_atencion_ciudadana' ?>">
							Directorio de áreas de atención ciudadana
						</a><a class="text-center <?php if ( $seccion == 'Trámites y servicios en linea' ) { echo 'active'; } ?>" href="<?php echo base_url().'index.php/tramites_servicios/ts_en_linea' ?>">
							Trámites y servicios en línea
						</a><a class="text-center" href="#">
							Preguntas frecuentes
						</a>
					</div><!-- width -->
				</nav>
				<div class="barra avisos large">
					<div class="width clearfix">
						<h3 class="block obscuro columna xmall-2 text-center">Avisos</h3>
						<div class="mensaje span xmall-10">
							<p class="hide highlight">
								<?php
								foreach ($avisos as $key => $value) {
									echo '<span>';
									// ¿el aviso tiene link?
									if(trim($value['tipo_contenido']) == 'link') {
										echo '<a target="_blank" href="'.$value['url'].'">';
										echo $value['contenido'];
										echo '</a>';
									} else {
										echo $value['contenido'];
									}
									echo '</span>';
									echo '|';
								}// foreach avisos
								?>
							</p>
						</div>
					</div><!-- width -->
				</div>
				<nav class="no-large">
					<a class="text-center <?php if ( $seccion == 'Oficinas atencion' ) { echo 'active'; } ?>" href="<?php echo base_url().'index.php/instituciones/oficinas_atencion_ciudadana' ?>">Directorio de áreas de atención ciudadana</a>
					<a class="text-center <?php if ( $seccion == 'Trámites y servicios en linea' ) { echo 'active'; } ?>" href="<?php echo base_url().'index.php/tramites_servicios/ts_en_linea' ?>">Trámites y servicios en línea</a>
					<a class="text-center" href="#">Preguntas frecuentes</a>
				</nav>
				<form class="main-search main-search-movil clearfix" action="#">
					<input type="search" class="span xmall-10">
					<input type="hidden" name="tags_id" id="ts_movil_id" value="x" />
					<button type="submit" class="span xmall-2"><i class="fa fa-search"></i></button>
				</form>
			</header>
