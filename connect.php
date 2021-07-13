  
<?php
	$firstName = $_POST['firstName'];
	$lastName = $_POST['lastName'];
	$email = $_POST['email'];
	$website = $_POST['website'];
	$comment = $_POST['comment'];
	$gender = $_POST['gender'];
	

	// Database connection
	$conn = new mysqli('localhost','root','','test');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into registration(firstName, lastName, email, website, comment, gender) values(?, ?, ?, ?, ?, ?)");
		$stmt->bind_param("ssssss", $firstName, $lastName, $email, $website, $comment, $gender);
		$execval = $stmt->execute();
		
		echo "<link href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC' crossorigin='anonymous'/>";

		echo "<div class='card text-center'>
		<div class='card-header'>
		  Hi " . $firstName . "
		</div>
		<div class='card-body'>
		  <h3 class='card-title'>Thank You</h3>
		  <p class='card-text'>Your valuable feedback submitted successfully...</p>
		  <a href='http://localhost/form' class='btn btn-primary'>Go somewhere</a>
		</div>
		
	  </div>";
		$stmt->close();
		$conn->close();
	}
?>