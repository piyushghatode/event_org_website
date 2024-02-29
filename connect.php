<?php
	$name = $_POST['name'];
	$email = $_POST['email'];
	$message = $_POST['message'];
	$number = $_POST['number'];

	// Database connection
	$conn = new mysqli('localhost','root','','test');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into registration(name, email, number, message) values(?, ?, ?, ?)");
		$stmt->bind_param("ssis", $name, $email, $number, $message);
		$execval = $stmt->execute();
		echo $execval;
		echo "Registration successfully...";
		$stmt->close();
		$conn->close();
	}
?>