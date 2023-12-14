<?php
class peticiones {
    private $classDir;
    private $classPrefix;

    public function __construct($classDir = 'php', $classPrefix = 'class_') {
        $this->classDir = $classDir;
        $this->classPrefix = $classPrefix;
    }
    private function sanitizeInput($data) {
        if (!is_array($data)) {
            return filter_var($data, FILTER_SANITIZE_STRING);
        }
        foreach ($data as $key => $value) {
            if (is_array($value)) {
                $data[$key] = $this->sanitizeInput($value);
            } else {
                $data[$key] = filter_var($value, FILTER_SANITIZE_STRING);
            }
        }
    
        return $data;
    }
    public function handleRequest() {
        $clase = $this->sanitizeInput($_POST['clase'] ?? '');
        $metodo = $this->sanitizeInput($_POST['metodo'] ?? '');
        // Evitar posibles ataques de navegación en el sistema de archivos
        $clase = str_replace(['..', '/', '\\'], '', $clase);
        
        $filePath = "{$this->classDir}/{$this->classPrefix}{$clase}.php";

        if (!file_exists($filePath)) {
            echo json_encode(["code" => false, "data" => "Clase para el servicio no encontrada"]);
            return;
        }
        try {
            require_once($filePath);
            if (!class_exists($clase)) {
                echo json_encode(["code" => false, "data" => "Clase para el servicio no encontrada"]);
                return;
            }

            $parms = $this->sanitizeInput($_POST);
            // Eliminar las claves 'clase' y 'metodo' de $parms
            unset($parms['clase'], $parms['metodo']);
            if (!method_exists($clase, $metodo)) {
                echo json_encode(["code" => false, "data" => "Método no encontrado en la clase"]);
                return;
            }

            $instance = new $clase();
            $result = $instance->$metodo($parms);
            if (is_array($result)) {
                echo json_encode(["code" => $result[0], "data" => $result[1]]);
                return;
            } elseif ($result !== false) {
                echo json_encode($result);
                return;
            } else {
                echo json_encode(["code" => false, "data" => "Internal Server Error"]);
                return;
            }
        } catch (Exception $ex) {
            // Registra errores en un archivo de registro o en otro sistema de registro
            echo json_encode(["code" => false, "data" => "Internal Server Error"]);
            return;
        }
    }
}


?>