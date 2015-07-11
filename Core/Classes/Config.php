<?php
namespace Core\Classes;
class Config {
	private static $config = [];
	
	public static function get($path, $config = '') {
		if ( !isset(self::$config[$path]) ) {
			self::$config[$path] = self::load($path);
		}
		if ( !empty($config) ) {
			return self::$config[$path][$config];
		}
		return self::$config[$path];
	}
	private static function load($path) {
		return (include ROOT.'/Config/'.$path.'.php');
	}
}
?>