<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>step 8: show products</title>
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

$sql = "SELECT prod_id, prodname, product_price, matte, glossy FROM MyProducts ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
	echo "<table width='400' border='1' style='font-family: sans-serif;'><tbody><tr><td>Prod ID</td><td>Name </td><td>Price</td><td>matte</td><td>glossy</td></tr>";
  
	while($row = $result->fetch_assoc()) {
    //echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
	  echo "
	  <tr>
	  <td>" . $row["prod_id"] . "</td>
	  <td>" . $row["prodname"] . "</td>
	  <td>" . $row["product_price"] . "</td>";
		
		if($row["matte"] <= 0) {
			echo "<td> out of stock </td>";
		} 
		else {
			echo "<td>" . $row["matte"]. "</td>";
		}

		if($row["glossy"] <= 0) {
			echo "<td> out of stock </td></tr>";
		} 
		else {	
		  echo "<td>" . $row["glossy"] . "</td></tr>";
		}
	}
	echo "</tbody></table>";
} else {
  echo "0 results";
}
$conn->close();
?>
</body>
</html>
