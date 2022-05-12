<!-- END CHANGEABLE CONTENT. -->


	<hr>
	<h5>
	<?php
    date_default_timezone_set('America/Chicago');
	print date ( 'g:i a l F j' );
	?> 
	</h5>

	<h5>Note: this is for a class project for DMD 256 @ CLC </h5>
</body>
</html>

<?php
ob_end_flush();
?>