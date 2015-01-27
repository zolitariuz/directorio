<!doctype html>
	<head>
		<script>
			(function(f,b,g){
				var xo=g.prototype.open,xs=g.prototype.send,c;
				f.hj=f.hj||function(){(f.hj.q=f.hj.q||[]).push(arguments)};
				f._hjSettings={hjid:9909, hjsv:2};
				function ls(){f.hj.documentHtml=b.documentElement.outerHTML;c=b.createElement("script");c.async=1;c.src="//static.hotjar.com/c/hotjar-9909.js?sv=2";b.getElementsByTagName("head")[0].appendChild(c);}
				if(b.readyState==="interactive"||b.readyState==="complete"||b.readyState==="loaded"){ls();}else{if(b.addEventListener){b.addEventListener("DOMContentLoaded",ls,false);}}
				if(!f._hjPlayback && b.addEventListener){
					g.prototype.open=function(l,j,m,h,k){this._u=j;xo.call(this,l,j,m,h,k)};
					g.prototype.send=function(e){var j=this;function h(){if(j.readyState===4){f.hj("_xhr",j._u,j.status,j.response)}}this.addEventListener("readystatechange",h,false);xs.call(this,e)};
				}
			})(window,document,window.XMLHttpRequest);
		</script>
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