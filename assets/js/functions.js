(function($){
	"use strict";
	$(function(){

		//***************//
		//*** ON LOAD ***//
		//***************//

		//Avisos
		$('.mensaje p').removeClass('hide');
		marqueeText('.mensaje p');

		//Trámites más comúnes
		if ( $('.masonry-container').length > 0) {
			callMasonry();
		}

		//Agregar cantidad de trámites a resultados alfabéticos
		contarItems( $('.letra'), 'li');

		//Rating
		$('.example-f').barrating({
			showSelectedRating:false,
			initialRating: 5
		});


		//***************//
		//*** CLICKS ****//
		//***************//

		//Tabs
		$('.tabs-header a').on('click', function(e){
			e.preventDefault();
			cambiarTab( $(this) );
		});

		//Modal
		$('body').on('click', '.modal .cerrar', function(){
			cerrarModal( $(this) );
		});

		//Overlays
		$('body').on('click', '.js-overlay-opener', function(){
			abrirOverlay( $(this) );
		});

		$('body').on('click', '.overlay-wrapper .cerrar', function(){
			cerrarOverlay( $(this) );
		});

		//ScrolTop
		$('body').on('click', '.scrollTo', function(){
			scrollTop( $(this) );
		});

		//Back to top
		$('body').on('click', '.back-to-top', function(){
			backToTop();
		});






		//****************//
		//***RESPONSIVE***//
		//****************//

		//** CLICKS **//

		$('.menu').on('click', function(){
			cerrarElement( $('header .main-search') );
			abrirElement( $('nav') );
		});

		$('.search').on('click', function(){
			cerrarElement( $('nav') );
			abrirElement( $('header .main-search') );
		});

		//Large
		mediaCheck({
			media: '(min-width: 64.063em)',
			entry: function() {
				//mayorQueLarge();
			},
			exit: function() {
				//menorQueLarge();
			},
			both: function() {
			}
		});

		//Medium
		mediaCheck({
			media: '(min-width: 40.063em)',
			entry: function() {
				mayorQueMedium();
			},
			exit: function() {
				menorQueMedium();
			},
			both: function() {
			}
		});

		//Acordeon
		$('body').on('click', '.acordeon-item > .boton-acordeon', function(e){
			e.preventDefault();
			abrirAcordeon( $(this) );
		});


		//****************//
		//****** CMS *****//
		//****************//
		$('.js-login-form').validate();
		$('.js-validate-usuario').validate();
		$('.js-validate-aviso').validate({
			rules: {
				aviso: {
					maxlength: 140
				},
				vigencia: {
					date: true
				}
			}
		});
		$('.js-validate-pregunta').validate({
			rules: {
				vigencia: {
					date: true
				}
			}
		});
		$('.js-validate-anuncio').validate({
			rules: {
				vigencia: {
					date: true
				}
			}
		});
		$('.feedback').validate({
			rules: {
				comentarios: {
					maxlength: 1000
				}
			}
		});
		$('.js-validate-aviso').validate({
			rules: {
				aviso: {
					maxlength: 140
				},
				vigencia: {
					date: true
				}
			}
		});

		$.datepicker.regional['es'] = {
			closeText: 'Cerrar',
			prevText: '<',
			nextText: '>',
			currentText: 'Hoy',
			monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
			monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
			dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
			dayNamesShort: ['Dom','Lun','Mar','Mié','Juv','Vie','Sáb'],
			dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sá'],
			weekHeader: 'Sm',
			dateFormat: 'dd/mm/yy',
			firstDay: 1,
			isRTL: false,
			showMonthAfterYear: false,
			yearSuffix: ''
		};
		$.datepicker.setDefaults($.datepicker.regional['es']);

	});

	function abrirElement(elemento){
		elemento.slideToggle('fast');
	}

	function cerrarElement(elemento){
		elemento.slideUp('fast');
	}

	function cambiarTab(elemento){
		var nombreTab = elemento.data('tab');
		$('.tabs-header a').removeClass('active');
		elemento.addClass('active');
		$('.tab-content > div').removeClass('active');
		$('.tab-content .tab-'+nombreTab).addClass('active');
	}

	function abrirAcordeon(elemento){
		var ul = elemento.parent('.acordeon-item').find('ul');
		var icon = elemento.closest('.acordeon-item').find('.drop');
		if( ul.hasClass('hide') ){
			$('.acordeon-item').find('ul').addClass('hide');
			ul.removeClass('hide');
			$('.acordeon-item').find('.drop').removeClass('up');
			icon.addClass('up');
		} else {
			$('.acordeon-item').find('ul').addClass('hide');
			icon.removeClass('up');
		}
	}

	function contarItems(papa, items){
		$.each(papa, function(){
			var cuantosItems = $(this).find(items).length;
			$(this).find('h2').find('span').html('('+cuantosItems+' trámites)');
		});
	}

	function mayorQueMedium(){
		//undoH2ABotones();
		callMasonry();
	}

	function menorQueMedium(){
		//h2ABotones();
		destroyMasonry();
	}

	function h2ABotones(){
		$('.transform h2').addClass('boton solid hero');
	}

	function undoH2ABotones(){
		$('.transform h2').removeClass('boton solid hero');
	}

	function abrirModal(elemento){
		var modalClass 		= elemento.parent().data('content');
		var modalContent 	= elemento.parent().find('.modal-to-be').html();
		$('.modal-content').html(modalContent, function(){
		});
		$('.modal-wrapper').fadeIn('fast', function(){
			$(this).removeClass('hide');
		});
	}

	function cerrarModal(elemento){
		var aCerrar = elemento.parent().parent();
		aCerrar.fadeOut('fast', function(){
			$(this).addClass('hide');
		});
	}

	function abrirOverlay(){
		$('.overlay-wrapper').fadeIn('fast', function(){
			$(this).removeClass('hide');
		});
	}

	function cerrarOverlay(elemento){
		var aCerrar = elemento.parent();
		aCerrar.fadeOut('fast', function(){
			$(this).addClass('hide');
		});
	}

	function toggleSeccion(elemento, hermanos){
		var aAbrir = elemento.parent().find('> div');
		if ( aAbrir.hasClass('hide') ){
			$(hermanos).slideUp('fast').addClass('hide');
			aAbrir.removeClass('hide').slideDown('fast');
		} else {
			aAbrir.slideUp('fast').addClass('hide');
		}

	}

	function callMasonry(){
		if ( $('.masonry-container').length > 0 ){
			var container = $('.masonry-container');
			var msnry = new Masonry( container[0], {
				itemSelector: '.item'
			});
		}
	}

	function destroyMasonry(){
		if ( $('.masonry-container').length > 0 ){
			var container = $('.masonry-container');
			var msnry = new Masonry( container[0] );
			msnry.destroy();
		}
	}

	function scrollTop(elemento){
		var seccion 	= elemento.data('seccion');
		var divPosicion = $("article[data-seccion='"+seccion+"']").offset().top;
		divPosicion = divPosicion - 100;
		$('html, body').animate({scrollTop: divPosicion}, 400);
	}

	function backToTop(){
		$('html, body').animate({scrollTop: 0}, 400);
	}

	function paddingMain(){
		var alturaHeader = $('header').outerHeight();
		$('header').css('position', 'fixed');
		$('.main').css('paddingTop', (alturaHeader+20));
	}

	function marqueeText(element){
		$(element).marquee({
			duration: 12000,
			pauseOnHover: true
		});
	}

})(jQuery);

function creaMapa(mapas){
	// Estilos mapa

	// Jalar coordenadas de areas de atención
	var locations = [];
	$.each(mapas, function(i, item){
		var l = [];
		var coordenadas = dameCoordenadas(item.url_ubicacion);
		var tel1 = item.telefono_1 === null ? '' : item.telefono_1;
		var ext1 = item.ext_1 === null ? '' : ' ext: ' + item.ext_1;
		var tel2 = item.telefono_2 === null ? '' : item.telefono_2;
		var ext2 = item.ext_2 === null ? '' : ' ext: ' + item.ext_2;

		var contenidoInfoWindow =
			'<h3>'+item.nombre+'</h3><h3>Dirección</h3><br /><p>' + item.calle_numero + '<br />Col. ' + item.colonia + '<br />Del. ' + item.delegacion+', ' + item.cp + '</p><h3>Teléfonos</h3><p>' + tel1 + ext1 + '</p>' + '<p>' + tel2 + ext2 + '</p>';
		if(coordenadas != -1){
			var latLongArray = coordenadas.split(',');
			l.push(contenidoInfoWindow);
			l.push(latLongArray[0]);
			l.push(latLongArray[1]);
			locations.push(l);
		}
	});

	// Crea Mapa
	var map = new google.maps.Map(document.getElementById('map'), {
	  zoom: 15,
	  mapTypeId: google.maps.MapTypeId.ROADMAP,
	  mapTypeControl: false,
	  streetViewControl: false,
	  panControl: false,
	  scrollwheel: false,
	  zoomControlOptions: {
		 position: google.maps.ControlPosition.LEFT_BOTTOM
	  }
	});

	var infowindow = new google.maps.InfoWindow({
	  maxWidth: 400
	});

	var infowindowMovil = new google.maps.InfoWindow({
	  maxWidth: 800
	});

	var marker;
	var markers = new Array();
	var marker_movil;
	var markers_movil = new Array();

	// Agregar marcadores e InfoWindows al mapa
	for (var i = 0; i < locations.length; i++) {
	  marker = new google.maps.Marker({
		position: new google.maps.LatLng(locations[i][1], locations[i][2]),
		map: map,
	  });

	  markers.push(marker);

	  google.maps.event.addListener(marker, 'click', (function(marker, i) {
		return function() {
		  infowindow.setContent(locations[i][0]);
		  infowindow.open(map, marker);
		};
	  })(marker, i));
	}
	autoCenter();

	// Autocentrar el mapa dependiendo de los marcadores
	function autoCenter() {
		//  Crea un nuevo limite
		var bounds = new google.maps.LatLngBounds();

		//  Itera todos los marcadores
		$.each(markers, function (index, marker) {
			bounds.extend(marker.position);
		});
		//  Mete los límites en el mapa
		map.fitBounds(bounds);
		var listener = google.maps.event.addListener(map, "idle", function() {
		if (map.getZoom() > 17) map.setZoom(17);
			google.maps.event.removeListener(listener);
		});
	} // autoCenter

	// obtiene coordenadas de url de base de datos
	function dameCoordenadas(url){
		var pedazos;
		var coordenadas;

		if(typeof url !== null) {
			if(url.indexOf('mapa:')>-1){
				pedazos = url.split('mapa:');
				coordenadas = pedazos[1] + ',' + pedazos[2];

			} else {
				pedazos = url.split('&');

				$.each(pedazos, function(i, val){
					if(val.indexOf('sll=')>-1){
						coordenadas = val.replace('sll=', '');

					}
				});
			}
		}

		if(typeof coordenadas === 'undefined'){
			return -1;
		} else {
			return coordenadas;
		}
	} // dameCoordenadas
}

function busquedaTS(dataTS, base_url){
	var nombreTS = $.parseJSON(dataTS);
	var srcNombreTS  = [ ];
	var mapNombreTS = { };
	var idTS;

	// Llena arreglo con nombres y ids de trámites y servicios
	$.each(nombreTS, function(i, val){
		srcNombreTS.push(val.nombre_ts);
		mapNombreTS[val.nombre_ts] = val.id_tramite_servicio;
	});

	// Autocompletado carga página en blanco con trámite o servicio
	// al seleccionar opción o dar <Enter>
	$('.main-search-movil input[type="text"]').autocomplete({
		source: srcNombreTS,
		select: function(event, ui) {
			$('#ts_movil_id').val(mapNombreTS[ui.item.value]);
			idTS = $('#ts_movil_id').attr('value');
			window.open(base_url + 'tramites_servicios/muestraInfo/' + idTS , '_self');
		},
		appendTo: '.main-search-movil'
	});
	$('.main-search-footer input[type="text"]').autocomplete({
		source: srcNombreTS,
		select: function(event, ui) {
			$('#ts_footer_id').val(mapNombreTS[ui.item.value]);
			idTS = $('#ts_footer_id').attr('value');
			window.open(base_url + 'tramites_servicios/muestraInfo/' + idTS , '_self');
		},
		appendTo: '.main-search-footer'
	});
	$('.main-search-home input[type="text"]').autocomplete({
		source: srcNombreTS,
		select: function(event, ui) {
			$('#ts_home_id').val(mapNombreTS[ui.item.value]);
			idTS = $('#ts_home_id').attr('value');
			window.open(base_url + 'tramites_servicios/muestraInfo/' + idTS , '_self');

		},
		appendTo: '.main-search-home'
	});
	$('.main-search-movil button').on('click', function(e){
		e.preventDefault();
		idTS = $('#ts_id').val();
		if(typeof idTS !== 'undefined')
			window.open(base_url + 'tramites_servicios/muestraInfo/' + idTS , '_self');
	});
	$('.main-search-header button').on('click', function(e){
		e.preventDefault();
		idTS = $('#ts_id').val();
		var searchTerm = $('.search-input').val();
	});

	$('.main-search-home button').on('click', function(e){
		e.preventDefault();
		idTS = $('#ts_home_id').val();
		var searchTerm = $('.search-input').val();

		if(searchTerm != ''){
			searchTerm = replaceDisallowedChars(searchTerm);
			window.open(base_url + 'inicio/busqueda/' + searchTerm , '_self');
			return;
		}
		$('p.error').text('Por favor ingresa una palabra antes de buscar.');
		
	});
} // busquedaTS

function replaceDisallowedChars(term){
	var new_term = term.replace(new RegExp('  ', 'g'), '||');
	return new_term.replace(new RegExp(',', 'g'), '---');
}

function agregarTS(dataTS, base_url, ts_omitir){
	var nombreTS = $.parseJSON(dataTS);
	var srcNombreTS  = [ ];
	var mapNombreTS = { };
	var idTS;

	// Llena arreglo con nombres y ids de trámites y servicios
	// omitiendo los que ya existen
	$.each(nombreTS, function(i, val){
		if(ts_omitir.indexOf(val.id_tramite_servicio) < 0){
			srcNombreTS.push(val.nombre_ts);
			mapNombreTS[val.nombre_ts] = val.id_tramite_servicio;
		}
	});

	// Autocompletado carga página en blanco con trámite o servicio
	// al seleccionar opción o dar <Enter>
	$('.main-search-cms input[type="text"]').autocomplete({
		source: srcNombreTS,
		select: function(event, ui) {
			$('#ts_cms_id').val(mapNombreTS[ui.item.value]);
			var idTS = $('#ts_cms_id').attr('value');
			var ts = ui.item.value;

			agregarTSSolicitado(idTS, ts, base_url);
			idTS = $('#ts_cms_id').val('x');
		},
		appendTo: '.main-search-cms'
	});

	$('.main-search button').on('click', function(e){
		e.preventDefault();
		var idTS = $('#ts_cms_id').val();
		var ts = $('input[type="text"]').val();

		if(idTS == 'x') {
			$('.error').text('No existe el trámite o servicio "'+ts+'."');
			$('.error').removeClass('hide');
			return 0;
		}
		agregarTSSolicitado(idTS, ts, base_url);
		idTS = $('#ts_cms_id').val('x');
	});
} // agregarTS

function agregarTSSolicitado(id_ts, ts, base_url){
	var jsonSolicitado = {};
	jsonSolicitado['id_ts'] = id_ts;

	$.post(
		base_url + "gestor_contenidos/agregar_ts_solicitado",
		jsonSolicitado,
		function(response){
			var respuesta = $.parseJSON(response);
			$('.success, .error').addClass('hide');
			if(respuesta.estatus == 'success'){
				$('.success').text(respuesta.msg);
				$('.success').removeClass('hide');
				var fila = '<div class="fila clearfix highlight"> \
								<p class="columna xmall-10">'+ts+'</p> \
								<a href="" data-ts="'+id_ts+'" class="text-center block columna xmall-2">Eliminar</a> \
							</div>';
				$(fila).insertAfter('.tabla-ts .header');
				setTimeout(function(){
					$('.fila').removeClass('highlight');
				}, 700);
			} else {
				$('.error').text(respuesta.msg);
				$('.error').removeClass('hide');
			}
		}
	);
}

function eliminarTSSolicitado(base_url){
	$('.fila a').on('click', function(e){
		e.preventDefault();

		var id_ts = $(this).data('ts');
		var jsonEliminado = {};
		jsonEliminado['id_ts'] = id_ts;

		$.post(
			base_url + "gestor_contenidos/eliminar_ts_solicitado",
			jsonEliminado,
			function(response){
				var respuesta = $.parseJSON(response);
				$('.success, .error').addClass('hide');

				$('.success').text(respuesta.msg);
				$('.success').removeClass('hide');
			}
		);
		$(this).parent().remove();
	});

}// eliminarTSSolicitado

function agregarTSReportes(dataTS, base_url){
	var nombreTS = $.parseJSON(dataTS);
	var srcNombreTS  = [ ];
	var mapNombreTS = { };
	var idTS;

	// Llena arreglo con nombres y ids de trámites y servicios
	$.each(nombreTS, function(i, val){
		srcNombreTS.push(val.nombre_ts);
		mapNombreTS[val.nombre_ts] = val.id_tramite_servicio;
	});

	// Autocompletado carga página en blanco con trámite o servicio
	// al seleccionar opción o dar <Enter>
	$('.main-search-reportes input[type="text"]').autocomplete({
		source: srcNombreTS,
		select: function(event, ui) {
			$('#ts_cms_id').val(mapNombreTS[ui.item.value]);
			var idTS = $('#ts_cms_id').attr('value');
			var ts = ui.item.value;

			muestraReporteTS(idTS, ts, base_url);
		},
		appendTo: '.main-search-reportes'
	});
	$('.main-search button').on('click', function(e){
		e.preventDefault();
		var idTS = $('#ts_cms_id').val();
		var ts = $('input[type="text"]').val();

		muestraReporteTS(idTS, ts, base_url);
	});
} // agregarTSReportes

function muestraReporteTS(id_ts, ts, base_url){
	var jsonReporte = {};
	jsonReporte['id_ts'] = id_ts;
	escondeReportes();
	$.post(
		base_url + "gestor_contenidos/muestra_reporte_ts",
		jsonReporte,
		function(response){
			var respuesta = $.parseJSON(response);
			var visitas_ar;
			var feedback_ar;

			// parte la respuesta en visitas y feedback
			$.each(respuesta, function(i, val) {
				if(i == 'visitas')
					visitas_ar = val;
				else
					feedback_ar = val;
			});

			// guarda fechas y visitas
			var meses = [];
			var visitas = [];
			var visitas_totales = 0;
			$.each(visitas_ar, function(i, val){
				fecha_ar = val.fecha.split('-');
				ano = fecha_ar[0];
				mes = dameMes(fecha_ar[1]);

				meses.push(mes + ' ' + ano);
				visitas.push(val.num_visitas);

				visitas_totales = visitas_totales + parseInt(val.num_visitas);
			});

			// guarda feedback
			var num_comentarios = 0;
			var calificaciones = 0;
			var promedio_calificacion;
			$.each(feedback_ar, function(i, val){
				var util = val.ayuda == 't' ? 'Si' : 'No';
				var fila = '<div class="fila clearfix"> \
								<div class="columna xmall-5"> \
									' + val.comentarios + '\
								</div> \
								<div class="columna xmall-2 text-center"> \
									' + val.calificacion + '\
								</div> \
								<div class="columna xmall-2 text-center"> \
									' + val.servicio + '\
								</div> \
								<div class="columna xmall-3 text-center"> \
									' + util + '\
								</div> \
							</div>';

				$(fila).appendTo('.feedback .tabla');
				num_comentarios = num_comentarios + 1;
				calificaciones = calificaciones + parseInt(val.calificacion);
			});
			promedio_calificacion = calificaciones / num_comentarios;
			promedio_calificacion = promedio_calificacion.toFixed(2);

			// muestra info y reportes
			if(visitas_totales !== 0){
				$('.visitas-mensuales span').text(visitas_totales);
				$('.visitas-mensuales').removeClass('hide');
				//$('#chartVisitasMensuales').removeClass('hide');
				$('.visitas-mensuales').append('<canvas id="chartVisitasMensuales"></canvas>');
				visitasMensuales(visitas,meses);
			} else{
				$('.visitas-mensuales').removeClass('hide');
				$('.visitas-mensuales span').text('0');
			}

			if(num_comentarios !== 0){
				$('.feedback #comentarios span').text(num_comentarios);
				$('.feedback #promedio span').text(promedio_calificacion);
				$('.feedback #promedio').removeClass('hide');
				$('.feedback .tabla').removeClass('hide');
				$('.feedback').removeClass('hide');
			} else {
				$('.feedback #comentarios span').text('0');
				$('.feedback #promedio span').text('-');
				$('.feedback').removeClass('hide');
			}
		}
	);

	function escondeReportes(){
		$('.visitas-mensuales').addClass('hide');
		$('.feedback').addClass('hide');
		$('.fila').not('.header').remove();
		$('.feedback .tabla').addClass('hide');
		$('.feedback #promedio').addClass('hide');
      	$('.visitas-mensuales canvas').remove();

	}

	function dameMes(num_mes){
		var mes;
		switch (num_mes){
			case '01':
				mes = "Enero";
				break;
			case '02':
				mes = "Febrero";
				break;
			case '03':
				mes = "Marzo";
				break;
			case '04':
				mes = "Abril";
				break;
			case '05':
				mes = "Mayo";
				break;
			case '06':
				mes = "Junio";
				break;
			case '07':
				mes = "Julio";
				break;
			case '08':
				mes = "Agosto";
				break;
			case '09':
				mes = "Septiembre";
				break;
			case '10':
				mes = "Octubre";
				break;
			case '11':
				mes = "Noviembre";
				break;
			case '12':
				mes = "Diciembre";
				break;
		}
		return mes;
	}// dameMes

}

function setLimitDate(forms){
    $(forms).each(function(){
    	var fechaInicial = $(this).find('input[name="fecha_inicial"]');
    	var fechaFinal = $(this).find('input[name="fecha_final"]');
    	fechaInicial.datepicker({minDate: '0', dateFormat: 'yy-mm-dd'});
    	fechaInicial.on('change', function(){
		    var fechaInicialVal = new Date( $(this).val() );
		    var limitDate = new Date(fechaInicialVal);
		    limitDate.setDate(limitDate.getDate() + 2);
		    fechaFinal.datepicker({minDate: limitDate, dateFormat: 'yy-mm-dd'});
		});

    });
}

function toggleUrlAviso(){
	$('.crea-aviso input[name="link_aviso"]').change(function(){
		if($(this).is(":checked")) {
			$('.url_aviso').removeClass('hide');
			$('.url_aviso input').addClass('required');
			$('.url_aviso input').val('');
			$('.url_aviso input').focus();
		}
		else {
			$('.url_aviso').addClass('hide');
			$('.url_aviso input').removeClass('required');
			$('.url_aviso input').val('-');
		}
	});
} // toggleUrlAviso

function toggleUrlAnuncio(){
	$('.crea-anuncio input[name="link_anuncio"]').change(function(){
		if($(this).is(":checked")) {
			$('.url_anuncio').removeClass('hide');
			$('.url_anuncio input').addClass('required');
			$('.url_anuncio input').val('');
			$('.url_anuncio input').focus();
		}
		else {
			$('.url_anuncio').addClass('hide');
			$('.url_anuncio input').removeClass('required');
			$('.url_anuncio input').val('-');
		}
	});
} // toggleUrlAnuncio

function toggleSubirImagen(){
	$('input[name="subir_img"]').change(function(){
		if($(this).is(":checked")) {
			$('.cargar_img').removeClass('hide');
			$('.img_actual').addClass('hide');
		}
		else {
			$('.cargar_img').addClass('hide');
			$('.img_actual').removeClass('hide');
		}
	});
} // toggleSubirImagen

function votoPregunta(base_url){
	$('.j-pregunta-container a').on('click', function(e){
		e.preventDefault();
		var jsonVoto = {};
		jsonVoto['pregunta'] = $(this).data('pregunta');
		jsonVoto['respuesta'] = $(this).data('respuesta');

		$.post(
			base_url + "inicio/set_voto",
			jsonVoto,
			function(response){
				$('.j-pregunta-container').empty();
				$('.j-pregunta-container').html('<h2 class="text-center highlight">¡Gracias!</h2><h4 class="text-center">Tu opinión es muy importante para nosotros.</h4>');
			}
		);
	});
}// votoPregunta

function scrollHeader(selector){
	var scrolled = $(window).scrollTop();
	if( $(selector).length > 0 ){
		var topBusqueda 	= $(selector).offset().top;
		var alturaBusqueda 	= $(selector).height();
		var bottomBusqueda 	= topBusqueda+alturaBusqueda;
		if( scrolled > bottomBusqueda ){
			$('.when-scrolled').addClass('after-scrolled');
		} else{
			$('.when-scrolled').removeClass('after-scrolled');
		}
	}
}//scrollHeader

function numRespuestasSiNo(si, no){
	var data = {
		labels: ['Si', 'No'],
		datasets: [
			{
				label: "Respuestas",
				fillColor: "rgba(236, 35, 131, 0.5)",
				strokeColor: "rgba(236, 35, 131, 1)",
				pointColor: "rgba(162, 43, 56, 1)",
				pointStrokeColor: "#fff",
				pointHighlightFill: "#fff",
				pointHighlightStroke: "rgba(162, 43, 56, 1)",
				data: [si, no]
			}
		]
	};
	var ctx = $('#chartRespuestas').get(0).getContext('2d');
	new Chart(ctx).Bar(data);
}

function porcentajeRespuestasSiNo(si, no){
	var data = [
		{
			value: parseFloat(si),
			color:"rgba(236, 35, 131, 0.2)",
			highlight: "rgba(236, 35, 131, 0.3)",
			label: "Si(%)"
		},
		{
			value: parseFloat(no),
			color:"rgba(236, 35, 131, 0.7)",
			highlight: "rgba(236, 35, 131, 0.8)",
			label: "No(%)"
		}
	];
	var ctx = $('#donaRespuestas').get(0).getContext('2d');
	new Chart(ctx).Doughnut(data);
}

function visitasMensuales(visitas, meses){
	var data = {
	    labels: meses,
	    datasets: [
	        {
	            label: "Respuestas",
	            fillColor: "rgba(236, 35, 131, 0.5)",
	            strokeColor: "rgba(236, 35, 131, 1)",
	            pointColor: "rgba(162, 43, 56, 1)",
	            pointStrokeColor: "#fff",
	            pointHighlightFill: "#fff",
	            pointHighlightStroke: "rgba(162, 43, 56, 1)",
	            data: visitas
	        }
	    ]
	};
	var ctx = $('#chartVisitasMensuales').get(0).getContext('2d');
	new Chart(ctx).Bar(data);
}

function imprimirInfoTramite(){
	$('.j-imprimir').on('click', function(e){
		e.preventDefault();
		window.print();
	});
}

function muestraAreaAtencionPorDelegacion(){
	
	$('select[name="delegacion"]').change(function(){
		var id_tramite_servicio = $('input[name="id_tramite_servicio"]').val();
		var delegacion = $(this).find('option:selected').val();
		var url = localStorage.getItem('url_ws') + '/area_atencion_tramite_delegacion/del/' + delegacion.trim() + '/id/'+id_tramite_servicio+'/format/json';

		$('.j_area_atencion').addClass('hide');
		$('.j_area_atencion .fila').not('.header').remove();
		$('.map-wrapper').remove();
		if(delegacion !== 'Seleccionar'){
			$.get(
				url,
				function(response){
					$('.j_area_atencion').removeClass('hide');
					$('.j_area_atencion').after('<div class="[ map-wrapper ] [ margin-bottom ]"><div id="map"></div></div>');
					creaMapaAreaAtencion(response);
				}
			);
		}
	});
}// muestraAreaAtencionPorDelegacion

function creaMapaAreaAtencion(area_atencion_data){
	if(typeof area_atencion_data === 'undefined'){
	   $('.j_area_atencion').empty();
	   $('.j_area_atencion').append('<p>Por el momento no existen áreas de atención asociadas a ésta delegación.</p>');
	   return 0;
	};
	$('.header').show();
	$.each(area_atencion_data, function(i, val){
		var tel1 = val['telefono_1'];
		var tel2 = val['telefono_2'];
		var ext1 = '';
		var ext2 = '';

		if(tel1 === null){
			tel1 = '-';
		}
		if(tel2 === null){
			tel2 = '';
		}
		if(val['ext_1'] !== null){
			ext1 = 'ext. ' + val['ext_1'];
		}
		if(val['ext_2'] !== null){
			ext2 = 'ext. ' + val['ext_2'];
		}

		var fila = ' \
			<div class="fila clearfix"> \
				<div class="[ columna xmall-6 medium-3 ]">' + val['nombre'] + '</div> \
				<div class="[ columna xmall-6 medium-4 ]"> \
					' + val['calle_numero'] + ', Col. ' + val['colonia'] + ', Del. ' + val['delegacion'] + ', ' + val['cp'] +  '\
				</div> <div class="[ xmall-clear ] [ margin-bottom-small ]"></div>\
				<div class="[ columna xmall-6 medium-3 ] [ j-horario ]" data-area="'+val['id_area_atencion_ts']+i+'"> \
				</div> \
				<div class="[ columna xmall-6 medium-2 ]"> \
					' + tel1 + ' ' +  ext1 + '<br /> ' + '\
					' + tel2 + ' ' +  ext2 +  '\
				</div> \
			</div>';
		$('.j_area_atencion').append(fila);
		var horario = getHorarioAreaAtencion(val['id_area_atencion_ts'], i);
	});
	creaMapa(area_atencion_data);
}// creaMapaAreaAtencion

function getHorarioAreaAtencion(id_area_atencion, index){
	var url = localStorage.getItem('url_ws') + '/horario_area_atencion/id/' + id_area_atencion + '/format/json';

	$.get(
		url,
		function(response){
			var dias_anteriores = 0;s

			$.each(response, function(i, val){
				var horario = $('div').find('[data-area="'+id_area_atencion+index+'"]');

				if(dias_anteriores != val.dias){
					dias_anteriores = val.dias;
					var dias = getDiasAreaAtencion(val.dias);
					horario.append('<strong>'+dias+'</strong><br />'+val.hora_inicio+' - '+val.hora_fin+'<br />');
				} else {
					horario.append(val.hora_inicio+' - '+val.hora_fin+'<br /><br />');
				}
			});
		})
		.fail(function(){
			var horario = $('div').find('[data-area="'+id_area_atencion+index+'"]');
			horario.append('<strong>No hay horarios de atención disponible.</strong><br />');
		});
}// getHorarioAreaAtencion

function getDiasAreaAtencion(dias_abreviados){
	var dias_array = dias_abreviados.split('_');

	if (dias_array.length == 1) return getDia(dias_array[0]);

	var dias = '';
	$.each(dias_array, function(i, val){
		if (i == 0) {
			dias = getDia(val);
			return true;
		}

		if(i+1 == dias_array.length) {
			dias = dias + ' y ' + getDia(val);
			return true;
		}

		dias = dias + ', ' + getDia(val);
	});

	return dias;
}// getDiasAreaAtencion

function getDia(dia){
	switch(dia){
		case 'lu':
			return 'Lunes';
		case 'ma':
			return 'Martes';
		case 'mi':
			return 'Miércoles';
		case 'ju':
			return 'Jueves';
		case 'vi':
			return 'Viernes';
		case 'sa':
			return 'Sábado';
		case 'do':
			return 'Domingo';
	}
}// getDia

function agregarFeedback(){
	$('.feedback [type="submit"]').on('click', function(e){
		e.preventDefault();
		var comentario = $('textarea[name="comentarios"]').val();
		if($.trim(comentario) == ''){
			alert('El campo de comentarios no puede quedar vacío.');
			return;
		}

		var data = $('.feedback').serialize();
		var url = localStorage.getItem('base_url') + "tramites_servicios/agregar_feedback";
		$.post(
			url ,
			data,
			function(response){
				$('.feedback').remove();
				$('.danos-tu-opinion').append('<h3>Gracias por tus comentarios. Tu opinión es muy importante para nosotros.</h3>')
			}
		);

	})
}// agregarFeedback



