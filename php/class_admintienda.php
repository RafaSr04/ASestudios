<?php 
 include_once("config.inc.php");
 include_once("database.php");
 include_once("utilidades.php");

 class admintienda extends database{
     private $utilidades = null;

     public function __construct() {
         parent::__construct();
         @$this->utilidades = new utilidades();
     } 

     public function __destruct() {
         parent::__destruct();
     } 
     public function subirarticulo($params=null){
     
             $elementos = "Guardado correctamente";
             $codigo = "OK";
     
            $nombre="";
            if(isset($params["nombre"]) && $params["nombre"] != "") 
            $nombre = $this->cleanQuery($params["nombre"]);

            $precio=0;
            if(isset($params["precio"]) && (int)$params["precio"] > 0) 
            $precio = $this->cleanQuery($params["precio"]);

            $cantidad=0;
            if(isset($params["cantidad"]) && (int)$params["cantidad"] > 0) 
            $cantidad = $this->cleanQuery($params["cantidad"]);
             /******************************************************/
     
             $qry="INSERT INTO productos(descripcion,precio_unitario,cantidad)VALUES('$nombre','$precio','$cantidad');";
     
             try {
                 $this->query($qry);
                 $qry_listado_="SELECT count(LAST_INSERT_ID()) as nuevo_id from productos;";
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
             }catch (Exception $e) {
                 $codigo = "ERR";
                 $elementos = "Error insertar datos";
             }
     
             return array(0 => $codigo, 1 => $elementos);
     
         }
    public function productos($params=null){
    
            $elementos = NULL;
            $codigo = "OK";
            $qry_listado="SELECT * FROM productos;";
    
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
    
        }// fin de metodo sippet_select
    
     
         
 }
?>