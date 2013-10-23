<?php
	$conn=mysqli_connect("mysql.cs.iastate.edu","u31904","QWGCG6sfQ","db31904"); // or die("Error " . mysqli_error($link));
	
	$query="Select * from Item i, Book b where i.ID=b.BookID and i.UEmail='" .$_POST["Email"]. "'";
	
	$result=mysqli_query($conn,$query);
	
	while($row=mysqli_fetch_array($result))
		$output[]=$row;
	
	echo(json_encode($output));
	
	mysqli_close($conn);
?>