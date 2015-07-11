<?php
namespace App\News;
class NewsApp {

	public function __construct() {
		define(NEWS, ROOT . '/App/News/');
	}
	
	public function start($route) {
		$options = $this->getOptions($route);
		unset($route);
		if ( $options ) {
			return (new NewsControl())->action($options);
		} else {
			return false;
		}
	}
	
	private function getOptions($route) {
		if ( empty($route[1]) ) {
			$route[1] = 'page:1';
		}
		$second_route = explode(':', $route[1]);
		if ( ($second_route[0] === 'show') OR ($second_route[0] === 'page') ) {
			
			if ( (isPositiveInt($second_route[1]) !== false) ) {
				$options['action'] = $second_route[0];
				$options['id'] = (int) $second_route[1];
				return $options;
			} else {
				return false;
			}
			
		} else {
			return false;
		}
	}
}
?>