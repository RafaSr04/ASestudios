<?php
    include_once("config.inc.php");
    include_once("database.php");
    include_once("utilidades.php");

    class registro extends database{
        private $utilidades = null;

        public function __construct() {
            parent::__construct();
            @$this->utilidades = new utilidades();
        } 

        public function __destruct() {
            parent::__destruct();
        } 

        public function registrar($params=null){
                $elementos = NULL;
                $codigo = "OK";
                $correo="";
                if(isset($params["correo"]) && $params["correo"] != "") 
                $correo = $this->cleanQuery($params["correo"]);
                $password="";
                if(isset($params["password"]) && $params["password"] != "") 
                $password = $this->cleanQuery($params["password"]);
                $pass = $this->encrypt_decrypt("encrypt",$password);
                $qry_listado="INSERT INTO master_usuarios
                (usuario_user,
                usuario_password,
                usuario_rol_id,
                usuario_activo)
                VALUES
                ('$correo','$pass','2','1');";
                try {
                    $res=$this->query($qry_listado);
                    if($res){
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
            function encrypt_decrypt($action, $string){
                $output = false;
                $encrypt_method = "AES-256-CBC";
                $secret_key = '4535TUD105';
                $secret_iv = 'UP11C54';
                $key = hash('sha256', $secret_key);
                $iv = substr(hash('sha256', $secret_iv), 0, 16);
                if ($action == 'encrypt') {
                    $output = base64_encode(openssl_encrypt($string, $encrypt_method, $key, 0, $iv));
                } else {
                    if ($action == 'decrypt') {
                        $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
                    }
                }
                return $output;
            }
            
    }
?>