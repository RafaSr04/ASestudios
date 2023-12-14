<?php
include("procesos.php");
include("config.inc.php");
$peticiones = new peticiones;
$peticiones->handleRequest();
?>