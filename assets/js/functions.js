(function($){

	"use strict";

	$(function(){

		$('.menu').on('click', function(){
			abrirMenu( $(this), $('nav') );
		});

		$('.tabs a').on('click', function(){
			cambiarTab( $(this) );
		});

		$('body').on('click', '.transform .boton', function(){
			abrirModal( $(this) );;
		});

		$('body').on('click', '.modal .cerrar', function(){
			cerrarModal( $(this) );;
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

		//Trámites más comúnes
		callMasonry();


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

	function mayorQueLarge(){
		undoH2ABotones();
	}

	function menorQueLarge(){
		h2ABotones();
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

	function callMasonry(){
		var container = $('.masonry-container');
    	var msnry = new Masonry( container[0], {
    		itemSelector: '.item'
    	});
	}

})(jQuery);


function getMapas(data){
	var mapasJSON = $.parseJSON(data);
	creaMapa(mapasJSON);
}

function creaMapa(mapas){
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

    var map = new google.maps.Map(document.getElementById('map'), {
      zoom: 10,
      mapTypeId: google.maps.MapTypeId.ROADMAP,
      mapTypeControl: false,
      streetViewControl: false,
      panControl: false,
      zoomControlOptions: {
         position: google.maps.ControlPosition.LEFT_BOTTOM
      }
    });

    var infowindow = new google.maps.InfoWindow({
      maxWidth: 360
    });

    var marker;
    var markers = new Array();

    var iconCounter = 0;
    
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
    AutoCenter();

    // Autocentrar el mapa dependiendo de los marcadores
    function AutoCenter() {
      //  Crea un nuevo limite
      var bounds = new google.maps.LatLngBounds();
      //  Itera todos los marcadores
      $.each(markers, function (index, marker) {
        bounds.extend(marker.position);
      });
      //  Mete los límites en el mapa
      map.fitBounds(bounds);
    }

    function dameCoordenadas(url){
    	var pedazos;
    	var coordenadas;

    	pedazos = url.split('&');

    	$.each(pedazos, function(i, val){
    		if(val.indexOf('sll=')>-1){
    			coordenadas = val.replace('sll=', '');

    		}
    	});
    	if(typeof coordenadas === 'undefined')
    		return -1
    	else
    		return coordenadas;
    }
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
	$('.main-search input[type="search"]').autocomplete({
		source: srcNombreTS,
		select: function(event, ui) {
	        $('#ts_id').val(mapNombreTS[ui.item.value]);
			idTS = $('#ts_id').attr('value');
			window.open('http://localhost:8888/directorio/index.php/inicio/muestraTramiteServicio/' + idTS , '_blank');
			
	    },
		appendTo: '.main-search'
	});
	$('.main-search button').on('click', function(e){
		e.preventDefault();
		idTS = $('#ts_id').val();
		window.open('http://localhost:8888/directorio/index.php/inicio/muestraTramiteServicio/' + idTS , '_blank');

	});
}
