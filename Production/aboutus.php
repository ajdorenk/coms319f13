<?php
session_start();
?>
<script type="text/javascript" src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
 
<html>
<head>
<meta charset="UTF-8">
<title>About Us</title>
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
    <a class="navbar-brand" href="index.php"><strong>TextbookTrader</strong></a>
  </div>

  <!-- Collect the nav links, forms, and other content for toggling -->
  <div class="collapse navbar-collapse navbar-ex1-collapse">
    <ul class="nav navbar-nav">
      <!-- <li><a href="index.php">Home</a></li> -->
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
    <h2>About the Site</h2>
    <p>TextbookTrader is Iowa State's first and only dedicated site for buying and selling school supplies. 
    Created in Fall 2013, TextbookTrader was born out of a vision of making it easier for students to buy and sell their textbooks each semester.
    Buying from the Iowa State Bookstore costs you more than it should, while buying online leaves uncertaintly as to the quality of your purchase.
    With TextbookTrader, you can now buy and sell locally, always at a fair price and consistantly sure of the quality of what you are purchasing. </p>
    <h2>About the Team</h2>
    <p>TextbookTrader was created by the following students:</p>
    <h4>Austin Dorenkamp</h4>
    <p>Austin is a junior in Computer Engineering at Iowa State University and is concurrently pursuing a minor in Entrepreneurial Studies.</p>
    <h4>Bryan Passini</h4>
    <p>Bryan is a junior in Software Engineering at Iowa State University and doesn't do much.</p>
    <h4>Erich Kuerschner</h4>
    <p>Erich is a junior in Computer Engineering at Iowa State University and enjoys taking long walks on the beach.</p>
    <h4>Taylor Greiner</h4>
    <p>Taylor is a junior in Software Engineering at Iowa State University and is currently the Vice President of the Sales Engineering Club.</p>
    <div class="image">
<!--       <img src="teampic.jpg" alt="Erich, Taylor, Bryan, Austin (Left to Right)" height="500">
 -->    
      <img src="teampic.jpg" alt="Erich, Taylor, Bryan, Austin (Left to Right)" height="500">

    </div>
    <p>Left to Right: Erich, Taylor, Bryan, Austin</p>
    <!-- end .content --></div>
  <!-- end .container --></div>
</body>
</html>
