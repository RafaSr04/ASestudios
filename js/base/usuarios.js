$(document).ready(function () {
roles();
$("#frmregistro").validate({
    rules: {
        correo: {
        required:true,
        email:true
        },
        password: {
        required:true
        },
        ccorreo: {
            required:true,
            email:true,
            equalTo: "#correo"
        },
        cpassword: {
            required:true,
            equalTo: "#password"
        }
    },
    messages: {
        correo: {
            required:"campo requerido",
            email:"Formato de correo incorrecto",
        },
        password: {
            required:"campo requerido"
        },
        ccorreo: {
            required:"campo requerido",
            email:"Formato de correo incorrecto",
            equalTo: "Los correos no coinciden"
        },
        cpassword: {
            required:"campo requerido",
            equalTo: "Las contraseñas no coinciden"
        }
    }
});
});//ready
function roles(){
    
    //<select id='snippet_id' name='snippet_id' class='combo'><option value=0 > Seleccionar anterior </option></select>
    peticion("usuarios", "roles", "").done(function (result) {
        if(result.code=="OK"){
            var datos = result.data;
                var combo = "<select id='roles' name='roles' class='combo'><option value=0 > Seleccionar rol </option>";
                $.each(datos , function (index, value){
                    combo += "<option value='" + value.id + "'>" + value.nombre + " </option>";
                });
                combo += "</select>";
                $("#comboroles").empty().html( combo );
                
        }else{
            var combo = "<select id='roles' name='roles' class='combo'><option value=0 > Sin rol </option></select>";
            $("#comboroles").empty().html( combo );
            
        }
    });
}
$(document).on('click', '#btnregistro', function(event) {
    var rol = $("#roles").val();
    if($("#frmregistro").valid() && rol != 0){
        alert();
    }
});