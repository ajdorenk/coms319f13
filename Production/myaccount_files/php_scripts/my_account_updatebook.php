<?php
	$conn=mysqli_connect("mysql.cs.iastate.edu","u31904","QWGCG6sfQ","db31904"); /*or die("Error " , mysqli_error($link));*/
	
	$query="update Book set Title='".$_POST['Title']."', Author='".$_POST['Author']."', ISBN='".$_POST['ISBN']."' where BookID=".$_POST['ID']."";
	
	$result=mysqli_query($conn,$query);
	
	$q2="update Item set ItemShape='".$_POST['Condition']."', Price=".$_POST['Price'].", Sold=".$_POST['Sold']." where ID=".$_POST['ID']."";
	
	$r2=mysqli_query($conn,$q2);
	
	mysqli_close($conn);
		/*echo("Hello");*/
?>