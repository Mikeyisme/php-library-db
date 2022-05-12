<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>step 8: show customers</title>
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

$sql = "SELECT cust_id, firstname, lastname, email FROM MyCustomers ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
	echo "<table width='400' border='1' style='font-family: sans-serif;'><tbody><tr><td>ID</td><td>Name</td></tr>";
  
	while($row = $result->fetch_assoc()) {
    //echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
	  echo "<tr><td>" . $row["cust_id"] . "</td><td>" . $row["firstname"] . " " . $row["lastname"] .  "</td></tr>";
  	}
	
	echo "</tbody></table>";
} else {
  echo "0 results";
}
$conn->close();
?>
</body>
</html>