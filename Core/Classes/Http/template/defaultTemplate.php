<?php
use Core\Classes\Data;
use Core\Classes\Html;
use Core\Classes\Route\Route;
?>
<html>
<head>

<title><?php echo $title?></title>
<?php 
foreach ($script as $src) {
	$htmlOptions = [
			'src' => $src
	];
	echo Html::tag('script', $htmlOptions, null);
}

foreach ($css as $src) {
	$htmlOptions = [
			'rel' => 'stylesheet',
			'type' => 'text/css',
			'href' => $src
	];
	echo Html::tag('link', $htmlOptions);
}
?>
</head>
<body>

<div class="main_menu">

<?php 
$main_menu = Data::get('App/AppMenu');
$route = Route::get();
$selected = $route[0];
foreach ($main_menu as $menu => $value) {
	$class = 'menu_not_selected';
	if ($selected === $menu) {
		$class = 'menu_selected';
	}
	$htmlOptions = [
			'class' => $class,
			'href' => '/news'
	];
	echo Html::tag('a', $htmlOptions, $value);
}
?>

</div>

<?php echo $content;?>
</body>
</html>