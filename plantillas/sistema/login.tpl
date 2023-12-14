<link type="text/css" rel="stylesheet" href="{$ruta_relativa}css/login.css?v={$version}"/>
<script type="text/javascript" src="{$ruta_js}/login{$extencion_js}?v={$version}"></script>
<div>
    <div id="principal">
        <div id="formulario">
            <img src="./img/logo.png" alt="logo">
            <form id="formlogin">
                <div class="contp"><p>Correo</p></div>
                <input class="input" type="text" id="correo" name="correo"/>
                <div class="contp"><p>Contraseña</p></div>
                <input type="password" class="input" type="text" id="password" name="password"/>
                <div class="contp"><p><a href="?op=registro">registrate</a></p></div>
            </form>
            <button id="btniniciar">Iniciar Sesion</button>
        </div>
    </div>
</div>