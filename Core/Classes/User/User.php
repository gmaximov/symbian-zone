<?php
namespace Core\Classes\User;
use Core\Classes\Data;
use Core\Classes\Config;
use Core\Classes\DB\DB;
class User {
	private static $id = -1;
	private static $name = 'Гость';
	private static $group_name = 'Guest';
	
	public static function loadUser() {
		$hash = self::decodeHash($_COOKIE['User']);
		$user = self::getUserByHash($hash);
		if ($user) {
			self::fillUserData($user);
		}
	}
	
	private static function fillUserData($user) {
		self::$id = $user[0]['id'];
		self::$name = $user[0]['name'];
		self::$group_name = $user[0]['group_name'];
	}
	
	public static function checkPermission($action_name) {
		$permission = Data::get('Group/Permission/' . self::$group);
		$action_permitted = isset( $permission[$action_name] );
		return $action_permitted;
	}
	
	private static function encodeHash($hash) {
		$seed = Config::get('Env', 'seed');
		return $hash ^ $seed;
	}

	private static function decodeHash($hash) {
		return self::encodeHash($hash);
	}
	
	private static function getUserByHash($hash) {
		$params = [
				':hash' => $hash
		];
		$query = 'SELECT id,name,group_name FROM user WHERE hash = :hash';
		$result = DB::execute($query, $params);
		if ( isset($result[0]['name']) ) {
			return $result;
		} else {
			return false;
		}
	}
	
	public static function getName() {
		return self::$name;
	}
}