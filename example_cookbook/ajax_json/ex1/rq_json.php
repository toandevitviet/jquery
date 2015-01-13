<?php
	$array = array(
		1 => array(
			"firsname" => "Le",
			"lastname" => "Toan"),
		2 => array(
			"firsname" => "Nguyen",
			"lastname" => "Truong"),
		3 => array(
			"firsname" => "Nguyen",
			"lastname" => "Bang"),
		4 => array(
			"firsname" => "Do",
			"lastname" => "Tuyen")
		);

	//type format and charset
	header("Content-Type: application/json; charset=UTF-8");

	//encode the array into JSON data
	echo json_encode($array);
?>