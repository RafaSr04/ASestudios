{include "menu.tpl"}
<script type="text/javascript" src="{$ruta_js}/solicitudes{$extencion_js}?v={$version}"></script>
<script type="text/javascript" src="js/jquery.fancybox.js?v=1.0.0"></script>
<script type="text/javascript" src="js/jqwidgets_lib/jqwidgets/jqx-all.js"></script>
<script type="text/javascript" src="js/jquery.fancybox.pack.js?v=1.0.0"></script>
<script type="text/javascript" src="js/jqwidgets_lib/jqwidgets/jqxdate.js?v=1.0.0"></script>
<link rel="stylesheet" href="css/jqx.base.css" type="text/css" />
<link rel="stylesheet" href="css/solicitudes.css" type="text/css" />
<div class="contenido">
{if $rol == 2}
<div>
    <h1>Mis Citas</h1>
</div>
<div>
    <div id="grid"></div>
    <div id="infocita">
        <div id="header">
            <h1>Informacion de citas</h1>
            <img id="img_closeu" src="img/close.png" class="close" alt="close" />
            <input type="text" id="idcita" name="idcita" class="" hidden readonly/>
        </div>
        <div class="contenedor">
            <h1 class="encabezado">Fecha Confirmada</h1>
            <div id="zona" class="informacion"></div>
        </div>
        <div class="contenedor">
            <h1 class="encabezado">Cotizacion</h1>
            <div id="tamaño" class="informacion"></div>
        </div>
        <div class="contenedor">
            <h1 class="encabezado">Comentarios</h1>
            <div id="descripcion" class="informacion"></div>
        </div>
        <div class="contenedor enctatuadores">
            <div class="contenedor pago">
                <div id="paypalpago">
                    <form action="https://www.paypal.com/donate" method="post" target="_top">
                        <input type="hidden" name="business" value="QR5UE4GFUSPZW" />
                        <input type="hidden" name="amount" class="amount" value="" />
                        <input type="hidden" name="no_recurring" value="1" />
                        <input type="hidden" name="currency_code" value="MXN" />
                        <input type="image" src="https://www.paypalobjects.com/es_XC/i/btn/btn_donate_SM.gif" border="0" name="submit" title="PayPal - The safer, easier way to pay online!" alt="Donar con el botón PayPal" />
                        <img alt="" border="0" src="https://www.paypal.com/es_MX/i/scr/pixel.gif" width="1" height="1" />
                        </form>                        
                        
                </div>
                <button type="button" class="button" id="btn_pago">Realizar pago</button>
            </div>
            <div id="botones" class="informacion">
                <button type="button" class="button pendiente" id="btn_rechazar">Rechazar</button>
                <button type="button" class="button pendiente" id="btn_aceptaru">Aceptar</button>
                <button type="button" class="button confirmado" id="btn_cancelar">Cancelar</button>
            </div>
        </div>
    </div>
    <div id="crearsolicitud">Crear Cita</div>
    <div id="formulariodiv">
        <div><img id="cerrar" src="img/close.png" class="" alt="cerrar" /></div>
        <input type="text" id="hayimg" name="" class="" hidden readonly/>
       <form id="formulario">
        <div class="campo">
            <label for="zona">Zona corporal</label>
            <input type="text" id="zona" name="zona" class=""/>
        </div>
        <div class="campo">
            <label for="tamaño">Tamaño (CM)</label>
            <input type="text" id="tamaño" name="tamaño" class=""/>
        </div>
        <div class="campo">
            <label for="descripcion">Descripcion del tatuaje</label>
            <input type="text" id="descripcion" name="descripcion" class="" placeholder="Coloca una breve descripcion de tu idea (Colores tamaños etc)"/>
        </div>
        <div class="campo">
            <label id="labelimg" for="img">Imagen de referencia</label>
            <input type="file" id="imgref" name="imgref" class="" accept="image/jpeg,image/jpg,image/png"/>
        </div>
       </form>
        <button id="btnsolicitar">Solicitar</button>
    </div>
</div>
{elseif $rol == 1}
<div id="gridadmin"></div>
<div id="infocita">
    <div id="header">
        <h1>Informacion de citas</h1>
        <img id="img_close" src="img/close.png" class="close" alt="close" />
        <input type="text" id="idcita" name="idcita" class="" hidden readonly/>
    </div>
    <div class="contenedor">
        <h1 class="encabezado">Zona Corporal</h1>
        <div id="zona" class="informacion"></div>
    </div>
    <div class="contenedor">
        <h1 class="encabezado">Tamaño en CM</h1>
        <div id="tamaño" class="informacion"></div>
    </div>
    <div class="contenedor">
        <h1 class="encabezado">Descripción</h1>
        <div id="descripcion" class="informacion"></div>
    </div>
    <div class="contenedor enctatuadores">
        <h1 class="encabezado">Asignar tatuadores</h1>
        <div id="combotatuadores" class="informacion"></div>
        <div id="botones" class="informacion">
            <button type="button" class="button" id="btn_rechazar">Rechazar</button>
            <button type="button" class="button" id="btn_asignar">Asignar</button>
        </div>
    </div>
</div>
{elseif $rol == 3}
<div id="gridtatuador"></div>
<div id="infocita">
    <div id="header">
        <h1>Informacion de citas</h1>
        <img id="img_closet" src="img/close.png" class="close" alt="close" />
        <input type="text" id="idcita" name="idcita" class="" hidden readonly/>
    </div>
    <div class="contenedor">
        <h1 class="encabezado">Zona Corporal</h1>
        <div id="zona" class="informacion"></div>
    </div>
    <div class="contenedor">
        <h1 class="encabezado">Tamaño en CM</h1>
        <div id="tamaño" class="informacion"></div>
    </div>
    <div class="contenedor">
        <h1 class="encabezado">Descripción</h1>
        <div id="descripcion" class="informacion"></div>
    </div>
    <div class="contenedor enctatuadores">
        <h1 class="encabezado">Asignar tatuadores</h1>
        <div id="" class="informacion">
            <form id="frmsolicitud">
                <div class="campo">
                    <label for="">Comentarios</label>
                    <input type="text" id="comentarios" name="comentarios" class=""/>
                </div>
                <div class="campo">
                    <label for="">Cotizacion</label>
                    <input type="text" id="cotizacion" name="cotizacion" class=""/>
                </div>
                <div class="campo">
                    <label for="">Fecha propuesta</label>
                    <input type="text" class="datepicker cinput" id="fecini_0"
                    name="fecini_0" placeholder="DD-MM-AAAA" onkeydown="false"
                    autocomplete="off" readonly>
                </div>
            </form>
        </div>
        <div id="" class="informacion frsesion">
            <form id="frmsesion">
                <div class="campo">
                    <label for="">Fecha propuesta para siguiente sesión</label>
                    <input type="text" class="datepicker cinput" id="fecini"
                    name="fecini" placeholder="DD-MM-AAAA" onkeydown="false"
                    autocomplete="off" readonly>
                </div>
            </form>
        </div>
        <div id="botones" class="informacion">
            <button type="button" class="button pendiente" id="btn_rechazar">Rechazar</button>
            <button type="button" class="button pendiente" id="btn_aceptar">Aceptar</button>
            <button type="button" class="button confirmado" id="btn_cancelar">Cancelar</button>
            <button type="button" class="button confirmado" id="btn_sesion">Agendar sesión</button>
            <button type="button" class="button sesion" id="btn_aceptarsesion">Aceptar sesión</button>
            <button type="button" class="button confirmado" id="btn_finalizar">Finalizar</button>
        </div>
    </div>
</div>
{/if}
</div>