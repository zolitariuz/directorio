<!doctype html>
	<head>
		<meta charset="utf-8">
		<title>Trámites CDMX</title>

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


		<meta property="fb:app_id"          content="551510448309522" />
		<meta property="og:type"            content="website" />
		<meta property="og:url"             content="http://samples.ogp.me/136756249803614" />
		<meta property="og:title"           content="Chocolate Pecan Pie" />
		<meta property="og:image"           content="https://fbcdn-dragon-a.akamaihd.net/hphotos-ak-xap1/t39.2178-6/851565_496755187057665_544240989_n.jpg" />
		<meta property="cookbook:author"    content="http://samples.ogp.me/390580850990722" />
	</head>
	<body>
		<!--[if IE ]>
			<div class="chromeframe" style=" margin-top: 10px; ">
				<center>
					<img class="[ text-center ]" src="<?php echo base_url() ?>assets/img/internet-explorer-tile_48x48.png" alt="">
				</center>
				<p class="[ text-center ]">Este sitio no está optimizado para <strong>Internet Explorer</strong> por favor usa <a href="http://browsehappy.com/" target="_blank"> otro navegador</a>.</p>
			</div>
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
						<a target="_blank" href="http://df.gob.mx/">
							<img class="img-full" src="<?php echo base_url() ?>assets/img/ciudad-de-mexico-logo-gray.png" alt="">
						</a>
					</div><div class="header-top">
						<a target="_blank" href="http://df.gob.mx/" class="logo-bloque large">
							<img class="img-full" src="<?php echo base_url() ?>assets/img/ciudad-de-mexico-logo-gray.png" alt="">
						</a><h1 class="">
							<a class="[ block ]" href="<?php echo base_url() ?>">
								<img class="img-full" src="<?php echo base_url() ?>assets/img/logo-tramites.png" alt="">
							</a>
							<span class="[ large ] [ slogan ] [ text-right ]">
								<small class="[ ]">"Transparencia y Certeza Jurídica"</small>
							</span>
						</h1><div class="[ ads ]">
							<div class="[ large ] [ beta ]">
								Versión <strong>Beta</strong>
							</div>
							<span class="[ header__icon--wrapper ] [ cycle-slideshow ]"
								data-cycle-slides=".header__icon"
								data-cycle-fx="none"
								data-cycle-log="false"
							>
								<?php foreach ($temas as $key => $value) {
									$clase_icono = $clases_iconos[$key];
									$url_tema = base_url().'index.php/temas/muestraTS/'.$value->id_cat_materia;
									?>
									<span class="[ header__icon ]">
										<a href="<?php echo $url_tema; ?>">
											<i class="<?php echo $clase_icono; ?>"></i>
										</a>
									</span>
								<?php } ?>
							</span>
						</div><!-- ads -->
					</div><?php if ( $seccion !== 'Inicio' ) { ?><div class="search no-large">
						<i class="[ fa fa-search ] [ full ] [ text-center ]"></i>
					</div><div class="menu no-large">
						<i class="[ fa fa-bars ] [ full ] [ text-center ]"></i>
					</div><?php } else { ?><div class="search no-large">
						&nbsp;
					</div><div class="menu no-large">
						<i class="[ fa fa-bars ] [ full ] [ text-center ]"></i>
					</div>
				<?php } ?>
				</div><!-- width -->
				<nav class="large">
					<div class="width">
						<a class="[ text-center ] <?php if ( $seccion == 'Oficinas atencion' ) { echo '[ active ]'; } ?>" href="<?php echo base_url().'index.php/instituciones/oficinas_atencion_ciudadana' ?>">
							Directorio de áreas de atención ciudadana
						</a><a class="[ text-center ] <?php if ( $seccion == 'Trámites y servicios en linea' ) { echo '[ active ]'; } ?>" href="<?php echo base_url().'index.php/tramites_servicios/ts_en_linea' ?>">
							Trámites y servicios en línea
						</a><a class="[ text-center ] <?php if ( $seccion == 'Consulta Gaceta' ) { echo '[ active ]'; } ?>" href="<?php echo base_url().'index.php/inicio/consulta_gaceta' ?>/">
							Consulta Gaceta
						</a><a class="[ text-center ] <?php if ( $seccion == 'Preguntas frecuentes' ) { echo '[ active ]'; } ?>" href="<?php echo base_url().'index.php/inicio/preguntas_frecuentes' ?>/">
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
					<a class="text-center <?php if ( $seccion == 'Oficinas atencion' ) { echo 'active'; } ?>" href="<?php echo base_url().'index.php/instituciones/oficinas_atencion_ciudadana' ?>">
						Directorio de áreas de atención ciudadana
					</a>
					<a class="text-center <?php if ( $seccion == 'Trámites y servicios en linea' ) { echo 'active'; } ?>" href="<?php echo base_url().'index.php/tramites_servicios/ts_en_linea' ?>">
						Trámites y servicios en línea
					</a>
					<a class="[ text-center ] <?php if ( $seccion == 'Preguntas frecuentes' ) { echo '[ active ]'; } ?>" href="<?php echo base_url().'index.php/inicio/preguntas_frecuentes' ?>/">
						Preguntas frecuentes
					</a>
				</nav>
				<form class="[ main-search main-search-movil ][ clearfix ][ input-group ]" action="<?php echo base_url().'index.php/inicio/busqueda' ?>" method="POST">
					<input type="text" class="[ span xmall-10 ][ search-input ]" name="search_term">
					<input type="hidden" name="tags_id" id="ts_movil_id" value="x" />
					<button type="submit" class="span xmall-2"><i class="fa fa-search"></i></button>
					<p class="error"></p>
				</form>
			</header>