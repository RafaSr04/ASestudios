<?php
/* Smarty version 4.3.4, created on 2023-12-19 20:02:05
  from 'C:\xampp\htdocs\upiicsa\ASestudio\plantillas\sistema\home.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_6581e8ada067c3_13105771',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '42e13004ad5dc8afbfec525a93f4b34ca7ed8c96' => 
    array (
      0 => 'C:\\xampp\\htdocs\\upiicsa\\ASestudio\\plantillas\\sistema\\home.tpl',
      1 => 1702444045,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:menu.tpl' => 1,
  ),
),false)) {
function content_6581e8ada067c3_13105771 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:menu.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['ruta_js']->value;?>
/home<?php echo $_smarty_tpl->tpl_vars['extencion_js']->value;?>
?v=<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
"><?php echo '</script'; ?>
>
<link rel="stylesheet" href="css/home.css" type="text/css" />
<link rel="stylesheet" type="text/css" href="css/owl.carousel.min.css">
<link rel="stylesheet" type="text/css" href="css/owl.theme.default.min.css">
<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['ruta_js']->value;?>
/owl.carousel.min<?php echo $_smarty_tpl->tpl_vars['extencion_js']->value;?>
?v=<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="js/jqwidgets_lib/jqwidgets/jqxchart.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="js/jqwidgets_lib/jqwidgets/jqxdata.js"><?php echo '</script'; ?>
>
<?php if ($_smarty_tpl->tpl_vars['rol']->value == 2) {?>
            <div id="portadaASStudio"><img id="portada" src="img/portadaASStudio.jpg" class="portada" alt="Mision" /></div>
<div class="contenido">  

<div id="home">
    <div id="recomendaciones" class="titulo">
        <h1>AS Studio</h1>
        <div>
        <p class="textoQuienesSomos">
        AS Studio, tu destino definitivo en el mundo del arte corporal. Somos un estudio de tatuajes donde tu identidad toma forma a través de la tinta y la creatividad. En nuestro espacio, cada diseño cuenta una historia única y personal. Nuestro equipo de artistas apasionados trabaja contigo para transformar tus ideas en obras de arte vivientes. En AS Studio, no solo obtenemos tatuajes; creamos experiencias que perduran y reflejan verdaderamente quién eres
         </p>
        </div>
        <div id="mision">
            <h1>Misión</h1>
            <br>
          <div id="misionc">
            <div id="imgmisiond"><img id="img_mision" src="img/misionimg.jpg" class="misionvison" alt="Mision" /></div>
            <div>
                <p class="textomision">
                    Nuestra misión es proporcionar a nuestros clientes una experiencia de tatuaje excepcional, donde la expresión artística se combina con la profesionalidad y la seguridad. Nos esforzamos por crear tatuajes de alta calidad que reflejen la individualidad y la creatividad de cada cliente. Además, nos comprometemos a mantener los más altos estándares de higiene y seguridad, garantizando que cada tatuaje se realice en un entorno limpio y seguro. Queremos ser un espacio donde los clientes se sientan cómodos y confiados para expresar su identidad a través del arte del tatuaje, mientras promovemos la inclusión, el respeto y la diversidad en nuestra comunidad de tatuajes
                </p>
            </div>
          </div>
        </div>
        <div id="vision">
            <h1>Visión</h1>
            <br>
         <div id="visionc">
             <div id="textovision">
                 <p>Nuestra visión es convertirnos en uno de los estudios de tatuajes más destacados en México y trascender fronteras para competir a nivel internacional con otros estudios de renombre. Buscamos ser reconocidos por la excelencia en la calidad artística y la creatividad de nuestros tatuajes, así como por nuestro compromiso inquebrantable con los más altos estándares de seguridad e higiene. A través de la innovación continua, la dedicación a nuestros clientes y la colaboración con artistas de todo el mundo, aspiramos a ser líderes en la industria del tatuaje, ofreciendo experiencias únicas y obras de arte que perduren en el tiempo.</p>
             </div>
            <div id="imgvisiond"><img id="img_mision" src="img/vision.jpg" class="misionvison" alt="Vision" /></div>
         </div>
        </div>
        <br>
    <div id="preparacion">
        <br>
        <h1> Recomendaciones antes de tatuarte </h1>
        <br>
    <div id="preparacionc">
       <div>
        <ul>
            <li>Realiza un baño general sin rasurar el área del tatuaje.</li>
            <li>Lleva ropa cómoda y adecuada para la zona del tatuaje.</li>
            <li>No consumas ningún tipo de drogas o alcohol.</li>
            <li>Se puntual, recuerda que cuentas únicamente con 15 minutos de tolerancia después de la hora acordada.</li>
            <li>Procura comer algo antes de la cita, que te de energía para la sesión.</li>
            <li>Únicamente podrás consumir bebidas o un dulce durante la cita.</li>
            <li>No lleves acompañantes (No lleves niños, es un ambiente peligroso que no está acondicionado para menores).</li>
            <li>Contar con disponibilidad de tiempo (Algunas sesiones se pueden prolongar).</li>
            <li>Disfruta el proceso de la sesión.</li>
                    </ul>
            <p> NOTA: Si aun no te has decidido por la zona de tu tatuaje, te invitamos a probar nuestro filtro de tatuajes, <a id="simulador" href="?op=Simulador"> Da click aquí</a></p>
    </div>

    </div>
</div>
    </div>
    <div id="mapa" class="titulo">
        <h1>Ubicación</h1>
        <br>
       <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3757.705560735995!2d-99.11289576334065!3d19.63988183194675!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x85d1f411efc24779%3A0xe51623fad0ef18a7!2sAraucaria%2C%20El%20Laurel%2C%2055717%20San%20Francisco%20Coacalco%2C%20M%C3%A9x.!5e0!3m2!1ses-419!2smx!4v1701026235602!5m2!1ses-419!2smx" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
         </div>
 <div id="articulos" class="titulo">
        <br>
        <h1>Te podría interesar</h1>
        <div id="articuloscontent">
        <div id="carrusel">
        <div class="owl-carousel">
            <div class="item"><img src="img/Anuncio1.jpg" /></div>
            <div class="item"><img src="img/Promocion2.jpeg" /></div>
            <div class="item"><img src="img/Promocion3.jpeg" /></div>
        </div>
        </div>        
        </div>
    </div>
</div>
</div>
<?php } elseif ($_smarty_tpl->tpl_vars['rol']->value == 1) {?>
<div class="contenido">
    <div id='jqxChart_estatus' style="width:49%; height:500px;  display: inline-block;"></div>
</div>
<?php } elseif ($_smarty_tpl->tpl_vars['rol']->value == 3) {?>

<?php }
}
}
