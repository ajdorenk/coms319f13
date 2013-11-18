<?php
	
	$name = $_POST["name"];
	$price = $_POST["price"];
	$description = $_POST["description"];
	$link = $_POST["link"];
	$shape = $_POST["shape"];
	
	$email = "me@iastate.edu";
	
	$conn=mysqli_connect("mysql.cs.iastate.edu","u31904","QWGCG6sfQ","db31904"); 
	
	$item_query = "INSERT INTO Item VALUES ('".$email."', '".$price."', '".$shape."', '".$description."', '".$link."', '0')";

	mysqli_query($conn, $item_query);
	
	mysqli_close($conn);

?>