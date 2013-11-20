<?php
session_start();

$uname = "";
$pword = "";
$errorMessage = "";

//==========================================
//	ESCAPE DANGEROUS SQL CHARACTERS
//==========================================
function quote_smart($value, $handle) {

   if (get_magic_quotes_gpc()) {
       $value = stripslashes($value);
   }

   if (!is_numeric($value)) {
       $value = "'" . mysql_real_escape_string($value, $handle) . "'";
   }
   return $value;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
	$uname = $_POST['username'];
	$pword = $_POST['password'];

	//--------
	// session_unset();
	//--------

	// $errorMessage += "<Start msg> ";
	// $errorMessage += 'username: ' . $uname . ' password: ' . $pword;

	$uname = htmlspecialchars($uname);
	$pword = htmlspecialchars($pword);

	//==========================================
	//	CONNECT TO THE DATABASE
	//==========================================
	// $dbusername = "u30909";
	// $dbpassword = "gJnw6bKU4";
	// $dbhostname = "mysql.cs.iastate.edu";
	// $dbdatabase = "db30909";
	$dbusername = "u31904";
	$dbpassword = "QWGCG6sfQ";
  	$dbhostname = "mysql.cs.iastate.edu";
  	$dbdatabase = "db31904";

	// $dbhandle = mysqli_connect($dbhostname, $dbusername, $dbpassword)
	$dbhandle = mysql_connect($dbhostname, $dbusername, $dbpassword)
		or die("Unable to connect to MySQL");

	// $db_found = mysqli_select_db($dbhandle, $dbdatabase)
	$db_found = mysql_select_db($dbdatabase, $dbhandle)
		or die("Could not select" . $dbdatabase);

	if ($db_found) {

		$uname = quote_smart($uname, $dbhandle);
		$pword = quote_smart($pword, $dbhandle);

		// $SQL = "SELECT * FROM login WHERE L1 = $uname AND L2 = md5($pword)";
		$SQL = "SELECT * FROM User WHERE Email = $uname AND Password = $pword";
		$result = mysql_query($SQL);
		$num_rows = mysql_num_rows($result);
		$resultArr = mysql_fetch_array($result);

	//====================================================
	//	CHECK TO SEE IF THE $result VARIABLE IS TRUE
	//====================================================

		// print $uname . " " . $pword;

		if ($result) {
			if ($num_rows > 0) {
				// session_start();
				$_SESSION['login'] = "1";
				$_SESSION['Email'] = $resultArr['Email'];
				$_SESSION['FName'] = $resultArr['FName'];
				$_SESSION['LName'] = $resultArr['LName'];
				// header ("Location: homepage.php");
				// echo "<script>window.top.location='homepage.php'</script>";
				// print "User recognized: ".$resultArr['Email'];
			}
			else {
				print "User not recognized";
			}	
		}
		else {
			print'username: ' . $uname . ' password: ' . $pword;

		}

	mysql_close($dbhandle);

	}

	else {
		print "NOdb";
	}

}

?>

<html>
<head>
<meta charset="UTF-8">
<title>Homepage</title>
<!-- <link href="style.css" rel="stylesheet" type="text/css"> -->
<link href="homepage_style.css" rel="stylesheet" type="text/css">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
<script src="../bootstrap/bootstrap.min.js"></script>
<script src="../bootstrap/carousel.js"></script>
<link rel="stylesheet" href="../css/bootstrap.min.css">
<link rel="stylesheet" href="../css/carousel.css">
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

<body>

<script type="text/JavaScript">
	function tabFunction(type){
		var tab;
		if(type == "buyer")
		{
			tab = document.getElementById("seller_tab");
			tab.style.display = "none";
			document.getElementById("buyer_tab").style.display="inline";
		}
		else if(type == "seller")
		{
			tab =document.getElementById("buyer_tab");
			tab.style.display = "none";
			document.getElementById("seller_tab").style.display="inline";
		}
	};
</script>

<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
  <!-- Brand and toggle get grouped for better mobile display -->
  <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand" href="">TextbookTrader</a>
  </div>

  <!-- Collect the nav links, forms, and other content for toggling -->
  <div class="collapse navbar-collapse navbar-ex1-collapse">
    <ul class="nav navbar-nav">
      <li><a href="index.php">Home</a></li>
      <li><a href="#">About Us</a></li>
    <li><a href="#">Contact Us</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="#">Log In</a></li>
    </ul>
  </div><!-- /.navbar-collapse -->
</nav>

<div class="container">

  <div class="row">
  <div class="col-md-2">
    <div class="well sidebar-nav">
      <ul class="nav nav-list">
        <li class="nav-header">Navigation</li>
        <li class="active"><a href="results.php">Buy</a></li>
<?php
	if(isset($_SESSION['login']) && $_SESSION['login'] == "1") {
        echo "<li><a href='myaccount.php'>Sell</a></li>";
	}
?>
        <li><a href="#"></a></li>
      </ul>
    </div>
  </div>
  <div class="col-md-10">

 <?php  //<div class="header"><a href="#"><img src="" alt="Insert Logo Here" name="Insert_logo" width="20%" height="90" id="Insert_logo" style="background-color: #8090AB; display:block;" /></a> 
//     <!-- end .header --></div>
//   <div class="sidebar1">
//     <ul class="nav">
//       <li><a href="#">Home</a></li>
//       <li><a href="results.php">Search</a></li>
 ?><?php //if(isset($_SESSION['login']) && $_SESSION['login'] == "1") {
// 		echo "<li><a href='myaccount.php'>Seller Page</a></li>";
// 	}
?><?php
    //   <li><a href="#">About Us</a></li>
    // </ul>	
	// </div>
  ?>

  <div class="content">
		<div class="tabs">
			<button id="buyer" onclick="tabFunction(this.id)">Quick Search</button>
			<button id="seller" onclick="tabFunction(this.id)">Seller Login</button>
		</div>
		
		<div id="buyer_tab">
			<h2>Quick Search</h2>
			<br>
			<div class="form">
				<form>
					<input type="text">
					<input type="submit" value="Search">
				</form>
			</div>
		</div>
		
		<div id="seller_tab" style="display: none">
			<h2>Login</h2>
			<br>
			<table id="form_table" class="form">

			<form name="form1" method='post' action="index.php">
				<tr>
					<td>Email:</td>
					<td><input id="username" type="text" name='username' width="250px"></td>
				</tr>
				<tr>
					<td>Password:</td>
					<td><input id="password" type="password" name='password' width="250px"></td>
					<td><a>Forgot password?</a></td>
				</tr>
				<tr>
					<td align="right"><button id="login" type="submit" name="Submit1" onclick="">Go!</button></td>
			</form>
					<form method="link" action="create_account.php">
					<td><button id="new_user" type="submit" onclick="">Create an account</button></td>
					</form>
				</tr>
			</table>
			<!--<div class="form">
				<Label>Username: </Label>
				<input id="username" type="text" width="250px">
			</div>
			<div class="form">
				<Label>Password: </Label>
				<input id="password" type="text" width="250px">
				<a>Forgot password?</a>
			</div>
			<br>
			<div class="buttons">
				<button id="login" type="submit" onclick="">Go!</button>
				<button id="new_user" type="submit" onclick="">Create an account</button>
			</div>-->
		</div> 
   <!-- end .content --></div>
  <div class="footer">
    <!-- end .footer --></div>
  <!-- end .container --></div>
</body>
</html>
