<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>step 6: enter data into table MyProducts</title>
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
$stmt = $conn->prepare("INSERT INTO MyProducts (prod_isbn, prodname, productdesc, product_price, digital, physical) VALUES (?, ?, ?, ?, ?, ?)");
$stmt->bind_param("issdii", $prod_isbn, $prodname, $productdesc, $product_price, $digital, $physical);

// set parameters and execute
$prod_isbn = 4572;
$prodname = "Who Move My Cheese";
$productdesc = "A book about adapting to change";    
$product_price = 59.59;
$digital = 10;
$physical = 10;
$stmt->execute();

$prod_isbn = 4573;
$prodname = "Aftershock";
$productdesc = "An award winning book";
$product_price = 26.50;
$digital = 10;
$physical = 10;
$stmt->execute();

$prod_isbn = 4574;
$prodname = "America on Fire";
$productdesc = "Revisits the long history of Black Rebellion in America on Fire";
$product_price = 69.29;
$digital = 10;
$physical = 10;
$stmt->execute();

$prod_isbn = 4575;
$prodname = "Shine Bright";
$productdesc = "A pioneering culture critic blends singular reportage with personal testimony dcumenting the stories of Whitney Houston";
$product_price = 99.01;
$digital = 10;
$physical = 10;
$stmt->execute();
    
echo "New records created successfully";

$stmt->close();
$conn->close();
?>
</body>
</html>