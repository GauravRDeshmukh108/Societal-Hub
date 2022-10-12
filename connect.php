<?php
	$firstName = $_POST['firstName'];
	$lastName = $_POST['lastName'];
	$password = $_POST['password'];
	$username = $_POST['username'];
	$verifypassword = $_POST['verifypassword'];
	$email = $_POST['email'];

	//Database Connection
	$conn = new mysqli('localhost','root','','test');
	if($conn->connect_error){
		die('Connection Failed : '.$conn->connect_error);
	}else{
		$stmt = $conn->prepare("insert into registration(firstName, lastName, password, username, verifypassword, email)
			values(?,?,?,?,?,?)");
		$stmt->bind_param("ssssss",$firstName, $lastName, $password, $username, $verifypassword, $email);
		$stmt->execute();
		echo "Registration Successfull....";
		$stmt->close();
		$conn->close();
	}
?>