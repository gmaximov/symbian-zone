<?php
define(ROOT, __DIR__ . '/..');
function autoload($class) {
	$class = str_replace('\\', '/', $class);
	$path = ROOT . '/' . $class.'.php';
	if ( file_exists($path) ) {
		require_once $path;
	} else {
		throw new Exception('Unable to load class "'.$class.'"', 1);
	}
}
spl_autoload_register('autoload');
require_once ROOT . '/Core/Functions/String.php';
require_once ROOT . '/Core/Functions/Filter.php';
?>