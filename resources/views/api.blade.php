<?php 
	$url = 'http://133.242.232.21/index.php/testall?lat=35.677&lng=139.735&radius=200';
	$json = utf8_encode(file_get_contents($url));
	//$json = @readfile($url);
	//$data = json_decode($json);
	var_dump(json_decode($json));
	//echo json_last_error();
	//echo $data;
	//echo $json[0]['results'][0];
?>