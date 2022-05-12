<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>step 3: create table MyProducts</title>
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

// sql to create table
$sql = "CREATE TABLE MyProducts (
prod_id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
prod_isbn INT(13) NOT NULL,
prodname VARCHAR(30) NOT NULL,
productdesc VARCHAR(1000) NOT NULL,
product_price DECIMAL(9, 2) NOT NULL,
digital INT(5) NOT NULL,
physical INT(5) NOT NULL,
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
  echo "Table MyProducts created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

$conn->close();
?>
</body>
</html>