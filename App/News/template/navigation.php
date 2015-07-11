
<div class="news_nav">
<?php
use Core\Classes\Html;
$firsttext = 'ПЕРВАЯ';
$lasttext = 'ПОСЛЕДНЯЯ';
$offset = $data['offset'];
$last = $data['last'];
$current = $data['current'];
$link = $data['link'];

unset($data);

$renderFirstLast = ( (($offset * 2) + 1) <= $last);
$left = $current - 1;
$right = $last - $current;

if ( !empty($link) and ($link[0] !== '/') ) {
	$link = '/'.$link;
}
if ($renderFirstLast) {
	if ( ($current - $offset) < 1 ) {
		$right = ($offset * 2) - $left;
	} elseif ( ($current + $offset) > $last ) {
		$left = ($offset * 2) - $right;
	} else {
		$left = $offset;
		$right = $offset;		
	}
}

$from = $current - $left;
$to = $current + $right;

if ($renderFirstLast) {
	echo Html::tag('a', [ 'class' => 'news_nav_link',	'href' => '/news/page:1' ], $firsttext);
}
for ($from; $from <= $to; $from++ ) {
	if ( $from === $current ) {
		echo '[ ' . $from . ' ]' . PHP_EOL;
	} else {
		echo Html::tag('a', [ 'class' => 'news_nav_link', 'href' => '/news/page:'. $from ], $from);
	}
}
if ($renderFirstLast) {
	echo Html::tag('a', [ 'class' => 'news_nav_link', 'href' => '/news/page:'. $last ], $lasttext);
}
?>
</div>

