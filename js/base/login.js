$(document).ready(function () {
    $("#formlogin").validate({
        rules:{
            correo: {
                required:true,
                email:true
            },
            password:{
                required:true
            }
        },
        messages:{
            correo:{
                required:"Campo requerido",
                email:"formato de correo incorrecto"
            },
            password:{
                required:"Campo requerido",
            }
        },
    });
    $(document).on('click', '#btniniciar', function(event) {
        if($("#formlogin").valid()){
            var params = "&"+$("#formlogin").serialize();
            console.log(params);
            peticion("login", "iniciarsesion",params,"").done(function (result) {
                if(result.code=="OK"){
                    window.location.href = "?op=home";
                   muestra_mensaje("success","Sesion iniciada",10);
                }else{
                    muestra_mensaje("error","error al iniciar sesion",10);
                }
            });
        }
    });
});//ready