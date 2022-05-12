<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>step 5: enter data into table MyCustomers</title>
</head>

<body>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "myDB";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// prepare and bind
$stmt = $conn->prepare("INSERT INTO MyCustomers (firstname, lastname, email) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $firstname, $lastname, $email);

// set parameters and execute
$firstname = "Billy";
$lastname = "Mane";
$email = "Billy@example.com";
$stmt->execute();

$firstname = "Bob";
$lastname = "Dickson";
$email = "Bob@example.com";
$stmt->execute();

$firstname = "Ashley";
$lastname = "Myers";
$email = "Ashley@example.com";
$stmt->execute();

$firstname = "Mikey";
$lastname = "Wilson";
$email = "";
$stmt->execute();

$firstname = "Robert";
$lastname = "Jones";
$email = "Roboert@example.com";
$stmt->execute();

$firstname = "Ben";
$lastname = "Simmions";
$email = "Bsimmions@example.com";
$stmt->execute();
	
	
echo "New records created successfully";

$stmt->close();
$conn->close();
?>
</body>
</html>