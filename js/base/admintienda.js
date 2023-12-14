$(document).ready(function () {
    llenar();
    $("#infoprod").hide();
    $("#contentgrid").hide();
    $(document).on('change', '#opciones', function(event) {
      if($(this).val() !==0){
        if($(this).val() == 1){
            $("#infoprod").show();
            $("#contentgrid").hide();
        }else{
            $("#infoprod").hide();
            $("#contentgrid").show();
        }
      }
    });
$(document).on('click', '#btnguardarprd', function(event) {
    var nombre= $("#Nombre").val();
    var precio= $("#Precio").val();
    var cantidad= $("#Cantidad").val();
    var params = "&nombre="+nombre+"&precio="+precio+"&cantidad="+cantidad;
    if(nombre !== "" && precio !== "" && cantidad !== ""){
        peticion("admintienda", "subirarticulo", params).done(function(response){
            if(response != ""){
                var codigo = response["code"];
                if(codigo == "OK"){
                    console.log(response);
                    var datos = response["data"].nuevo_id;
                    $('#Imagen').each(function () {
                        var data = new FormData();
                        if (typeof this.files[0] !== "undefined") {
                            data.append("file", this.files[0]);
                            muestra_mensaje("success","Subiendo Archivo...",10);
                            $.ajax({
                                url: 'subir_archivos.php?destino=producto&producto_id=' + datos,
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


                }
            }else{

            }
        });
    }
});

});//ready
function llenar(){
    jQuery('#ventana_loader').jqxLoader('open');
    peticion("admintienda", "productos", "").done(function(response){
        if(response != ""){
            var codigo = response["code"];
            var mensaje = response["data"].mensaje;
            if(codigo == "OK"){
                var datos = response["data"];
            var camposType = [
                { name: 'producto_id', type: 'string' },
                { name: 'descripcion', type: 'string' },
                { name: 'cantidad', type: 'string' },
                { name: 'precio_unitario', type: 'string' },
                { name: 'imagen', type: 'string' }
            ];
    
            var columnas = [
                { text: 'Producto ID', datafield: 'producto_id', width: '20%', editable: false,hidden:true},
                { text: 'Descripción', datafield: 'descripcion', width: '25%', editable: false },
                { text: 'Cantidad', datafield: 'cantidad', width: '25%', editable: false },
                { text: 'Precio', datafield: 'precio_unitario', width: '25%', editable: false },
                { text: 'Imagen', datafield: 'imagen', width: '25%',autoheight:true, editable: false, cellsrenderer: function (row, column, value) {

                    return '<img style="max-width:100%; width:100%;max-height:180px;" src="data:image/png;base64,' + value + '" />';
                            }
            }
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
                ready: function () {
                    // Ajusta la altura de todas las filas a 600px
                    for (var i = 0; i < datos.length; i++) {
                        $('#grid').jqxGrid('setrowheight', i, 180);
                    }
                }
            });
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