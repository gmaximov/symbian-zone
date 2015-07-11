<?php
namespace Core\Classes\DB;
use Core\Classes\Config;
class DB {
	private static $_database;	
	
	public function __destruct() {
		self::$_database = null;
	}
	
	private static function getInstance() {
		$config = Config::get('DBConfig');
		if (self::$_database == null) {
			self::$_database = new \PDO('mysql:host='.$config['db_host'].';dbname='.$config['db_name'], $config['db_login'], $config['db_password'], $config['options']);
		}
		return self::$_database;
	}
	public static function execute($query, $params = []) {
		$stmt = DB::getInstance()->prepare($query);
		$stmt->execute($params);
		if ( $stmt->columnCount() > 0 ) {
			return $stmt->fetchAll();
		}
	}
	private function __construct() {}
	private function __clone() {}
}
?>