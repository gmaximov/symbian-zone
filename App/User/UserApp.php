<?php
namespace App\User;class NewsApp {

	public function __construct() {
		define(USER, ROOT . '/App/User/');
	}
	
	public function start($route) {
		$options = $this->getOptions($route);
		unset($route);
		return (new UserControl())->action($options);
	}
	
	private function getOptions($route) {
		
		return $options;
	}
}
?>