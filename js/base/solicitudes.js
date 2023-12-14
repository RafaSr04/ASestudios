$(document).ready(function () {
    grid();
    gridadmin();
    gridtatuador();
    $("#infocita").hide();
    $("#formulariodiv").hide();
    $("#frmsesion").hide();
    $(".pago").hide();
    $("#btn_aceptarsesion").hide();
    $("#paypalpago").hide();
    $("#formulario").validate({
        onkeyup: false, 
        onfocusout:false,
        rules: {
            zona:{
                required:true,
                maxlength: 40,
            },tamaño:{
                required:true,
                maxlength: 40,
                onlynumbers:true
            },
            descripcion:{
                required:true,
                maxlength: 250
            },
            imgref: {
                accept: "image/jpeg,image/jpg,image/png",
                Archivo:true
            },
        },
        messages:{
            zona:{
                required:"Campo requerido",
                maxlength:"Excediste el numero maximo de caracteres"
            },
            tamaño:{
                required:"Campo requerido",
                maxlength:"Excediste el numero maximo de caracteres",
                onlynumbers:"Solo numeros"
            },
            descripcion:{
                required:"Campo requerido",
                maxlength: "Excediste el numero maxio de caracteres"
            },
            imgref: {
                accept: "Solo Archivos PNG,JPG,JPEG"
            },

        }
    });
    $(document).on('click', '#btnsolicitar', function(event) {
        if($("#formulario").valid() && $("#imgref").val() !== ""){
            var params = "&"+$("#formulario").serialize();
            console.log(params);
            peticion("solicitudes", "agregarsolicitud", params).done(function (response) {
                if(response.code=="OK"){
                    var datos = response["data"].nuevo_id;
                    $('#imgref').each(function () {
                        var data = new FormData();
                        if (typeof this.files[0] !== "undefined") {
                            data.append("file", this.files[0]);
                            muestra_mensaje("success","Subiendo Archivo...",10);
                            $.ajax({
                                url: 'subir_archivos.php?destino=citas&producto_id=' + datos,
                                type: 'POST',
                                data: data,
                                cache: false,
                                dataType: 'json',
                                processData: false,
                                contentType: false,
                                async: true,
                                success: function (response) {
                                    muestra_mensaje("success", "mensaje", 10); },
                                error: function (jqXHR, textStatus, errorThrown) {
                                    muestra_mensaje("error", "error al subir el archivo", 10);
                                },
                            });
                        } else {
                            muestra_mensaje("success", "mensaje", 10);
                        }
                    });
                }else{
                    muestra_mensaje("success",response["data"], 10);
                }
            });
        }
    });
    $(".datepicker").datepicker({
        changeMonth: true,
        changeYear: true,
        dateFormat: "yy-mm-dd",
        showWeek: true,
        minDate: new Date(),
        onClose: function (fecha) {
            fecha = $(this).datepicker('getDate');
        }
    });
    $("#frmsesion").validate({
        rules:{
            fecini_0:{
                required:true,
            },
        },
        messages:{
            fecini_0:{
                required:"Campo requerido",
            },
        }
    });
    $("#frmsolicitud").validate({
        rules:{
            comentarios:{
                required:true,
            },
            cotizacion:{
                required:true,
                onlynumbers:true
            },
            fecini_0:{
                required:true,
            },
        },
        messages:{
            comentarios:{
                required:"Campo requerido",
            },
            cotizacion:{
                required:"Campo requerido",
                onlynumbers:"Solo numeros"
            },
            fecini_0:{
                required:"Campo requerido",
            },
        }
    });
});//ready
function gridadmin(){
    peticion("solicitudes", "listadoadmin", "").done(function(response){
        if(response != ""){
            var codigo = response["code"];
            var mensaje = response["data"].mensaje;
            if(codigo == "OK"){
                var datos = response["data"];
                var camposType = [
                    { name: 'citas_id', type: 'string' },
                    { name: 'descripcion', type: 'string' },
                    { name: 'tamaño', type: 'string' },
                    { name: 'zonac', type: 'string' },
                    { name: 'estatus', type: 'string' },
                ];
        
                var columnas = [
                    { text: 'citas_id', datafield: 'citas_id', width: '20%', editable: false,hidden:true},
                    { text: 'Descripción', datafield: 'descripcion', width: '20%', editable: false },
                    { text: 'Tamaño', datafield: 'tamaño', width: '20%', editable: false },
                    { text: 'Zona', datafield: 'zonac', width: '20%', editable: false },
                    { text: 'Estatus', datafield: 'estatus', width: '20%',autoheight:true, editable: false},
                    { text: 'Ver detalle',width:'20%', editable:false,cellsrenderer: function () {
                        return "<div class='detalle_row'>Ver mas...</div>";
                    }}
                ];
        
                var source = {
                    localdata: datos,
                    datatype: 'array',
                    datafields: camposType
                };
        
                var dataAdapter = new $.jqx.dataAdapter(source);
                $('#gridadmin').jqxGrid({
                    width: '100%',
                    autoheight: true,
                    source: dataAdapter,
                    altrows: true,
                    columnsresize: false,
                    showfilterrow: false,
                    filterable: false,
                    pageable: true,
                    pagesize: 4,
                    columnsreorder: false,
                    sortable: false,
                    columns: columnas,
                });

                $('#gridadmin').on('cellclick', async function (event) {
                    if (event.args.columnindex === 5) {
                        let infoAspirante = event.args.row.bounddata;
                        let idAspirante = infoAspirante["citas_id"];
                        traerdatos(idAspirante);
                        $("#idcita").val(idAspirante);
                    }
                });
                
            }else{
                
            }
        }else{
           
        }
    });
}
function grid(){
    peticion("solicitudes", "listado", "").done(function(response){
        if(response != ""){
            var codigo = response["code"];
            var mensaje = response["data"].mensaje;
            if(codigo == "OK"){
                var datos = response["data"];
                var camposType = [
                    { name: 'citas_id', type: 'string' },
                    { name: 'descripcion', type: 'string' },
                    { name: 'tamaño', type: 'string' },
                    { name: 'zonac', type: 'string' },
                    { name: 'estdesc', type: 'string' },
                ];
        
                var columnas = [
                    { text: 'citas_id', datafield: 'citas_id', width: '20%', editable: false,hidden:true},
                    { text: 'Descripción', datafield: 'descripcion', width: '20%', editable: false },
                    { text: 'Tamaño', datafield: 'tamaño', width: '20%', editable: false },
                    { text: 'Zona', datafield: 'zonac', width: '20%', editable: false },
                    { text: 'Estatus', datafield: 'estdesc', width: '20%',autoheight:true, editable: false},
                    { text: 'Ver detalle',width:'20%', editable:false,cellsrenderer: function () {
                        return "<div class='detalle_row'>Ver mas...</div>";
                    }}
                ];
        
                var source = {
                    localdata: datos,
                    datatype: 'array',
                    datafields: camposType
                };
        
                var dataAdapter = new $.jqx.dataAdapter(source);
                $('#grid').jqxGrid({
                    width: '100%',
                    autoheight: true,
                    source: dataAdapter,
                    altrows: true,
                    columnsresize: false,
                    showfilterrow: false,
                    filterable: false,
                    pageable: true,
                    pagesize: 4,
                    columnsreorder: false,
                    sortable: false,
                    columns: columnas,
                });

                $('#grid').on('cellclick', async function (event) {
                    if (event.args.columnindex === 5) {
                        let infoAspirante = event.args.row.bounddata;
                        let estatus = infoAspirante["estdesc"];
                        let idAspirante = infoAspirante["citas_id"];
                        if(estatus == "Pendiente"){
                            traerdatosu(idAspirante,0);
                            $("#idcita").val(idAspirante);      
                        }else if(estatus == "Confirmada"){
                            traerdatosu(idAspirante,3);
                            $("#idcita").val(idAspirante); 
                        }else{
                            traerdatosu(idAspirante,0);
                            $("#idcita").val(idAspirante);
                        }
                        
                    }
                });
            }else{
                
            }
        }else{
           
        }
    });
}
function gridtatuador(){
    peticion("solicitudes", "listadotatuador", "").done(function(response){
        if(response != ""){
            var codigo = response["code"];
            var mensaje = response["data"].mensaje;
            if(codigo == "OK"){
                var datos = response["data"];
                console.log(datos);
                var camposType = [
                    { name: 'citas_id', type: 'string' },
                    { name: 'descripcion', type: 'string' },
                    { name: 'tamaño', type: 'string' },
                    { name: 'zonac', type: 'string' },
                    { name: 'estdesc', type: 'string' },
                ];
        
                var columnas = [
                    { text: 'citas_id', datafield: 'citas_id', width: '20%', editable: false,hidden:true},
                    { text: 'Descripción', datafield: 'descripcion', width: '20%', editable: false },
                    { text: 'Tamaño', datafield: 'tamaño', width: '20%', editable: false },
                    { text: 'Zona', datafield: 'zonac', width: '20%', editable: false },
                    { text: 'Estatus', datafield: 'estdesc', width: '20%',autoheight:true, editable: false},
                    { text: 'Ver detalle',width:'20%', editable:false,cellsrenderer: function () {
                        return "<div class='detalle_row'>Ver mas...</div>";
                    }}
                ];
        
                var source = {
                    localdata: datos,
                    datatype: 'array',
                    datafields: camposType
                };
        
                var dataAdapter = new $.jqx.dataAdapter(source);
                $('#gridtatuador').jqxGrid({
                    width: '100%',
                    autoheight: true,
                    source: dataAdapter,
                    altrows: true,
                    columnsresize: false,
                    showfilterrow: false,
                    filterable: false,
                    pageable: true,
                    pagesize: 4,
                    columnsreorder: false,
                    sortable: false,
                    columns: columnas,
                });

                $('#gridtatuador').on('cellclick', async function (event) {
                    if (event.args.columnindex === 5) {
                        let infoAspirante = event.args.row.bounddata;
                        let idAspirante = infoAspirante["citas_id"];      
                        let estatus = infoAspirante["estdesc"];
                        if(estatus == "Confirmada"){
                            traerdatost(idAspirante,3);
                            $("#idcita").val(idAspirante);      
                        }else if(estatus == "Sesion pendiente"){
                            traerdatost(idAspirante,9);
                            $("#idcita").val(idAspirante);
                        }
                        else{
                            traerdatost(idAspirante,0);
                            $("#idcita").val(idAspirante); 
                        }                 
                    }
                });
            }else{
                
            }
        }else{
           
        }
    });
}
$(document).on('click', '#crearsolicitud', function(event) {
    $("#formulariodiv").show();
});
$(document).on('click', '#cerrar', function(event) {
    $("#formulariodiv").hide();
});
function traerdatost(id,estatus){
    peticion("solicitudes", "datoscita", "&id="+id).done(function(response){
        if(response != ""){
            var codigo = response["code"];
            var mensaje = response["data"].mensaje;
            if(codigo == "OK"){
                var datos = response["data"].listado;
                var informacion = datos[0];
                armarformulariot(informacion,estatus);
                
            }else{
                muestra_mensaje("error", mensaje,10);
            }
        }else{
            muestra_mensaje("error", mensaje,10);
        }
    });
}
function armarformulariot(datos,estatus){
    $("#gridtatuador").hide();
    $("#zona").empty();
    $("#tamaño").empty();
    $("#descripcion").empty();
    htmlzona ='<div><p class="pform">'+datos.zonac+'</p></div>';
    htmltamaño ='<div><p class="pform">'+datos.tamaño+'</p></div>';
    htmldesc ='<div><p class="pform">'+datos.descripcion+'</p></div>'+
    '<div class="imagencont"><img src="data:image/png;base64,' + datos.imagen + '" /></div>';

    $("#zona").append(htmlzona);
    $("#tamaño").append(htmltamaño);
    $("#descripcion").append(htmldesc);
    $("#infocita").show();
    if(estatus == 3){
        $(".pendiente").hide();
        $(".confirmado").show();
        
    }else if(estatus == 9){
        $(".pendiente").hide();
        $("#frmsolicitud").hide();
        $(".confirmado").show();
    }else{
        $(".confirmado").hide();
        $("#frmsolicitud").show();
        $(".pendiente").show();
        
    }
    llenartatuadores();
}
function traerdatosu(id,estatus){
    peticion("solicitudes", "datoscita", "&id="+id).done(function(response){
        if(response != ""){
            var codigo = response["code"];
            var mensaje = response["data"].mensaje;
            if(codigo == "OK"){
                var datos = response["data"].listado;
                var informacion = datos[0];
                armarformulariou(informacion,estatus);
                
            }else{
                muestra_mensaje("error", mensaje,10);
            }
        }else{
            muestra_mensaje("error", mensaje,10);
        }
    });
}
function armarformulariou(datos,estatus){
    $("#grid").hide();
    $("#zona").empty();
    $("#tamaño").empty();
    $("#descripcion").empty();
    htmlzona ='<div><p class="pform">'+datos.cita_fecha_confirmada+'</p></div>';
    htmltamaño ='<div><p class="pform" id="cotizaciontxt">'+datos.cotizacion+'</p></div>';
    htmldesc ='<div><p class="pform">'+datos.comentarios+'</p></div>';

    $("#zona").append(htmlzona);
    $("#tamaño").append(htmltamaño);
    $("#descripcion").append(htmldesc);
    if(estatus == 3){
        $(".pendiente").hide();
        $(".confirmado").show();
        $("#btn_aceptarsesion").hide();
    }else{
        $(".confirmado").hide();
        $("#frmsolicitud").show();
        $(".pendiente").show();
    }
    $("#infocita").show();
}
function traerdatos(id){
    peticion("solicitudes", "datoscita", "&id="+id).done(function(response){
        if(response != ""){
            var codigo = response["code"];
            var mensaje = response["data"].mensaje;
            if(codigo == "OK"){
                var datos = response["data"].listado;
                var informacion = datos[0];
                armarformulario(informacion);
                
            }else{
                muestra_mensaje("error", mensaje,10);
            }
        }else{
            muestra_mensaje("error", mensaje,10);
        }
    });
}
function armarformulario(datos){
    $("#gridadmin").hide();
    $("#zona").empty();
    $("#tamaño").empty();
    $("#descripcion").empty();
    htmlzona ='<div><p class="pform">'+datos.zonac+'</p></div>';
    htmltamaño ='<div><p class="pform">'+datos.tamaño+'</p></div>';
    htmldesc ='<div><p class="pform">'+datos.descripcion+'</p></div>'+
    '<div class="imagencont"><img src="data:image/png;base64,' + datos.imagen + '" /></div>';

    $("#zona").append(htmlzona);
    $("#tamaño").append(htmltamaño);
    $("#descripcion").append(htmldesc);
    $("#infocita").show();
    llenartatuadores();
}
$(document).on('click', '#img_close', function(event) {
    $("#infocita").hide();
    $("#gridadmin").show();
    $("#zona").empty();
    $("#tamaño").empty();
    $("#descripcion").empty();
});
$(document).on('click', '#img_closeu', function(event) {
    $("#infocita").hide();
    $("#grid").show();
    $("#zona").empty();
    $("#tamaño").empty();
    $("#descripcion").empty();
});
$(document).on('click', '#img_closet', function(event) {
    $("#infocita").hide();
    $("#gridtatuador").show();
    $("#zona").empty();
    $("#tamaño").empty();
    $("#descripcion").empty();
});
function llenartatuadores(){
    peticion("solicitudes", "listadotatuadores",).done(function(response){
        if(response != ""){
            var codigo = response["code"];
            var mensaje = response["data"].mensaje;
            if(codigo == "OK"){
                var datos = response["data"].listado;
                var combo = "<select id='tatuadorinfo' name='tatuadorinfo' class='combo'><option value=0 > Seleccionar tatuador </option>";
                $.each(datos , function (index, value){
                    combo += "<option value='" + value.tatuador_id + "'>" + value.tatuador_nombre + " </option>";
                });
                combo += "</select>";
                $("#combotatuadores").empty().html( combo );
            }else{
                var combo = "<select id='tatuadorinfo' name='tatuadorinfo' class='combo'><option value=0 > Sin tatuador </option></select>";
                $("#combotatuadores").empty().html( combo );
                muestra_mensaje("error", mensaje,10);
            
            }
        }else{
            muestra_mensaje("error", mensaje,10);
            
        }
    });
}

function siguiente(estatus,tatuador,id){
    if(tatuador != 0){
var params = "&estatus="+estatus+"&tatuador="+tatuador+"&id="+id;
}else{
        var params = "&estatus="+estatus+"&id="+id;
    }
peticion("solicitudes", "actualizar",params).done(function(response){
    if(response != ""){
        var codigo = response["code"];
        var mensaje = response["data"].mensaje;
        if(codigo == "OK"){
        }else{
            muestra_mensaje("error", mensaje,10);
        }
    }else{
        muestra_mensaje("error", mensaje,10);
    }
});
}
$(document).on('click', '#btn_rechazar', function(event) {
   siguiente(5,0,$("#idcita").val());
});
$(document).on('click', '#btn_asignar', function(event) {
    var tatuador = $("#tatuadorinfo").val();
   if(tatuador != 0){
    siguiente(2,tatuador,$("#idcita").val());
   }
});
$(document).on('click', '#btn_aceptar', function(event) {
    if($("#frmsolicitud").valid()){
        siguiente(7,0,$("#idcita").val());
        var params = "&"+$("#frmsolicitud").serialize();
        jQuery('#ventana_loader').jqxLoader('open');
        peticion("solicitudes", "cotizacion",params+"&id="+$("#idcita").val()).done(function(response){
            if(response != ""){
                var codigo = response["code"];
                var mensaje = response["data"].mensaje;
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
$(document).on('click', '#btn_aceptaru', function(event) {
    let pago = $("#cotizaciontxt").text();
    $(".pago").show();
    $(".amount").val(pago);
    $("#paypalpago").show();
    
});
$(document).on('click', '#btn_pago', function(event) {
    siguiente(3,0,$("#idcita").val());
    
});
$(document).on('click', '#btn_cancelar', function(event) {
    siguiente(4,0,$("#idcita").val());
});
$(document).on('click', '#btn_sesion', function(event) {
    $("#btn_aceptarsesion").show();
    $("#frmsesion").show();
});
$(document).on('click', '#btn_aceptarsesion', function(event) {
    var params = "&"+$("#frmsesion").serialize();
    if($("#frmsesion").valid()){
        siguiente(9,0,$("#idcita").val());
        jQuery('#ventana_loader').jqxLoader('open');
    peticion("solicitudes", "agendarsesion",params+"&id="+$("#idcita").val()).done(function(response){
        if(response != ""){
            var codigo = response["code"];
            var mensaje = response["data"].mensaje;
            if(codigo == "OK"){
                muestra_mensaje("success", mensaje,10);
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
$(document).on('click', '#btn_finalizar', function(event) {
    siguiente(8,0,$("#idcita").val());
});
/*
$(document).on('change', '#imgref', function (event) {
    const archivoInput = this;
    const valorInput = $('#hayimg');
    if (archivoInput.files.length > 0) {
        if(archivoInput.files[0].size > 1024){
        const nombreArchivo = archivoInput.files[0].name;
        valorInput.val(nombreArchivo);
        }else{
            valorInput.val("Seleccionar archivo");
            muestra_mensaje("error","Archivo dañado",5);
        }
    }
}); */
