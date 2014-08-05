(function($){

	"use strict";

	$(function(){

		/**
		 * Validación de emails
		 */
		// window.validateEmail = function (email) {
		// 	var regExp = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
		// 	return regExp.test(email);
		// };

		/**
		 * Regresa todos los valores de un formulario como un associative array
		 */
		// window.getFormData = function (selector) {
		// 	var result = [],
		// 		data   = $(selector).serializeArray();

		// 	$.map(data, function (attr) {
		// 		result[attr.name] = attr.value;
		// 	});
		// 	return result;
		// }

		$('.menu').on('click', function(){
			abrirMenu( $(this), $('nav') );
		});

		$('.tabs a').on('click', function(){
			cambiarTab( $(this) );
		});

		$('body').on('click', '.transform .boton', function(){
			abrirModal( $(this) );;
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
				//console.log('changing state');
			}
		});

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
		console.log(modalContent);
		$('.modal-wrapper.'+modalClass).fadeIn('normal', function(){
			$(this).removeClass('hide');
		});
	}

	function cerrarModal(elemento){
		var aCerrar = elemento.parent();
		aCerrar.fadeOut('normal', function(){
			$(this).addClass('hide');
		});
	}


})(jQuery);