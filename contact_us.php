<?php
	$name = $_POST['name'];
	$number = $_POST['number'];
	$email = $_POST['email'];
	$message = $_POST['message'];

	// Database connection
	$conn = new mysqli('localhost','root','','contact_us');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into contact_us(name, number, email, message) values(?, ?, ?, ?)");
		$stmt->bind_param("siss", $name, $number, $email, $message);
		$execval = $stmt->execute();
		echo $execval;
		echo "Submit successfully...";
		$stmt->close();
		$conn->close();
	}
?>




<!-- <?php
// if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//     $name = $_POST['name'];
//     $phone = $_POST['phone'];
//     $email = $_POST['email'];
//     $message = $_POST['message'];

//     // send email
//     $to = 'adityakld13@gmail.com';
//     $subject = 'New Contact Form Submission';
//     $body = "Name: $name\nPhone: $phonee\nEmail: $email\nMessage: $message";
//     mail($to, $subject, $body);

//     // redirect to thank you page
//     header('Location: thank_you.html');
//     exit;
// }
?> -->