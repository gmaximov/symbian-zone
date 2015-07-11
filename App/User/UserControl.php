<?php
namespace App\User;
class UserControl {
	private $DB;
	
	public function __construct() {
		$this->DB = new UserDB();
	}
	public function __destruct() {
		unset($this->DB);
	}
	
	public function action($options) {
		if ($options['action'] === '') {
		} else {
			return false;
		}
	}
}