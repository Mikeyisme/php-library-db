<?php
ob_start();
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title> 
<?php // Print the page title.
if (defined ('TITLE')) { // Is the title defined?
	print TITLE;
}
else { // The title is not defined.
	print 'Poster Shop';
}
?>
</title>
<link href="z-style.css" rel="stylesheet" type="text/css">

<!-- This can be in .css file -->
<style type="text/css">

</style>

<script language="JavaScript" type="text/javascript">
function putValue (hiddenId, my_info) {
	element = document.getElementById(hiddenId);
	element.value = my_info;
}
</script>
</head>
<body>
<h1>Bobby's Book store</h1>

<p><a href="z-products.php">Products</a> <a href="z-cart.php">Shopping Cart</a> <a href="#">Admin</a></p>
<!-- BEGIN CHANGEABLE CONTENT. -->