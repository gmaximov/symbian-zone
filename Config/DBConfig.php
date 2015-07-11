<?php
return [
		'db_host' => 'localhost',
		'db_login' => 'root',
		'db_password' => 'mysql',
		'db_name' => 'symbian-zone',
		'options' => array(		
				\PDO::ATTR_ERRMODE            => \PDO::ERRMODE_EXCEPTION,
				\PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC
				)
];
?>