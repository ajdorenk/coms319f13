<html>
<head>
<meta charset="UTF-8">
<title>Create Account</title>
<link href="createAccount_style.css" rel="stylesheet" type="text/css">
<script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
<script src="../bootstrap/bootstrap.min.js"></script>
<script src="../bootstrap/carousel.js"></script>
<link rel="stylesheet" href="../css/bootstrap.min.css">
<link rel="stylesheet" href="../css/carousel.css">
<!-- <link href="style.css" rel="stylesheet" type="text/css">
<style>
.content { margin-right: -1px; } /* this 1px negative margin can be placed on any of the columns in this layout with the same corrective effect. */
ul.nav a { zoom: 1; }  /* the zoom property gives IE the hasLayout trigger it needs to correct extra whiltespace between the links */
</style>
<![endif]-->
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
	function submit()	{
		var fname = document.getElementById("fname").value;
		var lname = document.getElementById("lname").value;
		var email = document.getElementById("email").value;
		var phone = document.getElementById("number").value;
		var password = document.getElementById("password").value;
		var confirm = document.getElementById("confirm_password").value;
		var form = true;
		var email_check = true;
		var password_check = true;
		
		form = validate();
		if(form){
			email_check = emailValidator(email);
			password_check = passwordValidator(password, confirm);
		}
		
		if(form && email_check && password_check)
		{
			 clearErrors();
			 //call php
			 $.ajax({
				type: "POST",
				url: "insertNewUser.php",
				data: {
							fName : fname,
							lName : lname,
							email : email,
							phone : phone,
							password : password
						},
				async: false
			});
			 alert("Account created!");
			 window.location = "loginpage.php";
			 //then go to home page.
		}
		else
		{
			if(!form){
				alert("Please fix the highlighted errors!");
			}
			if(!email_check) {
				alert("Email must be under the IASTATE domain.");
			}
			if(!password_check){
				alert("Make sure that your confirmation password matches your original password. \n Passwords Must be at least 6 characters long and contain 1 of each of the following: \n 1) Number \n 2) Upper-case letter \n 3) Lower-case letter");
			}
		}
	};
	
	function passwordValidator(password, confirm) {
		var good_password = true;
		var match = true;
		
		
		if(password == confirm) {
		  if(password.length < 6) {
			good_password = false;
		  }
		  re = /[0-9]/;
		  if(!re.test(password)) {
			good_password = false;
		  }
		  re = /[a-z]/;
		  if(!re.test(password)) {
			good_password = false;
		  }
		  re = /[A-Z]/;
		  if(!re.test(password)) {
			good_password = false;
		  }
		} 
		else {
		  match = false;
		}
		return good_password && match;
	}
	
	function emailValidator(email) {
		var iaState = "@iastate.edu";
		var exists = new RegExp(iaState+"$").test(email);
		return exists;
	};
	
	function validate() {
		var fname = document.getElementById("fname");
		var email = document.getElementById("email");
		var password = document.getElementById("password");
		var confirm = document.getElementById("confirm_password");
		var form_complete = true;
		if(fname.value == null || fname.value == ""){
			form_complete = false;
			document.getElementById("l_fname").style.color = "red";
		}
		if(email.value == null || email.value == ""){
			form_complete = false;
			document.getElementById("l_email").style.color = "red";
		}
		if(password.value == null || password.value == ""){
			form_complete = false;
			document.getElementById("l_password").style.color = "red";
		}
		if(confirm.value == null || confirm.value == ""){
			form_complete = false;
			document.getElementById("l_confirm").style.color = "red";
		}
		
		return form_complete;
	};
	
	function clearErrors(){
		var fname = document.getElementById("l_fname").style.color = "black";
		var email = document.getElementById("l_email").style.color = "black";
		var password = document.getElementById("l_password").style.color = "black";
		var confirm = document.getElementById("l_confirm").style.color = "black";
	}
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
    <a class="navbar-brand" href="index.php"><strong>TextbookTrader</strong></a>
  </div>

  <!-- Collect the nav links, forms, and other content for toggling -->
  <div class="collapse navbar-collapse navbar-ex1-collapse">
    <ul class="nav navbar-nav">
      <!-- <li><a href="index.php">Home</a></li> -->
    </ul>
    <ul class="nav navbar-nav navbar-right">
<!--       <li><a href="loginpage.php">Log In</a></li> -->
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
	    <li><a href="aboutus.php">About Us</a></li>
	    <li><a href="contactus.php">Contact Us</a></li>
      </ul>
    </div>
  </div>
  <div class="col-md-10">

<?php
  // <div class="header"><a href="#"><img src="" alt="Insert Logo Here" name="Insert_logo" width="20%" height="90" id="Insert_logo" style="background-color: #8090AB; display:block;" /></a> 
  // <!-- end .header --></div>
  // <div class="sidebar1">
  //   <ul class="nav">
  //     <li><a href="index.php">Home</a></li>
  //     <li><a href="results.php">Search</a></li>
  //     <li><a href="myaccount.php">Seller Page</a></li>
  //     <li><a href="#">About Us</a></li>
  //   </ul>
  //   <!-- end .sidebar1 --></div>
?>

  <div class="content">
	<h2>Create An Account</h2>
	<br>
	<table id="form_table" class="form">
		<tr class="spaceUnder">
			<td><label id="l_fname">*First Name: </label></td>
			<td><input type="text" id="fname"></td>
		</tr>
		<tr class="spaceUnder">
			<td><label id="l_lname"> Last Name: </label></td>
			<td><input type="text" id="lname"></td>
		</tr>
		<tr class="spaceUnder">
			<td><label id="l_email">*Email: </label></td>
			<td><input type="text" id="email"></td>
			<td id="email_error" style="visibility:hidden;">Must use Iowa State issued email!!</td>
		</tr>
		<tr class="spaceUnder">
			<td><label id="l_password">*Password: </label></td>
			<td><input type="password" id="password"></td>
		</tr>
		<tr class="spaceUnder">
			<td><label id="l_confirm">*Confirm Password: </label></td>
			<td><input type="password" id="confirm_password"></td>
		</tr>
		<tr class="spaceUnder">
			<td><label id="l_phone"> Phone #: </label></td>
			<td><input type="text" id="number"></td>
		</tr>
		<tr class="spaceUnder">
			<td></td>
			<td align="right"><input type="submit" class="btn btn-primary" value="Create" onclick="submit()"></td>
		</tr>
	</table>
	<!--<form class="myForm" style="text-align:center">
		*First Name: <input type="text" name="fname"><br>
		<br>
		Last Name: <input type="text" name="lname"><br>
		<br>
		*Email: <input type="text" name="email"><br>
		<br>
		*Password: <input type="text" name="password"><br>
		<br>
		Phone number: <input type="text" name="number"><br>
		<br>
		<input type="submit" value="Create" onclick="">
	</form>-->
	<p>* indicates a required field</p>
    <!-- end .content --></div>
  <div class="footer">
    <!-- end .footer --></div>
  <!-- end .container --></div>
</body>
</html>
