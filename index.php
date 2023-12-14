<?php
include_once('config.inc.php');
include_once("database.php");


if(!isset($_SESSION)){
    session_start();
}
$opcion = isset($_GET['op']) ? $_GET['op'] : "";


if (!isset($_SESSION['logeado']) || $_SESSION['logeado'] == 0) {
    if ($opcion !== 'login' && $opcion !== 'registro') { 
        header('Location: ' . ruta_relativa . "index.php?op=login");
        exit();
    }
}else if (isset($_SESSION['logeado']) || $_SESSION['logeado'] == 1){
    if ($opcion == 'login' && $opcion == 'registro') { 
        header('Location: ' . ruta_relativa . "index.php?op=home");
    }
}

$php_file = $opcion . ".php";
$template = $opcion . ".tpl";


if (file_exists($php_file)) {
    
    include($php_file);
}

if(isset($_SESSION["rol"])) {
    $smarty->assign('rol',$_SESSION["rol"]);
    }
if( !isset($_SESSION['user_id'])) {
    $_SESSION['user_id'] = "";
    }

$smarty->assign('anio', date('Y'));
$smarty->assign('ruta_js', ruta_js);
$smarty->assign('extencion_js', extencion_js);
$smarty->assign('entorno', entorno);
$smarty->assign('version', rand());
$smarty->assign('ruta_relativa', ruta_relativa);


$smarty->display("header.tpl");
$smarty->display($template);
?>