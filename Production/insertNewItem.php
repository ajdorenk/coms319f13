<?php
	$title = $_POST["title"];
	$name = $_POST["name"];
	$author = $_POST["author"];
	$isbn = $_POST["isbn"];
	$price = $_POST["price"];
	$description = $_POST["description"];
	$link = $_POST["link"];
	$shape = $_POST["shape"];
	$negotiate = $_POST["negotiate"];
	$type = $_POST["book"];
	//$email = "me@iastate.edu";
	$email = $_POST['Email'];
	
	$conn=mysqli_connect("mysql.cs.iastate.edu","u31904","QWGCG6sfQ","db31904"); 
	
	$item_query = "INSERT INTO Item (UEmail, Price, ItemShape, Description, ImageLink, Sold, Negotiate) VALUES ('".$email."', '".$price."', '".$shape."', '".$description."', '".$link."', '0', '".$negotiate."')";
	mysqli_query($conn, $item_query);
	
	
	if($type == "book") {
		$getID = "SELECT MAX(ID) FROM Item";
		$result = mysqli_query($conn, $getID);
		$row = mysqli_fetch_row($result);
		$ID = $row[0];
		//get id of recently added item
		$book_query = "INSERT INTO Book VALUES ('".$ID."', '".$isbn."', '".$author."', '".$title."')";
		mysqli_query($conn, $book_query);
	}

	mysqli_close($conn);

?>