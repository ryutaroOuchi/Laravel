<?php
	header('Content-type:text/javascript;charset=utf-8');
	echo json_encode($data,JSON_PRETTY_PRINT);
	//echo json_decode(preg_replace('/[\x00-\x1F\x80-\xFF]/', '', $data),true);  
?>
