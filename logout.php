<?php
include("utilidades.php");
include_once("config.inc.php");
if(is_string($smarty)){
   die($smarty);
} //if
session_start();
$session = new utilidades();

$_SESSION['logeado'] = 0;
$_SESSION['username'] = "";
$_SESSION['usuario_id'] = "";
$_SESSION['USER_NOMBRE_COMPLETO'] = "";
$_SESSION['USER_MAIL'] = "";
$_SESSION['USER_ACTIVO'] = "";

$session->Logout();


if (isset($_SERVER['HTTP_COOKIE'])) {
    $cookies = explode(';', $_SERVER['HTTP_COOKIE']);
    foreach($cookies as $cookie) {
        $parts = explode('=', $cookie);
        $name = trim($parts[0]);
        setcookie($name, '', time()-1000);
        setcookie($name, '', time()-1000, '/');
    }
}
header("Location: " . ruta_relativa);
?>