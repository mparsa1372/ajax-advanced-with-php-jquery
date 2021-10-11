<?php

if(!empty($_FILES['file'])){
	
	$file = $_FILES['file'];
	
	if($file['error'])
		die('{"message" : "Unknown Error" , "status" : "0"}');
	
	$type = $file['type'];
	
	$valid_ext = ['video/x-matroska' , 'video/mp4'];//['image/png' , 'image/jpeg' , 'image/jpg' , 'image/gif'];
	
	if(!in_array($type , $valid_ext))
		die('{"message" : "You can only Upload {mp4} and {mkv} files !" , "status" : "0"}');
	
	$name = $file['name'];
	
	$name = explode('.' , $name);
	
	$ext = end($name);
	
	if(2<count($name)){
		$name = array_slice($name , 0 , count($name) - 1);
		$name = implode('.' , $name);
	}else
		$name = $name[0];
	
	$timestamp = time();
	
	$name = "{$name}-{$timestamp}.{$ext}";
	$tmp_name = $file['tmp_name'];
	
	$finall_path = "files/{$name}";
	
	
		move_uploaded_file($tmp_name , $finall_path);
		echo "{\"message\" : \"Your file Uploaded Successfully to {$finall_path}\" ,\"path\":\"{$finall_path}\" : , \"status\" : \"1\"}";
		
	
	
	
}



?>