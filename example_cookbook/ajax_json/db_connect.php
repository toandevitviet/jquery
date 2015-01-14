<?php
	$dbhost = 'localhost';
	$dbuser = 'root';
	$dbpass = '';
	$dbname = 'test';

	$db = new mysqli($dbhost, $dbuser, $dbpass);

	$db->select_db($dbname);

	if($db->connect_errno > 0){
		die('Error - not connect database: ' . $db->connect_error);
	}
?>