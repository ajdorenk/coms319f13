<?php
	$fName = $_POST["fName"];
	$lName = $_POST["lName"];
	$email = $_POST["email"];
	$phone = $_POST["phone"];
	$password = $_POST["password"];
	
	$date_created = getDate();

	$conn=mysqli_connect("mysql.cs.iastate.edu","u31904","QWGCG6sfQ","db31904"); 
	
	$query="INSERT INTO User (FName, LName, Email, Phone, Password) VALUES ('".$fName."', '".$lName."', '".$email."', '".$phone."', '".$password."')";
	
	mysqli_query($conn,$query);
	
	mysqli_close($conn);

?>