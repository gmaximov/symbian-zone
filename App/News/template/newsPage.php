
<div class="news">

<?php
use Core\Classes\Html;
foreach ($data as $news) {
?>
<div class="news_single">
<?php
	echo Html::tag('a', [ 'class' => 'news_title', 'href' => '/news/show:'.$news['id'] ], $news['title']);
?>

<?php
	$news_comments = Html::tag('div', [ 'class' => 'news_info_comments' ], $news['comments']);
	$news_date = Html::tag('div', [ 'class' => 'news_info_date' ], $news['date']);
	echo Html::tag('div', [ 'class' => 'news_info' ], $news_comments . $news_date);
?>

<?php
	echo Html::tag('div', [ 'class' => 'news_body' ], mb_substr($news['text'], 0, $news['cut_position']));
?>

</div>
<br>

<?php 
}
?>
</div>
