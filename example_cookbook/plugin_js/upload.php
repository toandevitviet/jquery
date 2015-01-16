<?php
	if (isset($_FILES['image'])) {
		$response = array(
			"success" => false,
			"error" => ""
		);
		//GET SELECTION DATA
		$selectionWidth = (isset($_POST['selection-width'])) ? $_POST['selection-width'] : 0;
		$selectionHeight = (isset($_POST['selection-height'])) ? $_POST['selection-height'] : 0;
		$selectionTop = (isset($_POST['selection-top'])) ? $_POST['selection-top'] : 0;
		$selectionLeft = (isset($_POST['selection-left'])) ? $_POST['selection-left'] : 0;
		//GET IMAGE DATA
		$fileName = $_FILES['image']['name'];
		$ext = pathinfo($fileName, PATHINFO_EXTENSION);
		if ($selectionWidth > 800 || $selectionHeight > 600) {
			$response["error"] = "Image cannot be larger than 800 x	600";
		} else if (!in_array($ext, array("png", "jpg"))) {
			$response["error"] = "Invalid file type";
		} else {
			if ($ext == "png") {
				$source = imagecreatefrompng($_FILES['image']['tmp_name']);
			} else {
				$source = imagecreatefromjpeg($_FILES['image']['tmp_name']);
			} $dest = imagecreatetruecolor($selectionWidth,	$selectionHeight);

			imagecopyresampled($dest, $source, 0, 0, $selectionLeft, $selectionTop, $selectionWidth, $selectionHeight, $selectionWidth,	$selectionHeight);
			$path = "/uploads/";
			if (!imagejpeg($dest, getcwd() . $path . $fileName, 100))
			{
				$response["error"] = "Could not save uploaded file";
			} else {
				$response["success"] = true;
			}
		}
		header("Content-Type: application/json; charset=UTF-8");
		echo json_encode($response);
	}
?>