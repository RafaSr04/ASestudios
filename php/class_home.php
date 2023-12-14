<?php
 include_once("config.inc.php");
 include_once("database.php");
 include_once("utilidades.php");

 class home extends database{
     private $utilidades = null;

     public function __construct() {
         parent::__construct();
         @$this->utilidades = new utilidades();
     } 

     public function __destruct() {
         parent::__destruct();
     } 
    public function grafica_estatus($params=null){
    
            $elementos = NULL;
            $codigo = "OK";
            $qry_listado="SELECT distinct cec.descripcion, count(*) AS repeticiones from citas c
            inner join catalogo_estatus_citas cec ON c.estatus = cec.estatus_citas_id GROUP BY cec.descripcion;";
    
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