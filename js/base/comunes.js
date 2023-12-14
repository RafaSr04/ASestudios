$(document).ready(function () {
	jQuery("#ventana_loader").jqxLoader({ 	
		width: 200, 
		height: 100, 
		imagePosition: 'top',
		text: "",
		isModal: true
	});
	jQuery.validator.addMethod("lettersonly", function (value, element) {
		return this.optional(element) || /^[a-z-ÁáÓóÉéÍíÚúÑñ\s]+$/i.test(value);
	}, "Solo letras");
	
	jQuery.validator.addMethod("lettersandsigns", function (value, element) {
		return this.optional(element) || /^[a-z-ÁáÓóÉéÍíÚúÑñ.,\s]+$/i.test(value);
	}, "Solo letras, puntos y comas");
	jQuery.validator.addMethod("CURP", function (value, element) {
		return this.optional(element) || /^([A-Z][AEIOUX][A-Z]{2}\d{2}(?:0[1-9]|1[0-2])(?:0[1-9]|[12]\d|3[01])[HM](?:AS|B[CS]|C[CLMSH]|D[FG]|G[TR]|HG|JC|M[CNS]|N[ETL]|OC|PL|Q[TR]|S[PLR]|T[CSL]|VZ|YN|ZS)[B-DF-HJ-NP-TV-Z]{3}[A-Z\d])(\d)+$/i.test(value);
	}, "Error en formato de CURP");
	jQuery.validator.addMethod("RFC", function (value, element) {
		return this.optional(element) || /^(((?!(([CcKk][Aa][CcKkGg][AaOo])|([Bb][Uu][Ee][YyIi])|([Kk][Oo](([Gg][Ee])|([Jj][Oo])))|([Cc][Oo](([Gg][Ee])|([Jj][AaEeIiOo])))|([QqCcKk][Uu][Ll][Oo])|((([Ff][Ee])|([Jj][Oo])|([Pp][Uu]))[Tt][Oo])|([Rr][Uu][Ii][Nn])|([Gg][Uu][Ee][Yy])|((([Pp][Uu])|([Rr][Aa]))[Tt][Aa])|([Pp][Ee](([Dd][Oo])|([Dd][Aa])|([Nn][Ee])))|([Mm](([Aa][Mm][OoEe])|([Ee][Aa][SsRr])|([Ii][Oo][Nn])|([Uu][Ll][Aa])|([Ee][Oo][Nn])|([Oo][Cc][Oo])))))[A-Za-zñÑ&][aeiouAEIOUxX]?[A-Za-zñÑ&]{2}(((([02468][048])|([13579][26]))0229)|(\d{2})((02((0[1-9])|1\d|2[0-8]))|((((0[13456789])|1[012]))((0[1-9])|((1|2)\d)|30))|(((0[13578])|(1[02]))31)))[a-zA-Z1-9]{2}[\dAa])|([Xx][AaEe][Xx]{2}010101000))+$/i.test(value);
	}, "Error en formato de RFC");
	jQuery.validator.addMethod("onlynumbers", function (value, element) {
		return this.optional(element) || /^[0-9]\d*(\.\d+)?$/i.test(value);
	}, "Solo números");
	
	jQuery.validator.addMethod("nospecials", function (value, element) {
		return this.optional(element) || /^[a-zA-Z0-9\s]+$/i.test(value);
	}, "Solo números");
	jQuery.validator.addMethod("passchars", function (value, element) {
		return this.optional(element) || /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*["-.*¿?¡!$%"])[a-zA-Z\d\-.*¿?¡!$%]{8,}$/.test(value);
	}, "Caracteres especiales permitidos");
	jQuery.validator.addMethod("nowhitespace", function (value, element) {
		return this.optional(element) || /^\S+$/.test(value);
	}, "Sin espacios en blanco");
	jQuery.validator.addMethod("notEqual", function (value, element, param) {
		return this.optional(element) || value != param;
	}, "Please specify a different (non-default) value");
	$.validator.addMethod("ischecked", function (value, element) {
		return $("input[name='opcion']:checked").length > 0;
	}, "Selecciona al menos una opción.");
	$.validator.addMethod("validDiferente0", function(value, element){
		if(value == 0){
			return false;
		}else{
			return true;
		}
	}, "Selecciona una opcion");
	jQuery.validator.addMethod("dosNombres", function (value, element) {
		return this.optional(element) || /^[A-Za-záéíóúÁÉÍÓÚüÜñÑ]+(\s[A-Za-záéíóúÁÉÍÓÚüÜñÑ]+)*$/.test(value);
	}, "Sin espacios en blanco o ingresa un segundo nombre");
	$.validator.addMethod("Archivo", function(value, element) {
		return $.trim($(element).text()) !== "Carga";
	}, "Archivo requerido.");
	$.validator.addMethod("Archivo", function (value, element) {
		// Encuentra el label asociado al elemento por su atributo 'for'
		var labelFor = $("label[for='" + element.id + "']");
		// Obtiene el contenido del label
		var labelText = labelFor.text();
		// Valida si el contenido del label no está vacío
		return $.trim(labelText) !== "Seleccionar archivo";
	}, "Archivo requerido.");
	$.validator.addMethod("Archivod", function (value, element) {
		// Encuentra el label asociado al elemento por su atributo 'for'
		var labelFor = $("label[for='" + element.id + "']");
		// Obtiene el contenido del label
		var labelText = labelFor.text();
		// Valida si el contenido del label no está vacío
		return $.trim(labelText) !== "Carga";
	}, "Archivo requerido.");
});//ready
	function peticion(clase, metodo, parametros, dn){
		var dn = dn || false;
		var parametros = parametros || '';
		var datos = "&clase=" + clase + "&metodo=" + metodo + parametros;
		var hilo = $.ajax({
			type: "POST",
			url: "servidor.php",
			data: datos,
			contentType: "application/x-www-form-urlencoded; charset=utf-8",
			dataType: "json",
			cache: false,
			beforeSend: function(xhr){xhr.setRequestHeader('Authorization', 'Bearer '+localStorage.token+'');},
			success: function(response,textStatus, request){
				if(dn && response.data)
					$(dn).empty().html(response.data);
				if(dn && response.codigo)
					$(dn).empty().html(response.codigo);
			},
			error: function(XMLHttpRequest, textStatus, errorThrown){
				alert(textStatus + " Ocurrio un error " + errorThrown);
			}
		}); //ajax
		return hilo;
	}
	function muestra_mensaje(tipo, mensaje, tiempo){
		if(typeof (tiempo) === "undefined"){
			tiempo = 0;
		}
		
		if(tipo != ""){
			var divisor = 3;
			if(jQuery(document).width() <= 400)
				divisor = 1;
			if(jQuery(document).width() <= 800)
				divisor = 2;
				
			jQuery("#ventana_notificacion").jqxNotification({
				width: jQuery(document).width() / divisor, 
				position: "bottom-right", 
				opacity: 0.9,
				autoOpen: false, 
				animationOpenDelay: 400, 
				autoClose: false,  
				template: "success"
			});
			
			switch (tipo){
				case "exito":
					jQuery("#ventana_notificacion").jqxNotification({
						template: "success"
					});
				break;
				
				case "error":
					jQuery("#ventana_notificacion").jqxNotification({
						template: "error"
					});
				break;
			}
			
			if(tiempo > 0){
				jQuery("#ventana_notificacion").jqxNotification({
					autoClose: true,
					autoCloseDelay: tiempo * 1000
				});
			}
			else{
				jQuery("#ventana_notificacion").jqxNotification({
					autoClose: false
				});
			}
			
			jQuery("#ventana_notificacion_mensaje").html("");
			jQuery("#ventana_notificacion_mensaje").html(mensaje);
			jQuery("#ventana_notificacion").jqxNotification("open");
		}
	}
