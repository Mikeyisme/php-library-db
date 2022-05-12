<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>step 4: create table MyTransactions</title>
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
$sql = "CREATE TABLE myTransactions (
trans_id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
cust_id INT(6) NOT NULL,
prod_id INT(6) NOT NULL,
trans_unit INT(6) NOT NULL,
subtotal DECIMAL(9, 2),
shipping DECIMAL(9, 2),
trans_total DECIMAL(9, 2),
trans_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP       
)";

if ($conn->query($sql) === TRUE) {
  echo "Table MyTransactions created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

$conn->close();
?>
</body>
</html>