<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>step 7: enter data into table MyTransactions</title>
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
$stmt = $conn->prepare("INSERT INTO myTransactions( cust_id, prod_id, trans_unit, subtotal, shipping, trans_total)  VALUES (?, ?, ?, ?, ?, ?)");
$stmt->bind_param("iiiddd", $cust_id, $prod_id, $trans_unit, $subtotal, $shipping, $trans_total);

// set parameters and execute

$cust_id = 3;
$prod_id = 2;
$trans_unit = 1;
$subtotal = 40;
$shipping = 15;
$trans_total = 55;
   
$stmt->execute();
    
echo "New records created successfully";

$stmt->close();
$conn->close();
?>
</body>
</html>