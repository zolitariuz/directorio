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





		//***************//
		//*** CLICKS ****//
		//***************//
		//Tabs
		$('.tabs a').on('click', function(){
			cambiarTab( $(this) );
		});

		//Acordion
		$('body').on('click', '.directorio-item > .boton', function(e){
			e.preventDefault();
			abrirDirectorio( $(this) );
		});

		//Modals
		$('body').on('click', '.transform .boton', function(){
			abrirModal( $(this) );
		});

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
			abrirMenu( $(this), $('nav') );
		});

		mediaCheck({
			media: '(min-width: 1025px)',
			entry: function() {
				mayorQueLarge();
			},
			exit: function() {
				menorQueLarge();
			},
			both: function() {
			}
		});



		//****************//
		//****** CMS *****//
		//****************//
		$('.js-login-form').validate();
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

	function abrirMenu(elemento, menu){
		menu.slideToggle('fast');
	}

	function cambiarTab(elemento){
		var tabAAbrir = elemento.data('tab');
		$('.tabs a').removeClass('active');
		elemento.addClass('active');
		$('.tab-content').addClass('hide');
		$('.'+tabAAbrir).removeClass('hide');
	}

	function abrirDirectorio(elemento){
		var ul = elemento.parent('.directorio-item').find('ul');
		if( ul.hasClass('hide') ){
			$('.directorio-item').find('ul').addClass('hide');
			ul.removeClass('hide');
		} else {
			$('.directorio-item').find('ul').addClass('hide');
		}
	}

	function contarItems(papa, items){
		$.each(papa, function(){
			var cuantosItems = $(this).find(items).length;
			console.log(cuantosItems);
			$(this).find('h2').find('span').html('('+cuantosItems+')');
		})
	}

	function mayorQueLarge(){
		undoH2ABotones();
		callMasonry();
	}

	function menorQueLarge(){
		h2ABotones();
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

	function callMasonry(){
		var container = $('.masonry-container');
    	var msnry = new Masonry( container[0], {
    		itemSelector: '.item'
    	});
	}

	function destroyMasonry(){
		var container = $('.masonry-container');
		var msnry = new Masonry( container[0] );
		msnry.destroy();
	}

	function scrollTop(elemento){
		var seccion 	= elemento.data('seccion');
		console.log(seccion);
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


function getMapas(data){
	var mapasJSON = $.parseJSON(data);
	creaMapa(mapasJSON);
}

function creaMapa(mapas){
	// Estilos mapa

	// Jalar coordenadas de areas de atención
	var locations = [];
	$.each(mapas, function(i, item){
		var l = [];
		var coordenadas = dameCoordenadas(item.url_ubicacion);
		var contenidoInfoWindow =
			'<h3>'+item.nombre+'</h3><h3>Dirección</h3><br /><p>' + item.calle_numero + '<br />Col. ' + item.colonia + '<br />Del. ' + item.delegacion+', ' + item.cp + '</p><h3>Teléfonos</h3><p>' + item.telefonos + '</p>';
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
      zoom: 20,
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

    var marker;
    var markers = new Array();

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
        }
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

    	if(typeof coordenadas === 'undefined')
    		return -1
    	else
    		return coordenadas;
    } // dameCoordenadas
}

function busquedaTS(dataTS){
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
	$('.main-search-header input[type="search"]').autocomplete({
		source: srcNombreTS,
		select: function(event, ui) {
	        $('#ts_id').val(mapNombreTS[ui.item.value]);
			idTS = $('#ts_id').attr('value');
			window.open('http://localhost:8888/directorio/index.php/tramites_servicios/muestraInfo/' + idTS , '_self');

	    },
		appendTo: '.main-search-header'
	});
	$('.main-search-home input[type="search"]').autocomplete({
		source: srcNombreTS,
		select: function(event, ui) {
	        $('#ts_home_id').val(mapNombreTS[ui.item.value]);
			idTS = $('#ts_home_id').attr('value');
			window.open('http://localhost:8888/directorio/index.php/tramites_servicios/muestraInfo/' + idTS , '_self');

	    },
		appendTo: '.main-search-home'
	});
	$('.main-search button').on('click', function(e){
		e.preventDefault();
		idTS = $('#ts_id').val();
		window.open('http://localhost:8888/directorio/index.php/tramites_servicios/muestraInfo/' + idTS , '_self');
	});
} // busquedaTS

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
	$('.main-search-cms input[type="search"]').autocomplete({
		source: srcNombreTS,
		select: function(event, ui) {
	        $('#ts_cms_id').val(mapNombreTS[ui.item.value]);
			var idTS = $('#ts_cms_id').attr('value');
			var ts = ui.item.value;

			agregarTSSolicitado(idTS, ts, base_url);
	    },
		appendTo: '.main-search-cms'
	});
	$('.main-search button').on('click', function(e){
		e.preventDefault();
		var idTS = $('#ts_cms_id').val();
		var ts = $('input[type="search"]').val();

		agregarTSSolicitado(idTS, ts, base_url);
	});
} // agregarTS

function agregarTSSolicitado(id_ts, ts, base_url){
	var jsonSolicitado = {};
	jsonSolicitado['id_ts'] = id_ts;

	$.post(
		base_url + "index.php/gestor_contenidos/agregar_ts_solicitado",
		jsonSolicitado,
		function(response){
			var respuesta = $.parseJSON(response);
			$('.success, .error').addClass('hide');

			if(respuesta.estatus == 'success'){

				$('.success').text(respuesta.msg);
				$('.success').removeClass('hide');
				var fila = '<div class="fila"> \
								<p class="columna xmall-10">'+ts+'</p> \
								<a href="" data-ts="'+id_ts+'" class="text-center block columna xmall-2">Eliminar</a> \
							</div>';
				$(fila).insertAfter('.tabla-ts .header');
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
			base_url + "index.php/gestor_contenidos/eliminar_ts_solicitado",
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
	$('.main-search-reportes input[type="search"]').autocomplete({
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
		var ts = $('input[type="search"]').val();

		muestraReporteTS(idTS, ts, base_url);
	});
} // agregarTSReportes

function muestraReporteTS(id_ts, ts, base_url){
	var jsonReporte = {};
	jsonReporte['id_ts'] = id_ts;

	$.post(
		base_url + "index.php/gestor_contenidos/muestra_reporte_ts",
		jsonReporte,
		function(response){
			var respuesta = $.parseJSON(response);
			console.log(respuesta);
		}
	);
}

function toggleUrlAviso(){
	$('.crea-aviso input[name="link_aviso"]').change(function(){
		if($(this).is(":checked")) {
			$('.url_aviso').removeClass('hide');
			$('.url_aviso input').val('');
			$('.url_aviso input').focus();
		}
		else {
			$('.url_aviso').addClass('hide');
			$('.url_aviso input').val('-');
		}
	});
} // toggleUrlAviso

function toggleUrlAnuncio(){
	$('.crea-anuncio input[name="link_anuncio"]').change(function(){
		if($(this).is(":checked")) {
			$('.url_anuncio').removeClass('hide');
			$('.url_anuncio input').val('');
			$('.url_anuncio input').focus();
		}
		else {
			$('.url_anuncio').addClass('hide');
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
	$('.pregunta a').on('click', function(e){
		e.preventDefault();
		console.log(base_url);
		var jsonVoto = {};
		jsonVoto['pregunta'] = $(this).data('pregunta');
		jsonVoto['respuesta'] = $(this).data('respuesta');

		$.post(
			base_url + "index.php/inicio/set_voto",
			jsonVoto,
			function(response){
				$('.pregunta').empty();
				$('.pregunta').html('<h2 class="text-center highlight">¡Gracias!</h2><h4 class="text-center">Tu opinión es muy importante para nosotros.</h4>');
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
	console.log('chart');
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
	console.log(si);
	console.log(no);
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



