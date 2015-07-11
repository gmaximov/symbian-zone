<?php
namespace App\News;
use Core\Classes\DB\DB;
class NewsDB{
	const NEWS_BY_PAGE = 30;
	private $_params = [];
	private $pagecount = null;

	public function action(array $options) {
		if ( $options['action'] === 'page' ) {
			
			return $this->getPage($options['id']);
			
		} elseif ( $options['action'] === 'show' ) {
			
			return $this->getNewsById($options['id']);
			
		} elseif ( $options['action'] === 'page_count' ) {
			
			return $this->getPageCount();
			
		} elseif ( $options['action'] === 'is_news_avail' ) {
			
			return $this->isNewsAvail($options['id']);
			
		} elseif ( $options['action'] === 'comments' ) {

			return $this->getComments($options['id']);
			
		}
	}
	
	private function getComments($news_id) {
		$comments = DB::execute('SELECT author_name,body,date FROM `comments` WHERE news_id = :id', [ ':id' => $news_id ]);
		return $comments;
	}
	
	public function addNews($title, $author_name, $author_id, $text, $cut_position) {
		$params = [
				':title' => $title,
				':author_name' => $author_name,
				':author_id' => $author_id,
				':date' => date('H:i, d-m-Y'),
				':text' => $text,
				':cut_position' => $cut_position
		];
		$query = 'INSERT INTO `news` (title,author_name,author_id,date,text,cut_position) 
				VALUES (:title,:author_name,:author_id,:date,:text,:cut_position)';
		
		$data = DB::execute($query, $params);
	}
	
	private function getPage($page_number) {
		$limit = (int) (($page_number-1) * NewsDB::NEWS_BY_PAGE);
		$data = DB::execute('SELECT * FROM `news` ORDER BY id DESC LIMIT '.$limit.','.NewsDB::NEWS_BY_PAGE);
		return $data;
	}
	
	private function getNewsById($news_id) {
		$news = DB::execute('SELECT * FROM `news` WHERE id = :id', [ ':id' => $news_id ]);
		return $news;
	}
	
	private function isNewsAvail($news_id) {
		$count = DB::execute('SELECT COUNT(*) FROM `news` WHERE id = :id', [ ':id' => $news_id ]);
		$count = $count[0]['COUNT(*)'];
		if ($count > 0) {
			return true;
		}
		return false;
	}
	
	private function getPageCount() {
		if ( !isset($this->pagecount) ) {
			$count = DB::execute('SELECT COUNT(*) FROM `news`');
			$count = (int) ceil($count[0]['COUNT(*)'] / NewsDB::NEWS_BY_PAGE);
			$this->pagecount = $count;
		}
		return $this->pagecount;
	}
}
?>