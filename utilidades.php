<?php
	class utilidades {
		public function logout() {
			$this->destroySession();
			$this->destroyCookieSession();
		} 
		private function destroySession() {
			session_unset();
			session_destroy();
		} 
		private function destroyCookieSession() {
			setcookie("session_u", '', -(COOKIE_TIME), "/", DOMINIO);
			setcookie("session_p", '', -(COOKIE_TIME), "/", DOMINIO);
			setcookie("session_remember", '', -(COOKIE_TIME), "/", DOMINIO);
			unset($_COOKIE['session_u']);
			unset($_COOKIE['session_p']);
			unset($_COOKIE['session_remember']);
		} 
	    function utf8_converter($array){
	        array_walk_recursive($array, function(&$item, $key){
	            if(!mb_detect_encoding($item, 'utf-8', true)){
	            	$item = utf8_encode($item);
	            }
	        });
	        return $array;
	    }
	}
?>