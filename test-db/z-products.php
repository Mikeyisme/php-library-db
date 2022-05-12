<?php
// Set the page title and include the header file:
define('TITLE', 'Educational Books || Products');
include('templates/header.php');

print "<h2>Products</h2>";

// Connect to db
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mydb";

echo "<link rel='stylesheet' type='text/css' href='z-style.css'>";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Query db
$sql = "SELECT prod_id, prodname, productdesc, prod_isbn, product_price, digital, physical FROM myproducts";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  echo "<table cellspacing='7'><tbody><form action='z-cart.php' method='post'><tr><td valign='top' class='subheader'> <strong>Product</strong> </td><td valign='top' class='subheader'> <strong>Description</strong> </td><td valign='top' class='subheader'> <strong>ISBN</strong> </td><td valign='top' class='subheader'> <strong>Price</strong> </td><td valign='top' colspan='2' class='subheader'> <strong>Book Type</strong> </td></tr>";

  // output data of each row
  while ($row = $result->fetch_assoc()) {
    //echo "<input type='hidden' name='chosen_" . $row[ "prod_id" ] . "' id='chosen_" . $row[ "prod_id" ] . "' />";

    echo "<tr><td valign='top' width='15%'>" . $row["prodname"] . "</td><td valign='top'>" . $row["productdesc"] . "</td><td valign='top' width='11%'>" . $row["prod_isbn"] . "</td><td valign='top' width='9%'>" . $row["product_price"] . "</td>";

    if ($row["digital"] <= 0) {
      echo "<td valign='top' width='10%'> out of stock </td>";
    } else {
      echo "<td valign='top' width='10%'><input type='radio' name='option" . $row["prod_id"] . "' value='digital" . $row["prod_id"] . "'> <span class='finish'>digital</span> </td>";
    }

    if ($row["physical"] <= 0) {
      echo "<td valign='top' width='12%'> out of stock </td>";
    } else {
      echo "<td valign='top' width='12%'><input type='radio' name='option" . $row["prod_id"] . "' value='physical" . $row["prod_id"] . "'> <span class='finish'>physical</span> </td>";
    }

    //echo "<td valign='top' width='9%'><input type='button' name='" . $row[ "prod_id" ] . "' value='Select'  onClick='putValue(\'chosen_" . $row[ "prod_id" ] . "\',\'" . $row[ "prodname" ] . "\');' /></td></tr>";

    //echo "<td valign='top' width='9%'><input type='button' name='pick' value='Select'  onClick='putValue(\'chosen_4\', \'rabbit\');'></td></tr>";
  }

  echo "<tr><td colspan='6' align='right'><input type='submit' name='submit' value='Add to Cart' /></td></tr></form></tbody></table>";
} else {
  echo "0 results";
}
$conn->close();

include('templates/footer.php'); // Need the footer.
?>