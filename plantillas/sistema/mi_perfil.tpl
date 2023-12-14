{include "menu.tpl"}
<script type="text/javascript" src="{$ruta_js}/perfil{$extencion_js}?v={$version}"></script>
<link rel="stylesheet" href="css/perfil.css" type="text/css" />
<div class="">
    <div id="principal">
        <div class="sidebar">
            <ul>
                <li><a href="#" class="opcion" data-form="datos_personales">Datos Personales</a></li>
                <li><a href="#" class="opcion" data-form="datos_contacto">Datos de Contacto</a></li>
                <li><a href="#" class="opcion" data-form="direccion">Dirección</a></li>
            </ul>
        </div>
        <div class="contentform">
            <div id="datos_personales_form" class="form">
                <h1>Datos personales</h1>
               <form id="frmdatospersonales">
                <label for="nombre">Nombre</label>
                <input type="text" id="nombre" name="nombre" class="campo"/>
                <label for="apellidop">Apellido Paterno</label>
                <input type="text" id="apellidop" name="apellidop" class="campo"/>
                <label for="apellidom">Apellido Materno</label>
                <input type="text" id="apellidom" name="apellidom" class="campo"/>
                <label for="CURP">CURP</label>
                <input type="text" id="CURP" name="CURP" class="campo"/>
               </form>
               <button id="btngdp" class="botones">Guardar</button>
            </div>
            <div id="datos_contacto_form" class="form" style="display: none">
                <h1>Datos de contacto</h1>
                <form id="frmdatoscontacto">
                 <label for="telefonom">Telefono Celular</label>
                 <input type="text" id="telefonom" name="telefonom" class="campo"/>
                 <label for="telefonol">Telefono Local</label>
                 <input type="text" id="telefonol" name="telefonol" class="campo"/>
                 <label for="email">Email</label>
                 <input type="text" id="email" name="email" class="campo"/>
                </form>
                <button id="btngdc" class="botones">Guardar</button>
            </div>
            <div id="direccion_form" class="form" style="display: none">
                <h1>Direccion</h1>
               <form id="frmdireccion">
                <label for="calle">*Calle</label>
                <input type="text" id="calle" name="calle" class="campo"/>
                <label for="noext">*No.Ext</label>
                <input type="text" id="noext" name="noext" class="campo"/>
                <label for="noint">No.Int</label>
                <input type="text" id="noint" name="noint" class="campo"/>
                <label for="codigop">Codigo Postal</label>
                <input type="text" id="codigop" name="codigop" class="campo"/>
                <label for="estado">Estado</label>
                <input type="text" id="estado" name="estado" class="campo" readonly/>
                <label for="municalc">Municipio o Alcaldia</label>
                <input type="text" id="municalc" name="municalc" class="campo" readonly/>
                <label for="colonia">Colonia</label>
                <div type="text" id="coloniac" name="coloniac" class="campo"></div>
               </form>
               <button id="btngdd" class="botones">Guardar</button>
            </div>
            <div id="agendar_cita_form" class="form" style="display: none">
                
            </div>
        </div>
    </div>
</div>