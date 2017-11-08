<?php

$host = 'mysql:host=localhost;dbname=dinixeblog';
$user = 'root';
$password = '';

$options = array(

	PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
	);

	try{
		$connect = new PDO($host,$user,$password,$options);
		$connect->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	

	}catch(PDOException $e){
		echo "Sorry ! we Have a problem with DataBase";
		//echo $e->getMessage();
		die();
	}