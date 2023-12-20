<?php
/* Smarty version 4.3.4, created on 2023-12-19 20:02:07
  from 'C:\xampp\htdocs\upiicsa\ASestudio\plantillas\sistema\tienda.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_6581e8afbc5187_12589469',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '794017c1307c7ea37fe2fffcc8374b78cde9e3a4' => 
    array (
      0 => 'C:\\xampp\\htdocs\\upiicsa\\ASestudio\\plantillas\\sistema\\tienda.tpl',
      1 => 1702569058,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:menu.tpl' => 1,
  ),
),false)) {
function content_6581e8afbc5187_12589469 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:menu.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['ruta_js']->value;?>
/tienda<?php echo $_smarty_tpl->tpl_vars['extencion_js']->value;?>
?v=<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
"><?php echo '</script'; ?>
>
<link rel="stylesheet" href="css/tienda.css" type="text/css" />
<div class="contenido">
    <div id="encabezado">
        <h1> Tienda</h1>
    </div>
    <div id="productos">
        <div class="container-items">
            
        </div>
    </div>
</div><?php }
}
