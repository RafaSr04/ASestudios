$(document).ready(function () {
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
    $(document).on('click', '#btnregistro', function(event) {
        if($("#frmregistro").valid()){
            var params = "&"+$("#frmregistro").serialize();
         
            peticion("registro", "registrar",params,"").done(function(response){
                if(response != ""){
                    var codigo = response["code"];
                    alert(codigo);
                    if(codigo == "OK"){
                       window.location.href = "?op=login";
            
                    }else{
                    muestra_mensaje("error", mensaje,10);
                    }
                }else{
                 muestra_mensaje("error", mensaje,10);
                }
            });
        }
    });
});