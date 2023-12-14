{include "menu.tpl"}
<script type="text/javascript" src="{$ruta_js}/usuarios{$extencion_js}?v={$version}"></script>
<script type="text/javascript" src="js/jquery.fancybox.js?v=1.0.0"></script>
<script type="text/javascript" src="js/jqwidgets_lib/jqwidgets/jqx-all.js"></script>
<script type="text/javascript" src="js/jquery.fancybox.pack.js?v=1.0.0"></script>
<link rel="stylesheet" href="css/jqx.base.css" type="text/css" />
<link rel="stylesheet" href="css/solicitudes.css" type="text/css" />
<div class="contenido">
{if $rol == 1}
<div id="gridusuarios"></div>
<div>
    <form id="frmregistro">
    <div class="contp"><p>Correo</p></div>
    <input class="input" type="text" id="correo" name="correo"/>
    <div class="contp"><p>Confirmar Correo</p></div>
    <input class="input" type="text" id="ccorreo" name="ccorreo"/>
    <div class="contp"><p>Contraseña</p></div>
    <input class="input" type="password" id="password" name="password"/>
    <div class="contp"><p>Confirmar Contraseña</p></div>
    <input class="input" type="password" id="cpassword" name="cpassword"/>
    <div id="comboroles"></div>
    </form>
    <button id="btnregistro">Agregar Usuario</button>
</div>
{else}
<script>
    window.location.href='?op=home';
</script>
{/if}
</div>