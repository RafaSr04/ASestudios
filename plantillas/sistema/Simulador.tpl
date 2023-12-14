{include "menu.tpl"}
<script type="text/javascript" src="{$ruta_js}/simulador{$extencion_js}?v={$version}"></script>
<link rel="stylesheet" href="css/simulador.css" type="text/css" />
<div class="contenido">
    <h1>Simulador Tattoo</h1>
    <input type="file" id="userImageInput" accept="image/*">
    <div class="tattoo-gallery">
        <img src="img/tattoo1.png" alt="Tattoo 1" class="tattoo" data-tattoo="img/tattoo1.png">
        <img src="img/tattoo2.png" alt="Tattoo 2" class="tattoo" data-tattoo="img/tattoo2.png">
        <img src="img/tortuga.png" alt="Tattoo 2" class="tattoo" data-tattoo="img/tortuga.png">
        <img src="img/pajaro.png" alt="Tattoo 2" class="tattoo" data-tattoo="img/pajaro.png">
        <img src="img/elefante.png" alt="Tattoo 2" class="tattoo" data-tattoo="img/elefante.png">
        <img src="img/dragon.png" alt="Tattoo 2" class="tattoo" data-tattoo="img/dragon.png">
        <!-- Add more tattoo images here -->
    </div>
    <canvas id="canvas" tabindex="0"></canvas>
</div>