<?php
	$userName  =$_POST['userName'];
	$email = $_POST['email'];	
	$password = $_POST['password'];	
	$cPassword = $_POST['cPassword'];	
	//Database connect
	 $conn = new mysqli('localhost', 'root', '', 'testdb');

	 	//Check if All placeholders has data

	 //Selects the users table
	$query= mysqli_query($conn, "SELECT * FROM users WHERE email = '$email' ");
	// Check if an email already exixts
	if(mysqli_num_rows($query)>0){
		//Echos a message before redirecting to a page
		header("refresh:1;url=login.html"); 
		$content = file_get_contents('email.gif');
		header('Content-Type: image/gif');
		echo $content;
	}else{
		//If password is the same as confirm password then contiue
		if($password == $cPassword){
			$stmt = $conn -> prepare("INSERT INTO users(userName, email, password) VALUES(?,?,?)"); 
			$stmt->bind_param("sss", $userName, $email, $password);
			$stmt->execute();
			 //Shows an Image Warning then returns to homepage 
			header("refresh:1;url=login.html"); 
			$content = file_get_contents('enter.gif');
			header('Content-Type: image/gif');
			echo $content;

			$stmt->close();
			$conn->close();
		}else{
			if($conn -> connect_error){
				die('Failed to Connect: '.$conn -> connect_error);
	 		}else{
	 			//Password did not match
	 			header("refresh:1;url=login.html"); 
				$content = file_get_contents('password.gif');
				header('Content-Type: image/gif');
				echo $content;

	 		}

	 	}
	}
?>