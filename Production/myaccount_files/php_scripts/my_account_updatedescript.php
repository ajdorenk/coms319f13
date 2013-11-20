<?php
	$conn=mysqli_connect("mysql.cs.iastate.edu","u31904","QWGCG6sfQ","db31904"); /*or die("Error " , mysqli_error($link));*/
	
	$query="update Item set Description='".$_POST['Description']."' where ID=".$_POST['ID']."";
	
	$result=mysqli_query($conn,$query);
	
	mysqli_close($conn);
		/*echo("Hello");*/
?>