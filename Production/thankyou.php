<!DOCTYPE html>

<?PHP
	if(empty($_GET['itemkey'])) {
		echo "<script>window.top.location='ratingspage.php'</script>";
	}

	$conn=mysqli_connect("mysql.cs.iastate.edu","u31904","QWGCG6sfQ","db31904"); /*or die("Error " , mysqli_error($link));*/
	
	$query3="select * from Rating where ItemID='".$_GET['itemkey']."'";
	
	$result3=mysqli_query($conn,$query3);
	
	$friend = 3;
	if(!empty($_GET['friendly']))
		$friend = $_GET['friendly'];
		
	$available = 3;
	if(!empty($_GET['available']))
		$available = $_GET['available'];
	
	$price = 3;
	if(!empty($_GET['price']))
		$price = $_GET['price'];
		
	$time = 3;
	if(!empty($_GET['time']))
		$time = $_GET['time'];
		
	$comments = 3;
	if(!empty($_GET['comments']))
		$comments = $_GET['comments'];
	
	if(empty($result3)) {
	
		$query="select UEmail from Item where ID='".$_GET['itemkey']."'";
		
		$result=mysqli_query($conn,$query);
		
		$row = mysqli_fetch_row($result);
		$email = $row[0];
		
		$query2="insert into Rating(UEmail, Friendly, Availability, Price, Time, Description, ItemID) values('".$email."','".$friend."', '".$available."', '".$price."','".$time."', '".$comments."','".$_GET['itemkey']."')";
		
		$result2=mysqli_query($conn,$query2);
	}
	
	mysqli_close($conn);
?>
<html >
<head>
<script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="../bootstrap/bootstrap.min.js"></script>
<script src="../bootstrap/carousel.js"></script>
<link rel="stylesheet" href="../css/bootstrap.min.css">
<link rel="stylesheet" href="../css/carousel.css">
<link rel="stylesheet" href="myaccount_files/myaccount.css">
<!-- <script src="myaccount_files/jquery_ui/jquery-1.9.1.js"></script> -->
<link rel="stylesheet" href="myaccount_files/jquery_ui/jquery-ui.css">
<script src="myaccount_files/jquery_ui/jquery-ui.js"></script>

<style type="text/css">
      body {
    padding-top: 70px;
        padding-bottom: 40px;
      }

      @media (max-width: 980px) {
        /* Enable use of floated navbar text */
        .navbar-text.pull-right {
          float: none;
          padding-left: 5px;
          padding-right: 5px;
        }
      }
    .container {
    max-width : 100%;
    }
    
    .jumbotron {
    background-color: "blue";
    }
</style>
</head>

<body id='body'>

<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
  <!-- Brand and toggle get grouped for better mobile display -->
  <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand" href="index.php">TextbookTrader</a>
  </div>

  <!-- Collect the nav links, forms, and other content for toggling -->
  </nav>

<script type="text/JavaScript"> /*
  $('#logout').click(function() {
    var str_json;
    // alert("functioncalled")
    $.ajax({
        data: str_json,
        url: 'logout.php',
        method: 'POST', // or GET
        success: function(data) {
          // alert(data);
          // alert("logged out");
          // window.top.location='results.php';
        }
    });
  });*/
</script>

<div class="container">

  <div class="row">
  <div class="col-md-2">
    <div class="well sidebar-nav">
      <ul class="nav nav-list">
        <li class="nav-header">Navigation</li>
        <li class="active"><a href="results.php">Buy</a></li>
<?php
/*
	if(isset($_SESSION['login']) && $_SESSION['login'] == "1") {
        echo "<li><a href='myaccount.php'>Sell</a></li>";
	}*/
?>
    <li><a href="aboutus.php">About Us</a></li>
    <li><a href="contactus.php">Contact Us</a></li>
		</ul>
	</div>
	</div>

	<h1>Rating</h1><br>
	<div class="col-md-10"  id="posthere">
		<h1>Thank you!</h1>
		<h3>We appreciate you taking the time to rate a seller, this will help other users find good sellers and avoid bad ones!</h3>
	</div>
</div>
  <div class="footer">
    <!-- end .footer --></div>
  <!-- end .container -->
</body>
</html>