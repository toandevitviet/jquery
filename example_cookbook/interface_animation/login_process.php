<?php
	$response = new stdClass;
	$response->success = false;
	$response->error = "username and password must be provided";
	if(isset($_POST['username']) && isset($_POST['password'])){
		$username = $_POST['username'];
		$password = $_POST['password'];		
		if($username=="admin" && $password=="123"){
			$response->success = true;
		}  else {
			$response->error = "Incorrect";
		}
	}

	header("Content-type: application/json; charset=UTF-8");
	echo json_encode($response);
?>