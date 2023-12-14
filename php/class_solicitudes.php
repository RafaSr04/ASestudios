<?php
 include_once("config.inc.php");
 include_once("database.php");
 include_once("utilidades.php");

 class solicitudes extends database{
     private $utilidades = null;

     public function __construct() {
         parent::__construct();
         @$this->utilidades = new utilidades();
     } 

     public function __destruct() {
         parent::__destruct();
     } 
    public function agregarsolicitud($params=null){
    
            $elementos = NULL;
            $codigo = "OK";
            $user_id = $_SESSION['user_id'];
            
            $zona="";
            if(isset($params["zona"]) && $params["zona"] != "") 
            $zona = $this->cleanQuery($params["zona"]);

            $tamaño=0;
            if(isset($params["tamaño"]) && (int)$params["tamaño"] > 0) 
            $tamaño = $this->cleanQuery($params["tamaño"]);

            $descripcion="";
            if(isset($params["descripcion"]) && $params["descripcion"] != "") 
            $descripcion = $this->cleanQuery($params["descripcion"]);
        

            $qry_listado="SELECT * FROM citas WHERE usuario_id = 2 AND estatus not in(5,8,4);";
            try {
                $res=$this->query($qry_listado);
                if($res->num_rows <= 2){
                    $qry_insert = "INSERT INTO citas(usuario_id,zonac,tamaño,descripcion,estatus,fecha_solicitud)VALUES('$user_id','$zona','$tamaño','$descripcion','1',curdate())";
                    try {
                        $res=$this->query($qry_insert);
                        if($res){
                            $codigo = "OK";
                            $qry_listado_="SELECT count(LAST_INSERT_ID()) as nuevo_id from citas;";
                            try {
                                $res_=$this->query($qry_listado_);
                                if($res_->num_rows > 0){
                                    while($row_ = $res_->fetch_assoc()){
                                        $row_convertido_ = $this->utilidades->utf8_converter($row_);
                                        $elementos = $row_convertido_;
                                    }
                                }else{
                                    $codigo = "ERR";
                                    $elementos = 'Sin elementos';
                                }
                            }catch (Exception $e) {
                                $codigo = "ERR";
                                $elementos = "Error busqueda";
                            }
                        }else{
                        $codigo = "ERR";
                        $elementos = "Error busqueda";
                        }
                    } catch (\Throwable $th) {
                        $codigo = "ERR";
                        $elementos = "Error";
                    }
                }else{
                    $codigo = "ERR";
                    $elementos = 'Solo 3 citas activas';
                }
            }catch (Exception $e) {
                $codigo = "ERR";
                $elementos = "Error";
            }
    
            return array(0 => $codigo, 1 => $elementos);
    
        }
    public function listadoadmin(){
        $elementos = NULL;
        $codigo = "OK";
        $user_id = $_SESSION['user_id'];
        $qry_listado="SELECT c.*,cec.descripcion from citas c
        inner join catalogo_estatus_citas cec on cec.estatus_citas_id = c.estatus;";
            try {
                $res_=$this->query($qry_listado);
                if($res_->num_rows > 0){
                    while($row_ = $res_->fetch_assoc()){
                        $row_convertido_ = $this->utilidades->utf8_converter($row_);
                        $elementos[] = $row_convertido_;
                    }
                }else{
                    $codigo = "ERR";
                    $elementos = 'Sin elementos';
                }
            }catch (\Throwable $th) {
                //throw $th;
            }
            return array(0 => $codigo, 1 => $elementos); 

    }
    public function listadotatuadores($params =null){
        $elementos = NULL;
        $mensaje = "OK";
        $codigo = "OK";
        $id=0;
        if(isset($params["id"]) && (int)$params["id"] > 0) 
        $id = $this->cleanQuery($params["id"]);
        $qry_listado="SELECT tatuador_id,tatuador_nombre,tatuador_especialidad from master_tatuador;";
            try {
                $res_=$this->query($qry_listado);
                if($res_->num_rows > 0){
                    while($row_ = $res_->fetch_assoc()){
                        $row_convertido_ = $this->utilidades->utf8_converter($row_);
                        $elementos[] = $row_convertido_;
                    }
                }else{
                    $codigo = "ERR";
                    $elementos = 'Sin elementos';
                    $mensaje = 'Sin elementos';
                }
            }catch (\Throwable $th) {
                $mensaje = 'Sin elementos';
            }
            return array(0 => $codigo, 1 => array(
                "listado" => $elementos,
                "mensaje" => $mensaje
            )); 

    }
    public function datoscita($params =null){
        $elementos = NULL;
        $codigo = "OK";
        $id=0;
        if(isset($params["id"]) && (int)$params["id"] > 0) 
        $id = $this->cleanQuery($params["id"]);
        $qry_listado="SELECT * from citas where citas_id = $id;";
            try {
                $res_=$this->query($qry_listado);
                if($res_->num_rows > 0){
                    while($row_ = $res_->fetch_assoc()){
                        $row_convertido_ = $this->utilidades->utf8_converter($row_);
                        $elementos[] = $row_convertido_;
                    }
                }else{
                    $codigo = "ERR";
                    $elementos = 'Sin elementos';
                }
            }catch (\Throwable $th) {
                //throw $th;
            }
            return array(0 => $codigo, 1 => array(
                "listado" => $elementos
            )); 

    }
    public function listadotatuador(){
        $elementos = NULL;
        $codigo = "OK";
        if(isset($_SESSION['tatuador_id'])){
            $user_id = $_SESSION['tatuador_id'];
            $qry_listado="SELECT *,cec.descripcion AS estdesc from citas ct
            inner join master_tatuador mt ON mt.tatuador_id = ct.citas_tatuador_asignado
            inner join catalogo_estatus_citas cec ON ct.estatus = cec.estatus_citas_id
            where estatus in(2,3,7,9) AND mt.tatuador_id = $user_id;";
                try {
                    $res_=$this->query($qry_listado);
                    if($res_->num_rows > 0){
                        while($row_ = $res_->fetch_assoc()){
                            $row_convertido_ = $this->utilidades->utf8_converter($row_);
                            $elementos[] = $row_convertido_;
                        }
                    }else{
                        $codigo = "ERR";
                        $elementos = 'Sin elementos';
                    }
                }catch (\Throwable $th) {
                    //throw $th;
                }
                return array(0 => $codigo, 1 => $elementos); 
        }

    }
    public function listado(){
        $elementos = NULL;
        $codigo = "OK";
        $user_id = $_SESSION['user_id'];
        $qry_listado="SELECT *,cec.descripcion AS estdesc FROM citas ct
        inner join catalogo_estatus_citas cec ON ct.estatus = cec.estatus_citas_id WHERE usuario_id = $user_id AND estatus <> 8;";
            try {
                $res_=$this->query($qry_listado);
                if($res_->num_rows > 0){
                    while($row_ = $res_->fetch_assoc()){
                        $row_convertido_ = $this->utilidades->utf8_converter($row_);
                        $elementos[] = $row_convertido_;
                    }
                }else{
                    $codigo = "ERR";
                    $elementos = 'Sin elementos';
                }
            }catch (\Throwable $th) {
                //throw $th;
            }
            return array(0 => $codigo, 1 => $elementos); 

    }
    public function actualizar($params){
        $elementos = null;
        $mensaje = "OK";
        $codigo = "OK";

        $id=0;
        if(isset($params["id"]) && (int)$params["id"] > 0) 
        $id = $this->cleanQuery($params["id"]);
        
        $estatus=0;
        if(isset($params["estatus"]) && (int)$params["estatus"] > 0) 
        $estatus = $this->cleanQuery($params["estatus"]);

        $tatuador=0;
        if(isset($params["tatuador"]) && (int)$params["tatuador"] > 0) 
        $tatuador = $this->cleanQuery($params["tatuador"]);

        if($tatuador == 0){
            if($estatus == 5){
                $qry_listado="UPDATE citas SET estatus = 5 WHERE citas_id = $id;";
            }else{
                $qry_listado="UPDATE citas SET estatus = $estatus WHERE citas_id = $id;";
            }
        }else{
            $qry_listado="UPDATE citas SET estatus = $estatus , citas_tatuador_asignado = '$tatuador' WHERE citas_id = $id; ";
        }
            try {
                $res_=$this->query($qry_listado);
                if($res_){
                    $mensaje = 'Cambio de estatus correcto';
                }else{
                    $codigo = "ERR";
                    $elementos = 'Sin elementos';
                    $mensaje = 'error';
                }
            }catch (\Throwable $th) {
                $mensaje = 'Sin elementos';
            }
            return array(0 => $codigo, 1 => array(
                "listado" => $elementos,
                "mensaje" => $mensaje
            )); 
    }
    public function cotizacion($params){
        $elementos = null;
        $mensaje = "OK";
        $codigo = "OK";

        $id=0;
        if(isset($params["id"]) && (int)$params["id"] > 0) 
        $id = $this->cleanQuery($params["id"]);
        $comentarios="";
        if(isset($params["comentarios"]) && $params["comentarios"] != "") 
        $comentarios = $this->cleanQuery($params["comentarios"]);
        $cotizacion=0;
        if(isset($params["cotizacion"]) && (int)$params["cotizacion"] > 0) 
        $cotizacion = $this->cleanQuery($params["cotizacion"]);
        $fecini_0="";
        if(isset($params["fecini_0"]) && $params["fecini_0"] != "") 
        $fecini_0 = $this->cleanQuery($params["fecini_0"]);

        $qry_listado="UPDATE citas SET cita_fecha_confirmada = '$fecini_0' , cotizacion = '$cotizacion',comentarios = '$comentarios' WHERE citas_id = $id; ";
            try {
                $res_=$this->query($qry_listado);
                if($res_){
                    $mensaje = 'Datos Actualizados';
                }else{
                    $codigo = "ERR";
                    $elementos = 'Sin elementos';
                    $mensaje = 'error';
                }
            }catch (\Throwable $th) {
                $mensaje = 'Sin elementos';
            }
            return array(0 => $codigo, 1 => array(
                "listado" => $elementos,
                "mensaje" => $mensaje
            ));  
    }     
    public function agendarsesion($params){
        $elementos = null;
        $mensaje = "OK";
        $codigo = "OK";

        if(isset($params["fecini"]) && $params["fecini"] != "") 
        $fecini = $this->cleanQuery($params["fecini"]);
        $id=0;
        if(isset($params["id"]) && (int)$params["id"] > 0) 
        $id = $this->cleanQuery($params["id"]);
        $qry_listado="UPDATE citas SET cita_fecha_confirmada = '$fecini'  WHERE citas_id = $id; ";
            try {
                $res_=$this->query($qry_listado);
                if($res_){
                    $mensaje = 'Datos Actualizados';
                }else{
                    $codigo = "ERR";
                    $elementos = 'Sin elementos';
                    $mensaje = 'error';
                }
            }catch (\Throwable $th) {
                $mensaje = 'Sin elementos';
            }
            return array(0 => $codigo, 1 => array(
                "listado" => $elementos,
                "mensaje" => $mensaje
            ));  
    }
 }
?>