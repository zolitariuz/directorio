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

})(jQuery);