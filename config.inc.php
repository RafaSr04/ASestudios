<?php
if(!defined("MY_SMARTY")) define("MY_SMARTY", "smarty/");
if(!defined("PROYECTO")) define("PROYECTO", "ASestudio");
if(!defined("ruta_relativa")) define("ruta_relativa", "/");
if(!defined("ruta_absoluta")) define("ruta_absoluta", dirname(__FILE__)."/");
if(!defined("inc")) define("inc", ruta_absoluta."inc/");

error_reporting(E_ALL); 
ini_set('display_errors', 'On');
ini_set('error_log',"C:/xampp/htdocs/upiicsa/ASestudio/errores/php_errors.log"); 

if(!defined("DOMINIO")) define("DOMINIO", "localhost");
define("COOKIE_TIME", strtotime('+3 month'));

if(!defined("DB_USER")) define("DB_USER", "root");
if(!defined("PASSWORD")) define("PASSWORD", "");
if(!defined("DATABASE")) define("DATABASE", "asestudio");
if(!defined("ruta_js")) define("ruta_js", "js/base");
if(!defined("extencion_js")) define("extencion_js", ".js");
if(!defined("entorno")) define("entorno", "local");
if(!defined("nombre_servidor")) define("nombre_servidor", "http://localhost/");
if(defined("MY_SMARTY") && defined("PROYECTO")) {
        if(!class_exists("Smarty")) {
            if (file_exists(MY_SMARTY . 'libs/Smarty.class.php')) {
                require(MY_SMARTY . 'libs/Smarty.class.php');
                $smarty = new Smarty;
                $smarty->compile_dir = sprintf("%s%s/compile/", MY_SMARTY, PROYECTO);
                $smarty->cache_dir = sprintf("%s%s/cache/", MY_SMARTY, PROYECTO);
                $smarty->config_dir = 'plantillas/configs/';
                $smarty->template_dir = 'plantillas/sistema/';
            } else {
                exit("Ocurrio un error de carga de Smarty: (".MY_SMARTY.")");
            } //if
        } //if
}
?>