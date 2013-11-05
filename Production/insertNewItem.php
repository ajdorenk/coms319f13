<?php
	
	$title = $_POST["title"];
	$name = $_POST["name"];
	$author = $_POST["author"];
	$isbn = $_POST["isbn"];
	$price = $_POST["price"];
	$description = $_POST["description"];
	$link = $_POST["link"];
	$shape = $_POST["shape"];
	$email = $_POST["email"];
	$type = $_POST["book"];
	
	$conn=mysqli_connect("mysql.cs.iastate.edu","u31904","QWGCG6sfQ","db31904"); 
	
	$item_query = "INSERT INTO Item VALUES ('".$email."', '".$price."', '".$shape."', '".$description."', '".$link."', '0')"
	
	if(type == "book") {
		$book_query = "INSERT INTO Book VALUES ('".$isbn."', '".$author."', '".$title."')";
		mysqli_query($conn, $book_query);
	}

	mysqli_query($conn, $item_query);
	
	mysqli_close($conn);

?>