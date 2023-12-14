<?php 
 include_once("config.inc.php");
 include_once("database.php");
 include_once("utilidades.php");


 class perfil extends database{
     private $utilidades = null;

     public function __construct() {
         parent::__construct();
         @$this->utilidades = new utilidades();
     } 

     public function __destruct() {
         parent::__destruct();
     } 
     public function guardarpersonales($params=null){
     
             $elementos = "Guardado correctamente";
             $codigo = "OK";
     
            $nombre="";
            if(isset($params["nombre"]) && $params["nombre"] != "") 
            $nombre = $this->cleanQuery($params["nombre"]);

            $apellidop="";
            if(isset($params["apellidop"]) && $params["apellidop"] != "") 
            $apellidop = $this->cleanQuery($params["apellidop"]);

            $apellidom="";
            if(isset($params["apellidom"]) && $params["apellidom"] != "") 
            $apellidom = $this->cleanQuery($params["apellidom"]);

            $curp="";
            if(isset($params["CURP"]) && $params["CURP"] != "") 
            $curp = $this->cleanQuery($params["CURP"]);

            $idcliente = $_SESSION["user_id"];
             /******************************************************/
     
             $qry="UPDATE master_cliente set cliente_nombre = '$nombre',cliente_apellidop = '$apellidop',cliente_apellidom = '$apellidom',cliente_curp = '$curp' where cliente_user_id = '$idcliente';";
        error_log($qry);
             try {
                 $res = $this->query($qry);
                if(!$res){
                    $codigo = "ERR";
                    $elementos = "Error insertar datos";
                }
             }catch (Exception $e) {
                 $codigo = "ERR";
                 $elementos = "Error insertar datos";
             }
     
             return array(0 => $codigo, 1 => $elementos);
     
         }
     public function guardarcontacto($params=null){
     
             $elementos = "Guardado correctamente";
             $codigo = "OK";
     
            $telefonom=0;
            if(isset($params["telefonom"]) && (int)$params["telefonom"] > 0) 
            $telefonom = $this->cleanQuery($params["telefonom"]);

            $telefonol=0;
            if(isset($params["telefonol"]) && (int)$params["telefonol"] > 0) 
            $telefonol = $this->cleanQuery($params["telefonol"]);

            $email="";
            if(isset($params["email"]) && $params["email"] != "") 
            $email = $this->cleanQuery($params["email"]);

            $idcliente = $_SESSION["user_id"];
             /******************************************************/
     
             $qry="UPDATE master_cliente set cliente_telefono = '$telefonom',cliente_telefono_local='$telefonol',cliente_email='$email' where cliente_user_id = '$idcliente';";
     
             try {
                 $res = $this->query($qry);
                if(!$res){
                    $codigo = "ERR";
                    $elementos = "Error insertar datos";
                }
             }catch (Exception $e) {
                 $codigo = "ERR";
                 $elementos = "Error insertar datos";
             }
     
             return array(0 => $codigo, 1 => $elementos);
     
         }
     public function guardardireccion($params=null){
     
             $elementos = "Guardado correctamente";
             $codigo = "OK";
     
            $calle="";
            if(isset($params["calle"]) && $params["calle"] != "") 
            $calle = $this->cleanQuery($params["calle"]);

            $noext="";
            if(isset($params["noext"]) && $params["noext"] != "") 
            $noext = $this->cleanQuery($params["noext"]);

            $noint="";
            if(isset($params["noint"]) && $params["noint"] != "") 
            $noint = $this->cleanQuery($params["noint"]);

            $codigop="";
            if(isset($params["codigop"]) && $params["codigop"] != "") 
            $codigop = $this->cleanQuery($params["codigop"]);
            $estado="";
            if(isset($params["estado"]) && $params["estado"] != "") 
            $estado = $this->cleanQuery($params["estado"]);

            $municalc="";
            if(isset($params["municalc"]) && $params["municalc"] != "") 
            $municalc = $this->cleanQuery($params["municalc"]);

            $colonia="";
            if(isset($params["colonia"]) && $params["colonia"] != "") 
            $colonia = $this->cleanQuery($params["colonia"]);

            $idcliente = $_SESSION["user_id"];
             /******************************************************/
     
             $qry="UPDATE master_cliente set cliente_calle = '$calle',cliente_next = '$noext',cliente_nint = '$noint',
             cliente_cp = '$codigop',cliente_estado = '$estado',cliente_delmun = '$municalc',cliente_colonia = '$colonia' where cliente_user_id = '$idcliente';";
            error_log($qry);
             try {
                 $res = $this->query($qry);
                if(!$res){
                    $codigo = "ERR";
                    $elementos = "Error insertar datos";
                }
             }catch (Exception $e) {
                 $codigo = "ERR";
                 $elementos = "Error insertar datos";
             }
     
             return array(0 => $codigo, 1 => $elementos);
     
         }
    public function llenarcp($params=null){
        
                $elementos = NULL;
                $codigo = "OK";
                $codigop=0;
                if(isset($params["codigop"]) && (int)$params["codigop"] > 0) 
                $codigop = $this->cleanQuery($params["codigop"]);
                /******************************************************/
        
                $qry_listado="SELECT * FROM catalogo_codigop where codigop_cp = '$codigop';";
        
                try {
                    $res=$this->query($qry_listado);
                    if($res->num_rows > 0){
                        while($row = $res->fetch_assoc()){
                            $row_convertido = $this->utilidades->utf8_converter($row);
                            $elementos[] = $row_convertido;
                        }
                    }else{
                        $codigo = "ERR";
                        $elementos = 'Sin elementos';
                    }
                }catch (Exception $e) {
                    $codigo = "ERR";
                    $elementos = "Error busqueda";
                }
        
                return array(0 => $codigo, 1 => $elementos);
    }
     
         
 }
?>