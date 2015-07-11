
<div class="comments"> 

<?php
use Core\Classes\Html;
foreach ($data as $comment) {
?>
<div class="comment_single">
<?php 
	//echo Html::tag('a', [ 'class' => 'comment_author', 'href' => '/user/show:'.$comment['author_id'] ], $comment['author_name']);
	echo Html::tag('div', [ 'class' => 'comment_author' ], $comment['author_name']);
?>

<?php
	$date = date('H:i, d-m-Y', strtotime($comment['date']));
	//$comment_date = Html::tag('div', [ 'class' => 'comment_date' ], date('H:i, d-m-Y', strtotime($comment['date'])));
	echo Html::tag('div', [ 'class' => 'comment_info' ], $date);
?>

<?php
	echo Html::tag('div', [ 'class' => 'comment_body' ], mb_substr($news['text'], 0, $comment['cut_position']));
?>

</div>

<?php 
}
?>

</div>
