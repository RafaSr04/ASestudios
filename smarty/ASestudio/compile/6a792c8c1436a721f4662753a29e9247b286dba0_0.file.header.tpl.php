<?php
/* Smarty version 4.3.4, created on 2023-12-19 19:26:37
  from 'C:\xampp\htdocs\upiicsa\ASestudio\plantillas\sistema\header.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_6581e05d550268_27034690',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6a792c8c1436a721f4662753a29e9247b286dba0' => 
    array (
      0 => 'C:\\xampp\\htdocs\\upiicsa\\ASestudio\\plantillas\\sistema\\header.tpl',
      1 => 1702567990,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6581e05d550268_27034690 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=Edge" />
        <title>ASestudios</title>
        <meta name="description" content="ASestudios">
        <meta name="keywords" content="ASestudios">
        <meta name="author" content="Rafael Sardaneta">
        <meta name="copyright" CONTENT="Rafael Sardaneta">
        <!--control de cache-->
        <meta name-equiv="CACHE-CONTROL" CONTENT="NO-CACHE">
        <meta name-equiv="PRAGMA" CONTENT="NO-CACHE">
        <!--Robots-->
        <meta name="ROBOTS" CONTENT="NONE">
        <meta name="GOOGLEBOT" CONTENT="NOARCHIVE"> 
        <link type="text/css" rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['ruta_relativa']->value;?>
css/base.css?v=<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
"/>
        <link type="text/css" rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['ruta_relativa']->value;?>
css/header.css?v=<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
"/>
		<link rel="icon" href="img/favicon.png" type="image/png" sizes="16x16">
        <?php echo '<script'; ?>
 type="text/javascript" src="js/jquery-3.7.0.min.js"><?php echo '</script'; ?>
>
        <link type="text/css" rel="stylesheet" href="js/jquery-ui.min.css?v=<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
"/>
        <?php echo '<script'; ?>
 type="text/javascript" src="js/jquery-ui.min.js"><?php echo '</script'; ?>
>
        <!-- BOOTSTRAP 4 CDN -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link type="text/css" rel="stylesheet" href="js/jqwidgets_lib/jqwidgets/styles/jqx.base.css" />
        <?php echo '<script'; ?>
 src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"><?php echo '</script'; ?>
>
		<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['ruta_js']->value;?>
/comunes<?php echo $_smarty_tpl->tpl_vars['extencion_js']->value;?>
?v=<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 type="text/javascript" src="js/jquery.validate.min.js?v=<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 type="text/javascript" src="js/additional-methods.min.js?v=<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 type="text/javascript" src="js/jqwidgets_lib/jqwidgets/jqxcore.js"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 type="text/javascript" src="js/jqwidgets_lib/jqwidgets/jqxnotification<?php echo $_smarty_tpl->tpl_vars['extencion_js']->value;?>
?v=<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 type="text/javascript" src="js/jqwidgets_lib/jqwidgets/jqxloader.js"><?php echo '</script'; ?>
>
        <link rel="stylesheet" href="js/jqwidgets_lib/jqwidgets/styles/jqx.base.css" type="text/css" />
		<link rel="stylesheet" href="js/jqwidgets_lib/jqwidgets/styles/jqx.fresh.css" type="text/css" />
    </head>
    <body>
        <div id="ventana_notificacion">
            <div id="ventana_notificacion_mensaje"></div>
        </div>
       <div id="contenedorloader">
        <div id="ventana_loader"></div>
       </div><?php }
}
