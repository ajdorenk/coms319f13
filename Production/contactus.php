<?php
session_start();
?>
<script type="text/javascript" src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
 
<html>
<head>
<meta charset="UTF-8">
<title>Contact Us</title>
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
<script src="../bootstrap/bootstrap.min.js"></script>
<script src="../bootstrap/carousel.js"></script>
<link rel="stylesheet" href="../css/bootstrap.min.css">
<link rel="stylesheet" href="../css/carousel.css">
<!-- <link href="style.css" rel="stylesheet" type="text/css"> --><!--[if lte IE 7]>
<style>
.content { margin-right: -1px; } /* this 1px negative margin can be placed on any of the columns in this layout with the same corrective effect. */
ul.nav a { zoom: 1; }  /* the zoom property gives IE the hasLayout trigger it needs to correct extra whiltespace between the links */
</style>
<![endif]-->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<!-- <script language="JavaScript" type="text/javascript" src="resultsScript.js"></script> -->
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
    </ul>
    <ul class="nav navbar-nav navbar-right">
<?PHP
  if (($_SESSION['login'] == '0') || !(isset($_SESSION['login']) && $_SESSION['login'] != '')) {
    echo "<li><a href='loginpage.php'>Log In</a></li>";
    // echo "<script>window.top.location='index.php'</script>";
  }
  else {
    echo "<li><a href='results.php' id='logout'>Log Out</a></li>";
  }
?>
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
        <li><a href="aboutus.php">About Us</a></li>
        <li><a href="contactus.php">Contact Us</a></li>
      </ul>
    </div>
  </div>
  <div class="col-md-10">

  <div class="content">
    <h4>Contact Information</h4>
    <p>Pearson Hall</p>
    <p>Ames, IA 50011</p>
    <p>123-456-7890</p>
    <p>comsci@iastate.edu</p>
    <!-- end .content --></div>
  <!-- end .container --></div>
</body>
</html>
