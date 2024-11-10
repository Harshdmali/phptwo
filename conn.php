<?php
$name = $_POST['name'];
$email = $_POST['email'];
$subject = $_POST['subject'];
$message = $_POST['message'];

//connection of database 

$conn = new mysqli( 'localhost','root','', 'phptwo');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into abcd(name, email, subject, message) values(?, ?, ?, ?)");
		$stmt->bind_param("ssss", $name, $email, $subject, $message);
		$execval = $stmt->execute();
		echo $execval;
		echo "Message Sent Successfully...";
		$stmt->close();
		$conn->close();
	}

?>