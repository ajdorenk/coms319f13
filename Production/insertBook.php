<?php
	
	$title = $_POST["title"];
	$author = $_POST["author"];
	$isbn = $_POST["isbn"];
	
	$conn=mysqli_connect("mysql.cs.iastate.edu","u31904","QWGCG6sfQ","db31904"); 
	
	$book_query = "INSERT INTO Book VALUES ('".$isbn."', '".$author."', '".$title."')";
	
	mysqli_query($conn, $book_query);
	
	mysqli_close($conn);

?>