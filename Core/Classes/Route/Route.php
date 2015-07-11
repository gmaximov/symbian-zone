<?php
namespace Core\Classes\Route;
class Route {
	private static $route = '';
	private static $default_route = [
			0 => 'news'
	];
	
	public static function set($path) {
		if ( empty($path) ) {
			self::$route = self::$default_route;
		} else {
			$route = explode('/', $path);
			self::$route = $route;
		}
	}
	
	public static function get() {
		return self::$route;
	}
	
	public static function setFromGlobals() {
		$route = $_SERVER['REQUEST_URI'];
		$route = mb_substr($route, 1);
		self::set($route);
	}
}