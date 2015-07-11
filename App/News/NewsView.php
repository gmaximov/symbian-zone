<?php 
namespace App\News;
use Core\Classes\Http\Response;
class NewsView {
	public function newsPage($data, $page_number) {
		Response::setTitle('Новости | Cтраница '. $page_number);
		Response::includeContent(NEWS.'template/newsPage.php', $data);
		return $this;
	}
	
	public function newsShow($data) {
		Response::setTitle($data[0]['name']);
		Response::includeContent(NEWS.'template/newsShow.php', $data);
		return $this;
	}
	
	public function comments($data) {
		Response::includeContent(NEWS.'template/comments.php', $data);
		return $this;
	}
	
	public function navigation($current, $last, $offset = 5) {
		return $this->navigationWithLink($current, $last, '', $offset);
	}
	
	public function navigationWithLink($current, $last, $link, $offset = 5) {
		$data['current'] = $current;
		$data['last'] = $last;
		$data['link'] = $link;
		$data['offset'] = $offset;
		Response::includeContent(NEWS.'template/navigation.php', $data);
		return $this;
	}
}
?>