<?php
	$number = rand(1,5);
	// echo $number;
	switch ($number) {
		case 1:
			$quote = "This is 1";
			break;
		case 2:
			$quote = "This is 2";
			break;
		case 3:
			$quote = "This is 3";
			break;
		case 4:
			$quote = "This is 4";
			break;
		case 5:
			$quote = "This is 5";
			break;
	}
	echo $quote;
?>