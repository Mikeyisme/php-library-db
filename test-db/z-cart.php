<?php
// Do   stuff
session_start();
// Set the page title and include the header file:
define( 'TITLE', 'Educational Books || Your Cart' );
include( 'templates/header.php' );

// Print a greeting:
print '<h2>Shopping Cart</h2>';

// Connect to db
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mydb";

// Create connection
$conn = new mysqli( $servername, $username, $password, $dbname );

// Check connection
if ( $conn->connect_error ) {
    die( "Connection failed: " . $conn->connect_error );
}

// Query db
$sql = "SELECT prod_id, prodname, productdesc, prod_isbn, product_price, digital, physical FROM myproducts";
$result = $conn->query( $sql );

$has_prod=0;

if ( !isset($_SESSION['checkout']) && $has_prod < 1 ) {
    if ( $_SERVER['REQUEST_METHOD'] == 'POST' &&  isset( $_POST['submit'] ) ) {        
        if ( $result->num_rows > 0 ) {
            print '<p><strong>You have chosen: </strong><br />';
            echo "<table width='560'><tbody><form action='z-cart.php' method='post'><tr class='subheader'><td valign='top' class='subheader'> <strong>Product</strong> </td><td valign='top' class='subheader'> <strong>Paper Finish</strong> </td><td valign='top' class='subheader'> <strong>ISBN</strong> </td><td valign='top' class='subheader'> <strong>Price</strong> </td></tr>";

            // output data of each row
            while ( $row = $result->fetch_assoc() ) {
                $my_val = strval($row[ 'prod_id' ]); 
                $my_id = "option" . $my_val;

                if ( isset($_POST[$my_id]) ) {
                    $my_prod = $_POST[$my_id];

                    if ( filter_var( $my_prod, FILTER_SANITIZE_NUMBER_INT ) == $row[ "prod_id" ] ) {
                        $my_prod = preg_replace('/[0-9]+/', '', $my_prod );

                        echo "<tr><td valign='top'>" . $row[ "prodname" ] . "</td><td valign='top'>" . $my_prod . "</td><td valign='top'>" . $row[ "prod_isbn" ] . "</td><td valign='top'>" . $row[ "product_price" ] . "</td></tr>";                            

                        $_SESSION[ $my_id ] = $_POST[ $my_id ];
                    }
                }
            }
            
            echo "<tr><td colspan='4'><input type='submit' name='checkout' value='Check Out' method='post' action='z-cart.php' /></td></tr></form></tbody></table>";
        } else {
            echo "0 results";
        } 
        $_SESSION[ "checkout" ] = "checkout";
    } else {
        echo "<p><strong>Select products to add to cart, please.</strong></p>";
    }
    
    $conn->close();
} else {
    while ( $row = $result->fetch_assoc() ) {
        $my_val = strval($row[ 'prod_id' ]); 
        $my_id = "option" . $my_val;

        if ( isset( $_SESSION[ $my_id ] ) && isset( $_POST[ 'checkout' ] ) ) {            
            $my_prod = $_SESSION[ $my_id ];
            $my_prod = preg_replace( '/[0-9]+/', '', $my_prod );
            
            if( $my_prod == "digital" ) {
                $my_count = $row[ "digital" ] - 1;
                $sql2 = "UPDATE myproducts SET digital=" . $my_count . " WHERE prod_id=" . $row[ 'prod_id' ];
            } 
            if( $my_prod == "physical" ) {
                $my_count = $row[ "physical" ] - 1;
                $sql2 = "UPDATE myproducts SET physical=" . $my_count . " WHERE prod_id=" . $row[ 'prod_id' ];
            } 
            /*if( $my_prod == "glossy" ) {
                $my_count = $row[ "glossy" ] - 1;
                $sql2 = "UPDATE myproducts SET glossy=" . $my_count . " WHERE prod_id=" . $row[ 'prod_id' ];
            }*/
            $result2 = $conn->query( $sql2 );
            $has_prod = $has_prod+1;
        }
    }
    if ( $has_prod>0 ) {
        echo "<p>Orders submitted successfully.</p>";
    } else {
        echo "<p><strong>Select some products to add to cart, please.</strong></p>";
    }
    
    $conn->close();
    
    // Delete the session variable:
    unset( $_SESSION );
    // Reset the session array:
    $_SESSION = array();
    session_destroy();
}

include('templates/footer.php'); // Need the footer.
?>