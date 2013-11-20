<!DOCTYPE html>

<?PHP
	session_start();
	if (($_SESSION['login'] == '0') || !(isset($_SESSION['login']) && $_SESSION['login'] != '')) {
		echo "<script>window.top.location='index.php'</script>";
	}
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
<script src="myaccount_files/sellerfunctions.js" charset="UTF-8"></script>
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

	<h1>My Account</h1><br>
	<div class="col-md-10"  id="posthere">
	<script type="text/javascript">
		<!--$(".content").append(printInfo("Passini, Bryan", "bpassini@iastate.edu", "(312)810-1031", "10/9/2013", "5", "10", "4.5"));-->
		//alert(getUser("bpassini@iastate.edu"));
		var email = "<?php echo $_SESSION['Email']; ?>";
		$("#posthere").append(getUser(email));
		//$("#posthere").append("<a href='newItem.php'><button type='button' class='btn btn-default btn-default'>Add Item</button></a>");
		$("#posthere").append(getBooks(email));
	</script>
	</div>
</div>
  <div class="footer">
    <!-- end .footer --></div>
  <!-- end .container -->
</body>
</html>