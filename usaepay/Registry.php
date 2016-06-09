<?php

 	namespace usaepay;
	
	class Registry {
		
		private static $instance = null;
 		private $registry = array (
			"objects" => array()
		); 
		
		public static function getInstance() {
		 if(self::$instance === null) {
			self::$instance = new Registry();
		 }
		
		 return self::$instance;
		}
		
		static public function set( $type=false, $key, $object, $prop=false ) {
			if (empty($type))
        		self::getInstance()->registry[$key] = $object;
			elseif (!empty($prop))
				self::getInstance()->registry[$type][$key]->$object = $prop;
			else
				self::getInstance()->registry[$type][$key] = $object;
		}
	 
		static public function get( $key, $type=false ) {
			
			$val = false;
			
			if (empty($type)) {
				if (isset(self::getInstance()->registry[$key]))
					$val = self::getInstance()->registry[$key];
			}
			else {
				if (isset(self::getInstance()->registry[$type][$key]))
					$val = self::getInstance()->registry[$type][$key];
			}
				
			return $val;
		}
	
		/**
		 * Protected constructor to prevent creating a new instance of the
		 * *Singleton* via the `new` operator from outside of this class.
		 */
		protected function __construct() {}
	
		/**
		 * Private clone method to prevent cloning of the instance of the
		 * *Singleton* instance.
		 *
		 * @return void
		 */
		private function __clone(){}
	
		/**
		 * Private unserialize method to prevent unserializing of the *Singleton*
		 * instance.
		 *
		 * @return void
		 */
		private function __wakeup(){}
		
	}

?>