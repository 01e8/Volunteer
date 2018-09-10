<?php
	
	class Db
	{
	    public static function getConnection(){
			
			$paramsPath = ROOT.'/config/db_params.php';
			$params = include($paramsPath);

			$dsn = "mysql:dbname={$params['dbname']};host={$params['host']}";
			$user = $params['user'];
			$password = $params['password'];

			try {
			    $db = new PDO($dsn, $user, $password);
			} catch (PDOException $e) {
			    echo 'Подключение не удалось: ' . $e->getMessage();
			}

			return $db;
	    }
	}