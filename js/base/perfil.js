$(document).ready(function () {
    // Escucha los clics en elementos del menú
    $('.sidebar a').click(function (e) {
        e.preventDefault();
        var formId = $(this).data('form');
        $('.form').hide();

        // Muestra el formulario correspondiente
        $('#' + formId + '_form').show();
    });
    $("#frmdatoscontacto").validate({
        rules: {
            telefonom: {
                required: true,
                onlynumbers: true,
                nowhitespace: true,
                maxlength:40,
            },
            telefonol: {
                required: true,
                onlynumbers: true,
                nowhitespace: true,
                maxlength:40,
            },
            email: {
                required: true,
                email: true,
                maxlength:40,
            },
        },
        messages: {
            telefonom: {
                required: "Campo requerido",
            },
            telefonol: {
                required: "Campo requerido",
            },
            email: {
                required: "Campo requerido",
                email: "Formato incorrecto de correo electronico",
            },
        }
    });
    $("#frmdatospersonales").validate({
        rules: {
            nombre: {
                required: true,
                lettersonly: true,
                dosNombres: true,
                maxlength:40,
            },
            apellidop: {
                required: true,
                lettersonly: true,
                dosNombres: true,
                maxlength:40,
            },
            apellidom: {
                required: true,
                lettersonly: true,
                dosNombres: true,
                maxlength:40,
            },
            CURP: {
                required: true,
                nowhitespace: true,
                CURP: true
            }
        },
        messages: {
            nombre: {
                required: "Campo requerido",
            },
            apellidop: {
                required: "Campo requerido",
            },
            apellidom: {
                required: "Campo requerido",
            },
            CURP: {
                required: "Campo requerido",
            }
        }
    });
    $("#frmdireccion").validate({
        rules: {
            calle: {
                required: true,
                maxlength:40,
            },
            noext: {
                required: true,
                maxlength:40,
            },
            noint: {
                maxlength:40,
            },
            codigop: {
                required: true,
                maxlength:40,
            },
            estado: {
                required: true,
                maxlength:40,
            },
            municalc: {
                required: true,
                maxlength:40,
            },
            coloniac: {
                required: true,
                maxlength:40,
            }
        },
        messages: {
            nombre: {
                required: "Campo requerido",
            },
            apellidop: {
                required: "Campo requerido",
            },
            apellidom: {
                required: "Campo requerido",
            },
            apellidom: {
                required: "Campo requerido",
            },
            apellidom: {
                required: "Campo requerido",
            },
            apellidom: {
                required: "Campo requerido",
            },
            CURP: {
                required: "Campo requerido",
            }
        }
    });
    $(document).on('click', '#btngdp', function(event) {
        if($("#frmdatospersonales").valid()){
            var params = "&"+ $("#frmdatospersonales").serialize();
            console.log(params);
            jQuery('#ventana_loader').jqxLoader('open');
            peticion("perfil", "guardarpersonales",params).done(function(response){
                if(response != ""){
                    var codigo = response["code"];
                    var mensaje = response["data"];
                    if(codigo == "OK"){
                        jQuery('#ventana_loader').jqxLoader('close');
                    }else{
                        jQuery('#ventana_loader').jqxLoader('close');
                        muestra_mensaje("error", mensaje,10);
                    }
                }else{
                    jQuery('#ventana_loader').jqxLoader('close');
                    muestra_mensaje("error", mensaje,10);
                }
            });
        }
    });
    $(document).on('click', '#btngdc', function(event) {
        if($("#frmdatoscontacto").valid()){
            var params = "&"+ $("#frmdatoscontacto").serialize();
            jQuery('#ventana_loader').jqxLoader('open');
            peticion("perfil", "guardarcontacto", params).done(function(response){
                if(response != ""){
                    var codigo = response["code"];
                    var mensaje = response["data"];
                    if(codigo == "OK"){
                        jQuery('#ventana_loader').jqxLoader('close');
                    }else{
                        jQuery('#ventana_loader').jqxLoader('close');
                        muestra_mensaje("error", mensaje,10);
                    }
                }else{
                    jQuery('#ventana_loader').jqxLoader('close');
                    muestra_mensaje("error", mensaje,10);
                }
            });
        }
    });
    //frmdatospersonales
    $(document).on('click', '#btngdd', function(event) {
        if($("#frmdireccion").valid()){
            var params = "&"+ $("#frmdireccion").serialize();
            jQuery('#ventana_loader').jqxLoader('open');
            peticion("perfil", "guardardireccion", params).done(function(response){
                if(response != ""){
                    var codigo = response["code"];
                    var mensaje = response["data"];
                    if(codigo == "OK"){
                        muestra_mensaje("error", mensaje,10);
                    }else{
                        jQuery('#ventana_loader').jqxLoader('close');
                        muestra_mensaje("error", mensaje,10);
                    }
                }else{
                    jQuery('#ventana_loader').jqxLoader('close');
                    muestra_mensaje("error", mensaje,10);
                }
            });
        }
    });
    $(document).on('blur', '#codigop', function(event) {
       var params = "&codigop="+$(this).val(); 
       jQuery('#ventana_loader').jqxLoader('open');
       peticion("perfil", "llenarcp", params).done(function(response){
           if(response != ""){
               var codigo = response["code"];
               var mensaje = response["data"].mensaje;
               if(codigo == "OK"){
                   var datos = response["data"];
                   console.log(datos);
                   $("#estado").val(datos[0]["Codigop_estado"]);
                   $("#municalc").val(datos[0]["Códigop_delmun"]);
                   var combo = "<select id='colonia' name='colonia' class='combo'><option value=0 > Seleccionar Colonia </option>";
                                    $.each(datos , function (index, value){
                                        combo += "<option value='" + value.Codigop_colonia + "'>" + value.Codigop_colonia + " </option>";
                                    });
                                    combo += "</select>";
                                    $("#coloniac").empty().html( combo );
                   jQuery('#ventana_loader').jqxLoader('close');
               }else{
                var combo = "<select id='colonia' name='colonia' class='combo'><option value=0 > Sin Colonia </option></select>";
                $("#coloniac").empty().html( combo );colonia
                   jQuery('#ventana_loader').jqxLoader('close');
                   muestra_mensaje("error", mensaje,10);
               }
           }else{
               jQuery('#ventana_loader').jqxLoader('close');
               muestra_mensaje("error", mensaje,10);
           }
       });
    });
});