<?php
    include_once("config.inc.php");
    include_once("database.php");
    include_once("utilidades.php");

    class login extends database{
        private $utilidades = null;

        public function __construct() {
            parent::__construct();
            @$this->utilidades = new utilidades();
        } 

        public function __destruct() {
            parent::__destruct();
        } 

        public function iniciarsesion($params=null){
                $elementos = NULL;
                $codigo = "OK";
                $correo="";
                if(isset($params["correo"]) && $params["correo"] != "") 
                $correo = $this->cleanQuery($params["correo"]);
                $password="";
                if(isset($params["password"]) && $params["password"] != "") 
                $password = $this->cleanQuery($params["password"]);
                $pass = $this->encrypt_decrypt("encrypt",$password);

                $qry_listado="SELECT usuario_id,usuario_rol_id FROM master_usuarios WHERE usuario_user = '$correo' AND usuario_password = '$pass'";
                try {
                    $res=$this->query($qry_listado);
                    if($res->num_rows > 0){
                        $datarow = $res->fetch_array();
                        $id_usuario = $datarow["usuario_id"];
                        @session_start();
                        $_SESSION['logeado'] = 1;
                        $_SESSION['user_id'] = $datarow["usuario_id"];
                        $_SESSION['rol'] = $datarow["usuario_rol_id"];
                        if($datarow["usuario_rol_id"] == 2){
                            $qry_cliente = "SELECT * FROM MASTER_CLIENTE WHERE cliente_user_id = $id_usuario";
                            try {
                                $res=$this->query($qry_cliente);
                                if($res->num_rows == 0){
                                    $qry_insert_cliente = "INSERT INTO MASTER_CLIENTE(cliente_user_id)values($id_usuario)";
                                    $res=$this->query($qry_insert_cliente);
                                    if($res){
                                        $qry_idcliente = "SELECT cliente_id as id * from master_cliente where cliente_user_id=$id_usuario";
                                        $res=$this->query($qry_idcliente);
                                        if($res->num_rows > 0){
                                            $datarow = $res->fetch_array();
                                            $_SESSION['cliente_id']=$datarow['id'];
                                        }
                                    }
                                }else if($res->num_rows > 0){
                                    $qry_idcliente = "SELECT cliente_id as id * from master_cliente where cliente_user_id=$id_usuario";
                                        $res=$this->query($qry_idcliente);
                                        if($res->num_rows > 0){
                                            $datarow = $res->fetch_array();
                                            $_SESSION['cliente_id']=$datarow['id'];
                                        }
                                }
                            } catch (\Throwable $th) {
                                //throw $th;
                            }
                        }else if($datarow["usuario_rol_id"] == 3){
                            $qry_cliente = "SELECT * FROM master_tatuador WHERE tatuador_usuario_id = $id_usuario";
                            try {
                                $res=$this->query($qry_cliente);
                                if($res->num_rows > 0){
                                    $datarow = $res->fetch_array();
                                    $_SESSION['tatuador_id']=$datarow['tatuador_id'];
                                }
                            } catch (\Throwable $th) {
                                //throw $th;
                            }
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