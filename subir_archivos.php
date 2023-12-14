<?php
	include_once('config.inc.php');
	include_once("database.php");
	$daba = new database();
	include_once("utilidades.php");
	$utilidades = new utilidades();
	$destino = $_GET["destino"];
	$producto_id = $_GET["producto_id"];
	$data = "OK";
	$uploaddir = 'uploads/';
	if(!file_exists($uploaddir)){
    	mkdir($uploaddir, 0755);
    }
    if(isset($_SESSION['ASPIRANTE_ID']) && $_SESSION['ASPIRANTE_ID'] != ""){
        $ASPIRANTE_ID = $_SESSION['ASPIRANTE_ID'];
    }
	switch($destino){
     
      case "producto":
        
            $allowed =  array('pdf', 'PDF','png', 'jpg','jpeg');//Solo PDF
            $campo_tabla ='EMPLEADO_DOC_NACI';
            $filename = "";
            $ext = "";
            if(isset($_FILES["file"]["name"]) && $_FILES["file"]["name"] != ""){
                $filename = $_FILES["file"]["name"];
                $ext = pathinfo($filename, PATHINFO_EXTENSION);
            }
            if($filename != "" && !in_array($ext, $allowed)) {
                $data = 'error';
            }
            else{
                $blobeado = base64_encode(file_get_contents($_FILES["file"]['tmp_name']));
                
                $query_update = " UPDATE productos SET imagen = '$blobeado' WHERE producto_id = '$producto_id';";
                
                try{
                        $result = $daba->query($query_update);
                        if($result){ 
                            $codigo = "OK";
                        }else{
                            $data = "error";
                        }
                    
                }
                catch(Exception $e){
                    $data = "error";
                    error_log("NO SE PUDO GUARDAR PDF $query_update $e");
                }
            }
        break;
        case "citas":
        
            $allowed =  array('pdf', 'PDF','png', 'jpg','jpeg');//Solo PDF
            $campo_tabla ='EMPLEADO_DOC_NACI';
            $filename = "";
            $ext = "";
            if(isset($_FILES["file"]["name"]) && $_FILES["file"]["name"] != ""){
                $filename = $_FILES["file"]["name"];
                $ext = pathinfo($filename, PATHINFO_EXTENSION);
            }
            if($filename != "" && !in_array($ext, $allowed)) {
                $data = 'error';
            }
            else{
                $blobeado = base64_encode(file_get_contents($_FILES["file"]['tmp_name']));
                
                $query_update = " UPDATE citas SET imagen = '$blobeado' WHERE citas_id = '$producto_id';";
                
                try{
                        $result = $daba->query($query_update);
                        if($result){ 
                            $codigo = "OK";
                        }else{
                            $data = "error";
                        }
                    
                }
                catch(Exception $e){
                    $data = "error";
                    error_log("NO SE PUDO GUARDAR PDF $query_update $e");
                }
            }
        break;
	}
	echo json_encode($data);