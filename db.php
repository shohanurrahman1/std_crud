<?php  
	$db = mysqli_connect("localhost", "root", "", "std");

	if ($db) {
		// echo"Database Connected Successfully";
	}
	else {
		die("Mysql Connection Failed!" . mysqli_error($db));
	}
?>