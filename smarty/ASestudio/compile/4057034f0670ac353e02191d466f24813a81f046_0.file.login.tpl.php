<?php
/* Smarty version 4.3.4, created on 2023-12-19 19:26:37
  from 'C:\xampp\htdocs\upiicsa\ASestudio\plantillas\sistema\login.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_6581e05d6380f9_24024155',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4057034f0670ac353e02191d466f24813a81f046' => 
    array (
      0 => 'C:\\xampp\\htdocs\\upiicsa\\ASestudio\\plantillas\\sistema\\login.tpl',
      1 => 1696951635,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6581e05d6380f9_24024155 (Smarty_Internal_Template $_smarty_tpl) {
?><link type="text/css" rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['ruta_relativa']->value;?>
css/login.css?v=<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
"/>
<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['ruta_js']->value;?>
/login<?php echo $_smarty_tpl->tpl_vars['extencion_js']->value;?>
?v=<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
"><?php echo '</script'; ?>
>
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
</div><?php }
}
