<?php
namespace App;
use Core\Classes\Data;
class App {
	public static function load($app_name) {
		$app_list = Data::get('App/AppList');
		if ( !isset($app_list[$app_name]) ) {
			return false;
		}
		$app_name = mb_ucfirst($app_name);
		$class = 'App\\' .$app_name. '\\'.$app_name.'App';
		$app = new $class;
		return $app;
	}
}
?>