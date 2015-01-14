<?php
	$lists = array(
		1 => array(
			"firstname" => "Le",
			"lastname"  => "Toan"
		),
		2 => array(
			"firstname" => "Nguyen",
			"lastname"  => "Bang"
		),
		3 => array(
			"firstname" => "Do",
			"lastname"  => "Tuyen"
		),
		4 => array(
			"firstname" => "Le",
			"lastname"  => "Giang"
		),
		5 => array(
			"firstname" => "Nguyen",
			"lastname"  => "Truong"
		),
		6 => array(
			"firstname" => "Tran",
			"lastname"  => "Tuan"
		)
	);

	header("Content-Type: application/json; charset=UTF-8");
	echo json_encode($lists);
?>