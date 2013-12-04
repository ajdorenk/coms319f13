

<?PHP
/*
	session_start();
	if (($_SESSION['login'] == '0') || !(isset($_SESSION['login']) && $_SESSION['login'] != '')) {
		echo "<script>window.top.location='index.php'</script>";
	}
	*/
?>
<html >
<head>
<script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="../bootstrap/bootstrap.min.js"></script>
<script src="../bootstrap/carousel.js"></script>
<link rel="stylesheet" href="../css/bootstrap.min.css">
<!-- <script src="myaccount_files/jquery_ui/jquery-1.9.1.js"></script> -->
<link rel="stylesheet" href="myaccount_files/jquery_ui/jquery-ui.css">
<script src="myaccount_files/jquery_ui/jquery-ui.js"></script>
<!--<script src="ratingsfunctions.js"></script>-->

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
		<form  method='get'>
			Item Key: <input type='text' name='itemkey'><br><br>
			<table class='table table-bordered' >
				<thead>
					<tr>
						<th>Category</th>
						<th>Rating (1=Very Bad, 5=Very Good)</th>
					</tr>
				</thead>
				<tbody>
				<tr>
					<td width='30%'>
						How Friendly was the Seller?
					</td>
					<td id='friend' width='30%' style='vertical-align:middle' align='center'>
						<input type='radio' name='friendly' value='1'>
						<input type='radio' name='friendly' value='2'>
						<input type='radio' name='friendly' value='3'> 
						<input type='radio' name='friendly' value='4'> 
						<input type='radio' name='friendly' value='5'>
						<p>1.......3.......5</p>
					</td>
				</tr>
				<tr>
					<td width='30%'>
						How reasonable was the sellers price?
					</td>
					<td width='30%' style='vertical-align:middle' align='center'>
						<input type='radio' name='price' value='1'>
						<input type='radio' name='price' value='2'>
						<input type='radio' name='price' value='3'> 
						<input type='radio' name='price' value='4'> 
						<input type='radio' name='price' value='5'>
						<p>1.......3.......5</p>
					</td>
				</tr>
				<tr>
					<td width='30%'>
						How available was the seller?
					</td>
					<td width='30%' style='vertical-align:middle' align='center'>
						<input type='radio' name='available' value='1'>
						<input type='radio' name='available' value='2'>
						<input type='radio' name='available' value='3'> 
						<input type='radio' name='available' value='4'> 
						<input type='radio' name='available' value='5'>
						<p>1.......3.......5</p>
					</td>
				</tr>
				<tr>
					<td width='30%'>
						Was the seller on time?
					</td>
					<td width='30%' style='vertical-align:middle' align='center'>
						<input type='radio' name='time' value='1'>
						<input type='radio' name='time' value='2'>
						<input type='radio' name='time' value='3'> 
						<input type='radio' name='time' value='4'> 
						<input type='radio' name='time' value='5'>
						<p>1.......3.......5</p>
					</td>
				</tr>
				<tr>
					<td colspan='2' width='100%'>
						<p><strong>Comments: </strong></p>
						<textarea cols='150%' rows='5' name='comments'>
						</textarea>
					</td>
				</tr>
				</tbody>
			</table>
			<input type='submit' value='Submit' formaction='thankyou.php'>
		</form>
	</div>
</div>
  <div class="footer">
    <!-- end .footer --></div>
  <!-- end .container -->
</body>
</html>