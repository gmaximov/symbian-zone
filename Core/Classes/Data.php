<?php
namespace Core\Classes;
class Data {
	private static $data = [];
	
	public static function get($path) {
		if ( !isset(self::$data[$path]) ) {
			self::$data[$path] = self::load($path);
		}
		return self::$data[$path];
	}
	private static function load($path) {
		return (include ROOT.'/Data/'.$path.'.php');
	}
}
?>