<?php
	//PHP $_POST is a PHP super global variable which is used to collect form data after submitting an HTML form with method="post"
	$email =$_POST['email'];	
	$password =$_POST['password'];


	//Database connect
	$conn = new mysqli('localhost', 'root', '', 'testdb');
	if($conn -> connect_error){
	 	die('Failed to Connect: '.$conn -> connect_error);
	 }else{
	 	//Get 
	 	$stmt = $conn -> prepare("select * from users where email = ?");
	 	$stmt -> bind_param("s", $email);
	 	$stmt -> execute();
	 	$stmt_result = $stmt -> get_result();
	 	if ($stmt_result -> num_rows > 0){
	 		$data = $stmt_result -> fetch_assoc();
	 		if($data['password']== $password){ 
	 			//Echos Login Successful using a GIF
				$content = file_get_contents('enter.gif');
				header('Content-Type: image/gif');
				echo $content;

	 		}else{
	 			//Echos Invalid message using a GIF
	 			header("refresh:1;url=login.html"); 
				$content = file_get_contents('invalid.gif');
				header('Content-Type: image/gif');
				echo $content;
	 		}
		} else{
				header("refresh:1;url=login.html"); 
				$content = file_get_contents('invalid.gif');
				header('Content-Type: image/gif');
				echo $content;

	 	}
	 }	
?>