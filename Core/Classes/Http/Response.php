<?php
namespace Core\Classes\Http;
class Response {
	private static $template_location = ROOT.'/Core/Classes/Http/template/defaultTemplate.php';

	private static $content = '';
	private static $title = '';
	private static $script = [];
	private static $css = ['test.css'];
	
	public static function render() {
		$content = &self::$content;
		$title = &self::$title;
		$script = &self::$script;
		$css = &self::$css;
		include self::$template_location;
	}
	
	public static function setTemplateLocation($path) {
		self::$template_location = ROOT . $path;
	}
	
	public static function includeContent($path, $data = null) {
		ob_start();
		include $path;
		self::addContent(ob_get_clean());
	}
	
	public static function setTitle($title) {
		self::$title = $title;
	}
	
	public static function page404() {
		include ROOT.'/Core/Classes/Http/template/page404.php';
	}
	
	public static function addScript($path) {
		self::$script[] = $path;
	}
	
	public static function addCss($path) {
		self::$css[] = $path;
	}
	
	public static function addContent($content) {
		self::$content .= $content;
	}
}