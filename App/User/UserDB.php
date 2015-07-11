<?php
namespace App\User;
use Core\Classes\DB;
class UserDB {
	public function authUser($name, $password) {
		if ( $this->checkUserExist($name, $password) ) {
			$hash = $this->getUserHash($name);
			$this->registerCookie($hash);
		}
	}
	
	public function addUser($name, $password, $email) {
		$password = $this->hashPassword($password);
		$hash = str_generate(32);
		$params = [
				':name' => $name,
				':password' => $password,
				':email' => $email,
				':hash' => $hash
		];
		$query = 'INSERT INTO user (name,password,email,hash) VALUES (:name,:password,:email,:hash)';
		try {
			DB::execute($query, $params);
		} catch (\PDOException $e) {
			return false;
		}
		return true;
	}
	
	public function editUser() {
	
	}
	
	public function checkNameDuplicate($name) {
		$params = [
				':name' => $name
		];
		$query = 'SELECT COUNT(*) FROM user WHERE (name = :name)';
	
		$result = DB::execute($query, $params);
		return $result[0]['COUNT(*)'];
	}
	
	public function checkEmailDuplicate($email) {
		$params = [
				':email' => $email
		];
		$query = 'SELECT COUNT(*) FROM user WHERE (email = :email)';
	
		$result = DB::execute($query, $params);
		return $result[0]['COUNT(*)'];
	}
	
	public function checkUserExist($name, $password) {
		$params = [
				':name' => $name
		];
		$query = 'SELECT password FROM user WHERE name = :name';
		$result = DB::execute($query, $params);
		return $this->checkPassword($password, $result[0]['password']);
	}
	
	public function getUserByHash($hash) {
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
	
	private function getUserHash($name) {
		$params = [
				':name' => $name
		];
		$query = 'SELECT hash FROM user WHERE name = :name';
		$result = DB::execute($query, $params);
		return $result[0]['hash'];
	}
	
	private function hashPassword($password) {
		return password_hash($password, PASSWORD_DEFAULT);
	}
	
	private function checkPassword($password, $hash) {
		return password_verify($password, $hash);
	}
}