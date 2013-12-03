<?php
	$conn=mysqli_connect("mysql.cs.iastate.edu","u31904","QWGCG6sfQ","db31904"); /*or die("Error " , mysqli_error($link));*/
	
	$query="update User set FName='".$_POST['FName']."', LName='".$_POST['LName']."', Email='".$_POST['NewEmail']."', Phone='".$_POST['Phone']."' where Email='".$_POST['OldEmail']."'";
	
	$result=mysqli_query($conn,$query);
	
	mysqli_close($conn);
		/*echo("Hello");*/
?>