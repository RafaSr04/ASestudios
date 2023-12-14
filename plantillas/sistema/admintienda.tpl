{include "menu.tpl"}
<script type="text/javascript" src="{$ruta_js}/admintienda{$extencion_js}?v={$version}"></script>
<script type="text/javascript" src="js/jquery.fancybox.js?v=1.0.0"></script>
<script type="text/javascript" src="js/jqwidgets_lib/jqwidgets/jqx-all.js"></script>
<script type="text/javascript" src="js/jquery.fancybox.pack.js?v=1.0.0"></script>
<link rel="stylesheet" href="css/jqx.base.css" type="text/css" />
<link rel="stylesheet" href="css/admintienda.css" type="text/css" />
<div class="content">
    <div id="admintienda">
        <div>
            <h1>Selecciona una opción</h1>
            <select name="" id="opciones">
                <option value="0">Selecciona una opción</option>
                <option value="1">Alta de producto</option>
                <option value="2">Modificar producto</option>
            </select>
        </div>
    </div>

    <div id="infoprod">
        <table class="tg">
            <thead>
                <tr>
                    <th class="tg-dvpl"><label for="Nombre">Nombre</label></th>
                    <th class="tg-0lax"><label for="Precio">Precio</label></th>
                    <th class="tg-0lax"><label for="Cantidad">Cantidad</label></th>
                    <th class="tg-0lax"><label for="Imagen">Imagen</label></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="tg-0lax"><input type="text" id="Nombre" name="Nombre" class="campoinput" /></td>
                    <td class="tg-0lax"><input type="text" id="Precio" name="Precio" class="campoinput" /></td>
                    <td class="tg-0lax"><input type="text" id="Cantidad" name="Cantidad" class="campoinput" /></td>
                    <td class="tg-0lax"><input type="file" id="Imagen" name="Imagen" class="campoinput tipefile"
                            accept="image/jpeg,image/jpg,image/png" /></td>
                        </tr>
                    </tbody>
                </table>
                <button type="button" id="btnguardarprd" class="boton">Guardar</button>
    </div> <!--fin informacion producto-->
    <div id="contentgrid">
        <div id="grid"></div>
    </div>
</div><!--fin content -->
{if $rol != 1}
<script>
    window.location.href = '?op=home';
</script>
{/if}