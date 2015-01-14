<?php
	$data = new stdClass;
	$data->success = false;
	$data->results = array();
	$data->error = NULL;

	if(isset($_POST['text'])){
		require_once('db_connect.php');
		$text = $db->real_escape_string($_POST['text']);
		$query = "SELECT * FROM stationary WHERE title LIKE '%{$text}%'";
		$result = $db->query($query);
		if(!$result){
			$data->error = "Could not query :" .$db->error;
		} else {
			while($row = $result->fetch_assoc()){
				$data->results[] = array(
					'id'    =>$row['id'],
					'title' =>$row['title']
				);
			}
			$data->success = true;
		}
	}

	header("Content-Type: application.json; charset=UTF-8");
	echo json_encode($data);
?>