<!DOCTYPE html>
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
        <link type="text/css" rel="stylesheet" href="{$ruta_relativa}css/base.css?v={$version}"/>
        <link type="text/css" rel="stylesheet" href="{$ruta_relativa}css/header.css?v={$version}"/>
		<link rel="icon" href="img/favicon.png" type="image/png" sizes="16x16">
        <script type="text/javascript" src="js/jquery-3.7.0.min.js"></script>
        <link type="text/css" rel="stylesheet" href="js/jquery-ui.min.css?v={$version}"/>
        <script type="text/javascript" src="js/jquery-ui.min.js"></script>
        <!-- BOOTSTRAP 4 CDN -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link type="text/css" rel="stylesheet" href="js/jqwidgets_lib/jqwidgets/styles/jqx.base.css" />
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
		<script type="text/javascript" src="{$ruta_js}/comunes{$extencion_js}?v={$version}"></script>
        <script type="text/javascript" src="js/jquery.validate.min.js?v={$version}"></script>
        <script type="text/javascript" src="js/additional-methods.min.js?v={$version}"></script>
        <script type="text/javascript" src="js/jqwidgets_lib/jqwidgets/jqxcore.js"></script>
        <script type="text/javascript" src="js/jqwidgets_lib/jqwidgets/jqxnotification{$extencion_js}?v={$version}"></script>
        <script type="text/javascript" src="js/jqwidgets_lib/jqwidgets/jqxloader.js"></script>
        <link rel="stylesheet" href="js/jqwidgets_lib/jqwidgets/styles/jqx.base.css" type="text/css" />
		<link rel="stylesheet" href="js/jqwidgets_lib/jqwidgets/styles/jqx.fresh.css" type="text/css" />
    </head>
    <body>
        <div id="ventana_notificacion">
            <div id="ventana_notificacion_mensaje"></div>
        </div>
       <div id="contenedorloader">
        <div id="ventana_loader"></div>
       </div>