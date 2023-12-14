<?php
$server = ini_get('mysqli.default_host');

if(!defined('SERVER')) define("SERVER", !empty($server) ? $server : '127.0.0.1');

$db_user = ini_get('mysqli.default_user');

if(!defined("DB_USER")) define("DB_USER", !empty($db_user) ? $db_user : 'root');

$db_pw = ini_get('mysqli.default_pw');

if(!defined("PASSWORD")) define("PASSWORD", !empty($db_pw) ? $db_pw : NULL);

if(!defined("DATABASE")) define("DATABASE", NULL);
session_start();
    class  database{
        protected $conexMySQL = NULL;
        private $connected = FALSE;
        private $driver = NULL;
        private $server = NULL;
        private $user = NULL;
        private $password = NULL;
        private $database = NULL;


        public function __construct($server = SERVER, $user = DB_USER, $password = PASSWORD, $database = DATABASE) {
            $this->server = $server;
            $this->user = $user;
            $this->password = $password;
            $this->database = $database;
        } //function __construct

        public function __destruct() {
     
        } //function __destruct
        public function check_connect() {
            if($this->connected) return;
            $this->conexMySQL = new mysqli($this->server, $this->user, $this->password, $this->database);
            //if
    
            if ($this->conexMySQL->connect_errno) {
                throw new Exception("Error de conexion: %s\n", $this->conexMySQL->connect_error);
            } //if
        }
        public function cleanQuery($string) {
            $this->check_connect();
            $string = stripslashes($string);
           /*  if(get_magic_quotes_gpc()) {
                $string = stripslashes($string);
            } //if */
            if(is_array($string)) { 
                foreach($string as $key => $v) { 
                    $string[$key] = $this->conexMySQL->real_escape_string($v);
                } //foreach
            } else { 
                $string = $this->conexMySQL->real_escape_string($string);
            } //if
            return $string;
        }
        public function query($sql) {
            $this->check_connect();
    
            $this->sql = trim($sql);
            try {
                $this->results = $this->conexMySQL->query($this->sql);
            } catch(Exception $ex) {
                trigger_error($this->error(), E_USER_WARNING);
                throw new Exception($this->error(), $this->conexMySQL->errno);
            }
            if($this->conexMySQL->error || $this->conexMySQL->errno) {
                trigger_error($this->error(), E_USER_WARNING);
                throw new Exception($this->error(), $this->conexMySQL->errno);
            } //if
    
            return $this->results;
        }
    }
?>