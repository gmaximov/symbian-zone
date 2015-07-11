<?php
namespace App\News;
use Core\Classes\Http\Response;
class NewsControl {
	private $DB;
	
	public function __construct() {
		$this->DB = new NewsDB();
	}
	public function __destruct() {
		unset($this->DB);
	}
	
	public function action($options) {
		if ($options['action'] === 'page') {
			
			return $this->newsPageById($options);
			
		} elseif ( $options['action']  === 'show' ){
			
			return $this->newsShowById($options);
			
		} else {
			
			return false;
			
		}
	}
	
	private function newsShowById($options) {
		$is_news_avail = $this->DB->action([ 'action' => 'is_news_avail', 'id' => $options['id'] ]);
		if ( $is_news_avail ) {
			$news = $this->DB->action($options);
			$comments = $this->DB->action([ 'action' => 'comments', 'id' => $options['id'] ]);
			
			(new NewsView())
			->newsShow($news, $options['id'])
			->comments($comments);
			
			return true;
		}
		return false;
	}
	
	private function newsPageById($options) {
		//add caching
		$page_count = $this->DB->action(['action' => 'page_count']);
		$page_number = (int) $options['id'];
		
		if ( ($page_number > 0) AND ( $options['id'] <= $page_count )) {
			
			$data = $this->DB->action($options);
			(new NewsView($title))
			->newsPage($data, $options['id'])
			->navigation($options['id'], $page_count);
			
			return true;
		}
		return false;
	}
}