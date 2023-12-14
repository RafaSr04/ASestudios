<link type="text/css" rel="stylesheet" href="{$ruta_relativa}css/registro.css?v={$version}"/>
<script type="text/javascript" src="{$ruta_js}/registro{$extencion_js}?v={$version}"></script>
<div>
    <div id="principal">
        <div id="formulario">
            <img src="./img/logo.png" alt="logo">
            <form id="frmregistro">
                <div class="contp"><p>Correo</p></div>
            <input class="input" type="text" id="correo" name="correo"/>
            <div class="contp"><p>Confirmar Correo</p></div>
            <input class="input" type="text" id="ccorreo" name="ccorreo"/>
            <div class="contp"><p>Contraseña</p></div>
            <input class="input" type="password" id="password" name="password"/>
            <div class="contp"><p>Confirmar Contraseña</p></div>
            <input class="input" type="password" id="cpassword" name="cpassword"/>
            <div class="contp"><p><a href="?op=login">Iniciar Sesion</a></p></div>
            </form>
            <button id="btnregistro">Registrarme</button>
        </div>
    </div>
</div>