<?php
namespace Core;
use App\App;
use Core\Classes\Http\Response;
use Core\Classes\Route\Route;
class FrontController {
	public static function loadApp() {
		Route::setFromGlobals();
		$route = Route::get();
		$app = (new App())->load($route[0]);
		if ( $app->start($route) ) {	
			Response::render();
		} else {
			Response::page404();
		}
	}
}
?>